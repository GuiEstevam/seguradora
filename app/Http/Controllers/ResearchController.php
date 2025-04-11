<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\Query;
use App\Models\QueryValue;
use Illuminate\Http\Request;
use App\Services\ResearchService;

class ResearchController extends Controller
{
    protected $researchService;

    public function __construct(ResearchService $researchService)
    {
        $this->researchService = $researchService;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Padrão para 10
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name'); // Padrão para 'name'
        $type = $request->input('type'); // Tipo de pesquisa (opcional)

        $queries = Query::whereHas('research', function ($query) use ($search, $searchColumn, $type) {
            if ($type) {
                $query->where('type', $type);
            }
            if ($search) {
                $query->where($searchColumn, 'like', "%{$search}%");
            }
        })->paginate($perPage);

        $searchColumns = [
            'name' => 'Nome',
            'cpf' => 'CPF',
            'rgNumber' => 'RG',
            'vehiclePlate01' => 'Placa do Veículo 1',
        ];

        return view('research.index', compact('queries', 'search', 'searchColumn', 'type', 'searchColumns'));
    }

    public function create()
    {
        return view('research.create');
    }

    public function store(Request $request)
    {
        $this->researchService->createResearch($request);

        return redirect()->route('research.index')->with('success', 'Consulta criada com sucesso!');
    }

    public function show($id)
    {
        $query = Query::with('research')->findOrFail($id);
        $research = $query->research;

        return view('research.show', compact('query', 'research'));
    }

    public function edit(Research $research)
    {
        //
    }

    public function update(Request $request, Research $research)
    {
        //
    }

    public function destroy(Research $research)
    {
        //
    }
}
