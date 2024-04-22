<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\User;
use App\Services\CnpjFormatterService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class EnterpriseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $enterprises = Enterprise::all();
        $cnpjFormatter = app(CnpjFormatterService::class);

        $role = Role::where('name', 'admin')->first();
        if (!$role) {
            // Trate a situação em que a role não foi encontrada
        }


        foreach ($enterprises as $enterprise) {
            $enterprise->cnpj = $cnpjFormatter->formatarCnpj($enterprise->cnpj);
        };

        return view('enterprises.index', compact('user', 'enterprises', 'role'));
    }

    public function create()
    {

        return view('enterprises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cnpj' => 'required|string|max:20',
            'name' => 'required|string|max:255',
            'state_registration' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'number' => 'required|string|max:10',
            'uf' => 'required|string|max:2',
            'complement' => 'nullable|string|max:255',
            'cep' => 'required|string|max:15',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'responsible_name' => 'required|string|max:255',
            'responsible_email' => 'required|email|max:255',
            'responsible_number' => 'required|string|max:20',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',
        ]);


        $data = $request->all();
        $user = User::create([
            'name' => $request->responsible_name,
            'email' => $request->responsible_email,
            'phone' => $request->responsible_number,
            'password' => bcrypt($request->password),
        ]);
        $enterpriseData = Arr::except($data, ['responsible_name', 'responsible_email', 'responsible_number', 'password']);
        $enterpriseData['user_id'] = $user->id;

        $enterprise = Enterprise::create($enterpriseData);

        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            // Atribua a role "admin" ao usuário
            $user->assignRole('admin');
        } else {
            // Trate a situação em que a role "admin" não foi encontrada
            return redirect()->back()->with('error', 'A role "admin" não foi encontrada.');
        }

        return redirect()->route('enterprises.index')
            ->with('success', 'Empresa cadastrada com sucesso.');
    }
    public function show($id)
    {
        $Enterprise = Enterprise::findOrFail($id);

        $user = auth()->user();

        return view(
            'enterprises.show',
            [
                'enterprise' => $Enterprise,
                'user' => $user
            ]
        );
    }
}
