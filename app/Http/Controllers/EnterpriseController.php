<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckEnterprise;
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
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name'); // Padrão para 'name'

        $query = Enterprise::query();

        if (auth()->user()->hasRole('master')) {
            // Usuário com papel 'master' pode ver todas as empresas
            $query = Enterprise::query();
        } else {
            // Usuário comum só pode ver a própria empresa
            $query->where('id', auth()->user()->enterprise_id);
        }

        if ($search) {
            $query->where($searchColumn, 'like', "%{$search}%");
        }

        $enterprises = $query->paginate($perPage);

        return view('enterprises.index', compact('enterprises', 'search', 'searchColumn'));
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
        $user->enterprise_id = $enterprise->id;
        $user->save();

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
        $user = auth()->user();

        $enterprise = Enterprise::findOrFail($id);
        $prices = $enterprise->queryValues;

        // if ($Enterprise->responsibleUser->id != $user->id) {
        //     return redirect()->route('enterprises.index')->with('msg', 'Cadastro desativado.');
        // }
        return view(
            'enterprises.show',
            compact('enterprise', 'prices')
        );
    }

    public function getQueryValues($id)
    {
        $enterprise = Enterprise::findOrFail($id);
        $queryValues = $enterprise->queryValues;

        $prices = [];
        foreach ($queryValues as $queryValue) {
            $prices[$queryValue->query_type] = $queryValue->value;
        }

        return $prices;
    }

    public function update($id, Request $request)
    {
        $request->validate([
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
        $data = request()->all(); // Pega todos os dados do request

        if ($request->status == 'active') {
            $data['deactivated_at'] = null;
        } else {
            $data['deactivated_at'] = now();
        }

        $enterpriseData = Arr::except($data, ['responsible_name', 'responsible_email', 'responsible_number', 'password']);

        $enterprise = Enterprise::findOrFail($id);

        $enterprise->update($enterpriseData);

        $user = $enterprise->responsibleUser;
        $user->name = $request->responsible_name;
        $user->email = $request->responsible_email;
        $user->phone = $request->responsible_number;
        $user->update();

        return back()->with('msg', 'Cadastro editado com sucesso!');
        // return redirect()->route('enterprises.index')->with('msg', 'Cadastro editado com sucesso!');
    }

    public function deactivate($id)
    {
        $enterprise = Enterprise::findOrFail($id);
        $enterprise->status = 'inactive';
        $enterprise->deactivated_at = now();
        $enterprise->save();
        return redirect()->route('enterprises.index')->with('msg', 'Cadastro desativado com sucesso!');
    }
}
