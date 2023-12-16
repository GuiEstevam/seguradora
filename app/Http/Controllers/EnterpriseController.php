<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Services\CnpjFormatterService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $enterprises = Enterprise::all();
        $cnpjFormatter = app(CnpjFormatterService::class);

        foreach ($enterprises as $enterprise) {
            $enterprise->cnpj = $cnpjFormatter->formatarCnpj($enterprise->cnpj);
        };

        return view('enterprises.index', compact('user', 'enterprises'));
    }

    public function create()
    {
        return view('enterprises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cnpj' => 'required|unique:enterprises|max:14',
            'email' => 'required',
            'responsable' => 'required',
        ]);

        Enterprise::create($request->all());

        return redirect()->route('enterprises.index')
            ->with('success', 'Empresa cadastrada com sucesso.');
    }
}
