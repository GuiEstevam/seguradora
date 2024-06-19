<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\QueryValue;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class QueryValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $enterprise = Enterprise::findOrfail($id);

        $queryValue = QueryValue::updateOrCreate(
            ['enterprise_id' => $enterprise->id],
            [
                'driverLicense' => $request->input('driverLicense'),
                'veichile' => $request->input('veichile'),
                'face' => $request->input('face'),
                'process' => $request->input('process'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
                'deactivated_at' => $request->input('deactivated_at'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'autonomous_base' => $request->input('autonomous_base'),
                'autonomous_additional' => $request->input('autonomous_additional'),
                'autonomous_validity' => $request->input('autonomous_validity'),
                'aggregated_base' => $request->input('aggregated_base'),
                'aggregated_additional' => $request->input('aggregated_additional'),
                'aggregated_validity' => $request->input('aggregated_validity'),
                'fleet_base' => $request->input('fleet_base'),
                'fleet_additional' => $request->input('fleet_additional'),
                'fleet_validity' => $request->input('fleet_validity')

            ]
        );
        return response()->json([
            'success' => true,
            'data' => $queryValue
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enterprise = Enterprise::findOrfail($id);

        // $prices = $enterprise->queryValues;

        // return response()->json($prices);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QueryValue $queryValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QueryValue $queryValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QueryValue $queryValue)
    {
        //
    }
}
