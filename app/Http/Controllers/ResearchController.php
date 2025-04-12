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
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name');
        $type = $request->input('type');

        // Consultar Queries com base no relacionamento com Research
        $queries = Query::with('research')
            ->whereHas('research', function ($query) use ($search, $searchColumn, $type) {
                if ($type) {
                    $query->where('type', $type);
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

        return view('research.index', compact('queries', 'search', 'searchColumn', 'type', 'searchColumns'));
    }

    public function create()
    {
        return view('research.create');
    }

    public function store(Request $request)
    {
        $this->researchService->createResearch($request);

        return redirect()->route('research.index')->with('success', 'Pesquisa criada com sucesso!');
    }

    public function show($id)
    {
        $query = Query::with('research')->findOrFail($id);
        $research = $query->research;

        return view('research.show', compact('query', 'research'));
    }
}
