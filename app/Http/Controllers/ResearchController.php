<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\Query;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name');
        $type = $request->input('type');
        $subtype = $request->input('subtype');

        // Consultar Queries com base no relacionamento com Research
        $queries = Query::with('research')
            ->whereHas('research', function ($query) use ($search, $searchColumn, $type, $subtype) {
                if ($type) {
                    $query->where('type', $type);
                }
                if ($subtype) {
                    $query->where('subtype', $subtype);
                }
                if ($search) {
                    $query->where("driver_data->$searchColumn", 'like', "%{$search}%")
                        ->orWhere("vehicle_data->$searchColumn", 'like', "%{$search}%");
                }
            })
            ->paginate($perPage);

        // Colunas disponíveis para pesquisa
        $searchColumns = [
            'cpf' => 'CPF',
            'name' => 'Nome',
            'plate' => 'Placa',
        ];

        return view('research.index', compact('queries', 'search', 'searchColumn', 'type', 'subtype', 'searchColumns'));
    }

    public function create()
    {
        return view('research.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string',
            'subtype' => 'nullable|string',
            'query_id' => 'required|exists:queries,id', // Verifica se a query existe
        ]);

        $query = Query::findOrFail($request->query_id);

        $researchData = $request->only(['type', 'subtype', 'driver_data', 'vehicle_data']);
        $researchData['query_id'] = $query->id;

        Research::create($researchData);

        return redirect()->route('research.index')->with('success', 'Pesquisa criada com sucesso!');
    }

    public function show($id)
    {
        $query = Query::with('research')->findOrFail($id);
        $research = $query->research;

        return view('research.show', compact('query', 'research'));
    }
}
