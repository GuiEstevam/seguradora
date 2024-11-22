<?php

namespace App\Http\Controllers;

use App\Exports\QueriesExport;
use App\Models\Query;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QueryExportController extends Controller
{
    public function export(Request $request)
    {
        $type = $request->input('type');
        $search = $request->input('search');
        $searchColumn = $request->input('search_column', 'name');

        // Buscar todos os dados do modelo Query com as relações necessárias e aplicar filtros
        $queries = Query::with(['research', 'user'])
            ->whereHas('research', function ($query) use ($type, $search, $searchColumn) {
                if ($type) {
                    $query->where('type', $type);
                }
                if ($search) {
                    $query->where($searchColumn, 'like', "%{$search}%");
                }
            })
            ->get();

        // Preparar os dados para exportação
        $data = $queries->map(function ($query) {
            $research = $query->research;
            return [
                'id' => $query->id,
                'cpf' => $research ? formatCpf($research->cpf) : 'N/A',
                'name' => $research ? $research->name : 'N/A',
                'rgUf' => $research ? $research->rgUf : 'N/A',
                'type' => $research ? typeFormat($research->type) : 'N/A',
                'created_at' => $query->created_at->format('d/m/Y H:i'),
                'user_name' => $query->user ? $query->user->name : 'N/A',
                'status' => translateStatus($query->status),
            ];
        });

        // Retornar o download do arquivo Excel
        return Excel::download(new QueriesExport($data), 'researches.xlsx');
    }
}
