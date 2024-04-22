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
        $enterprise_id = $request->input('enterprise_id');
        $user = Auth::user();

        $enterprise = Enterprise::where('id', $enterprise_id)->first();

        if (!$enterprise) {
            return redirect()->route('login')->with('error', 'Código de empresa inválido.');
        }

        if (Auth::check() && Auth::user()->enterprise_id !== $enterprise->id) {
            return redirect()->route('login')->with('error', 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
