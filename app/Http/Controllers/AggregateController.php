<?php

namespace App\Http\Controllers;

use App\Models\Aggregate;
use App\Models\Query;
use App\Models\QueryValue;
use Illuminate\Http\Request;

class AggregateController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name'); // Padrão para 'name'

        $queries = Query::whereHas('aggregate', function ($query) use ($search, $searchColumn) {
            if ($search) {
                $query->where($searchColumn, 'like', "%{$search}%");
            }
        })->paginate($perPage);

        return view('aggregate.index', compact('queries', 'search', 'searchColumn'));
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

    public function show($id)
    {
        $user = auth()->user();
        $query = Query::whereHas('aggregate')->where('id', $id)->first();
        $aggregate = $query->aggregate;
        return view('layouts.show_generic', [
            'entity' => $aggregate,
            'title' => 'Detalhes do Agregado',
            'backRoute' => 'aggregate.index'
        ]);
    }
}
