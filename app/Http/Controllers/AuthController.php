<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $roles = Role::all();
        $permissions = Permission::all();

        return view(
            'users.show',
            compact('user', 'enterprises', 'roles', 'permissions'),
        );
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'enterprise_id' => ['nullable', 'exists:enterprises,id'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $user = User::findOrFail($id);

        // Sincronizar papéis e permissões
        if ($request->has('roles') && count($request->roles) > 0) {
            $user->syncRoles($request->roles);
            $user->syncPermissions([]);
        } else {
            $user->syncRoles([]);
        }

        if ($request->has('permissions') && count($request->permissions) > 0) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->syncPermissions([]);
        }

        $data = $request->all();

        // Atualizar status e data de desativação
        if ($request->status == 'active') {
            $data['deactivated_at'] = null;
        } else {
            $data['deactivated_at'] = now();
        }

        $user->update($data);

        return redirect()->route('users.index')->with('msg', 'Usuário atualizado com sucesso.');
    }
}
