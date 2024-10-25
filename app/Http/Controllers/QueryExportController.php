<?php

namespace App\Http\Controllers;

use App\Exports\QueriesExport;
use App\Models\Query;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QueryExportController extends Controller
{
    public function export()
    {
        $queries = Query::whereHas('aggregate')->get() ?? collect();

        $data = [];

        foreach ($queries as $query) {
            $rowData = [
                'id' => $query->id,
                'cpf' => $query->aggregate ? formatCpf($query->aggregate->cpf) : 'N/A',
                'name' => $query->aggregate ? $query->aggregate->name : 'N/A',
                'rgUf' => $query->aggregate ? $query->aggregate->rgUf : 'N/A',
                'created_at' => $query->aggregate ? $query->aggregate->created_at->format('d/m/Y H:i') : 'N/A',
                'user_name' => $query->user ? $query->user->name : 'N/A',
                'status' => Status($query->status),
            ];

            $data[] = $rowData;
        }

        return Excel::download(new QueriesExport($data), 'queries.xlsx');
    }
}
