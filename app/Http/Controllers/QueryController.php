<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');
        $searchColumn = $request->input('search_column'); // Padrão para 'user'

        $queries = Query::with(['enterprise', 'aggregate', 'autonomous', 'fleet'])
            ->when($search, function ($query, $search) use ($searchColumn) {
                return $query->whereHas($searchColumn, function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })->paginate($perPage);

        return view('query.index', compact('queries', 'search', 'searchColumn'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Query $query)
    {
        //
    }
}
