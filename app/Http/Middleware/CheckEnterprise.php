<?php

namespace App\Http\Middleware;

use App\Models\Enterprise;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckEnterprise
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');

        $user = Auth::user();

        $enterprise = Enterprise::findOrfail($id);

        if (!$enterprise || $user->enterprise_id !== $enterprise->id) {
            return redirect()->route('enterprises.index')->with('msg', 'Você não tem permissão para acessar esta empresa.');
        }

        return $next($request);
    }
}
