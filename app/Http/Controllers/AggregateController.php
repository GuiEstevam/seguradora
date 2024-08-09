<?php

namespace App\Http\Controllers;

use App\Models\Aggregate;
use App\Models\Query;
use App\Models\QueryValue;
use Illuminate\Http\Request;

class AggregateController extends Controller
{
    public function index()
    {
        $aggregate = Query::whereHas('aggregate')->get() ?? collect();
        return view('aggregate.index', ['queries' => $aggregate]);
    }

    public function create()
    {
        return view('aggregate.create');
    }

    public function store(Request $request)
    {
        // $request->validate(['cpf' => 'required|string|max:11']);
        $user = auth()->user();
        $queryValue = QueryValue::where('enterprise_id', $user->enterprise_id)->first();
        $plates = $request->vehicleCount;
        if ($plates) {
            $value = $queryValue->aggregated_base + ($queryValue->aggregated_additional * $plates);
        } else {
            $value = $queryValue->aggregated_base;
        }
        $query = new Query;
        $query->type = 'Aggregated';
        $query->status = "pending";
        $query->enterprise_id = $user->enterprise_id;
        $query->user_id = $user->id;
        $query->value = $value;
        $query->save();

        $aggregateData = $request->all();
        $aggregateData['query_id'] = $query->id;

        $aggregate = Aggregate::create($aggregateData);

        return redirect()->route('aggregate.index')->with('success', 'Consulta criada com sucesso!');
    }
}
