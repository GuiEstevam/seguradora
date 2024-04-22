<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'enterprise_id' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $credentials = [
            'enterprise_id' => $request->enterprise_id,
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended('/dashboard');
        }

        // Autenticação falhou
        return back()->withErrors(['name' => 'Credenciais inválidas']);
    }
}
