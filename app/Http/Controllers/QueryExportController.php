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
        $queries = Query::with(['aggregate', 'autonomous', 'fleet', 'vehicle'])->get() ?? collect();

        $data = [];

        foreach ($queries as $query) {
            $rowData = [
                'id' => $query->id,
                'cpf' => 'N/A',
                'name' => 'N/A',
                'rgUf' => 'N/A',
                'type' => typeFormat($query->type),
                'created_at' => $query->created_at->format('d/m/Y H:i'),
                'user_name' => $query->user ? $query->user->name : 'N/A',
                'status' => status($query->status),
            ];

            if ($query->aggregate) {
                $rowData['cpf'] = formatCpf($query->aggregate->cpf);
                $rowData['name'] = $query->aggregate->name;
                $rowData['rgUf'] = $query->aggregate->rgUf;
            } elseif ($query->autonomous) {
                $rowData['cpf'] = formatCpf($query->autonomous->cpf);
                $rowData['name'] = $query->autonomous->name;
                $rowData['rgUf'] = $query->autonomous->rgUf;
            } elseif ($query->fleet) {
                $rowData['cpf'] = $query->fleet->fleet_name;
                $rowData['name'] = $query->fleet->fleet_manager;
                $rowData['rgUf'] = $query->fleet->uf;
            } elseif ($query->vehicle) {
                $rowData['cpf'] = $query->vehicle->plate;
                $rowData['name'] = $query->vehicle->owner_name;
                $rowData['rgUf'] = $query->vehicle->uf;
            }

            $data[] = $rowData;
        }

        return Excel::download(new QueriesExport($data), 'queries.xlsx');
    }
}
