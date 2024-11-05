<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use App\Models\Query;
use App\Models\QueryValue;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name'); // Padrão para 'name'

        $queries = Query::whereHas('Fleet', function ($query) use ($search, $searchColumn) {
            if ($search) {
                $query->where($searchColumn, 'like', "%{$search}%");
            }
        })->paginate($perPage);

        return view('fleet.index', compact('queries', 'search', 'searchColumn'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fleet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate(['cpf' => 'required|string|max:11']);
        $user = auth()->user();
        $queryValue = QueryValue::where('enterprise_id', $user->enterprise_id)->first();
        $plates = $request->vehicleCount;
        if ($plates) {
            $value = $queryValue->fleet_base + ($queryValue->fleet_additional * $plates);
        } else {
            $value = $queryValue->fleet_base;
        }
        $query = new Query;
        $query->type = 'Fleet';
        $query->status = "pending";
        $query->enterprise_id = $user->enterprise_id;
        $query->user_id = $user->id;
        $query->value = $value;
        $query->save();

        $fleetData = $request->all();
        $fleetData['query_id'] = $query->id;

        $fleet = Fleet::create($fleetData);

        return redirect()->route('fleet.index')->with('success', 'Consulta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $query = Query::whereHas('fleet')->where('id', $id)->first();
        $fleet = $query->fleet;
        return view('layouts.show_generic', [
            'entity' => $fleet,
            'title' => 'Detalhes da Frota',
            'backRoute' => 'fleet.index'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fleet $fleet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fleet $fleet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fleet $fleet)
    {
        //
    }
}
