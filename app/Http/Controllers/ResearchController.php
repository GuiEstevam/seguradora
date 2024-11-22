<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\Query;
use App\Models\QueryValue;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('research.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $queryValue = QueryValue::where('enterprise_id', $user->enterprise_id)->first();
        $plates = $request->vehicleCount;
        $type = $request->input('type'); // Tipo de pesquisa

        switch ($type) {
            case 'autonomous':
                $baseValue = $queryValue->autonomous_base;
                $additionalValue = $queryValue->autonomous_additional;
                $is_recurring = $queryValue->autonomous_recurring;
                break;
            case 'fleet':
                $baseValue = $queryValue->fleet_base;
                $additionalValue = $queryValue->fleet_additional;
                $is_recurring = $queryValue->fleet_recurring;
                break;
            case 'aggregated':
            default:
                $baseValue = $queryValue->aggregated_base;
                $additionalValue = $queryValue->aggregated_additional;
                $is_recurring = $queryValue->aggregated_recurring;
                break;
        }

        if ($plates) {
            $value = $baseValue + ($additionalValue * $plates);
        } else {
            $value = $baseValue;
        }

        $query = new Query;
        $query->type = ucfirst($type);
        $query->status = "pending";
        $query->enterprise_id = $user->enterprise_id;
        $query->user_id = $user->id;
        $query->value = $value;
        $query->is_recurring = $is_recurring;
        $query->save();


        $researchData = $request->all();
        $researchData['query_id'] = $query->id;
        $researchData['type'] = $type;

        $research = Research::create($researchData);

        return redirect()->route('research.index')->with('success', 'Consulta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $query = Query::with('research')->findOrFail($id);
        $research = $query->research;

        return view('research.show', compact('query', 'research'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        //
    }
}
