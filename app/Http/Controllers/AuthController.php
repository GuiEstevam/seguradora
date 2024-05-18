<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\User;
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

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $enterprises = Enterprise::all();
        return view('users.create', compact('enterprises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enterprise_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        $user = new User();
        $user->enterprise_id = $request->enterprise_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');
    }
    public function show($id)
    {
        $enterprises = Enterprise::all();
        $user = User::findOrFail($id);

        // if ($Enterprise->responsibleUser->id != $user->id) {
        //     return redirect()->route('enterprises.index')->with('msg', 'Cadastro desativado.');
        // }
        return view(
            'users.show',
            [
                'user' => $user,
                'enterprises' => $enterprises,
            ]
        );
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'enterprise_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();
        if ($request->status == 'active') {
            $data['deactivated_at'] = null;
        } else {
            $data['deactivated_at'] = now();
        }

        $user->update($data);
        $user->save();

        // $user->enterprise_id = $request->enterprise_id;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->status = $request->status;
        // $user->save();

        return redirect()->route('users.index');
    }
}
