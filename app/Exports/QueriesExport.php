<?php

namespace App\Exports;

use App\Models\Query;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class QueriesExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $queries;

    public function __construct($queries)
    {
        $this->queries = $queries;
    }

    public function view(): View
    {
        return view('exports.queries_export', ['queries' => $this->queries]);
    }
}
