<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Query;
use App\Models\QueryValue;
use App\Services\ResearchService;
use Carbon\Carbon;

class RunRecurringQueries extends Command
{
    protected $signature = 'queries:run-recurring';
    protected $description = 'Run recurring queries';
    protected $researchService;

    public function __construct(ResearchService $researchService)
    {
        parent::__construct();
        $this->researchService = $researchService;
    }

    public function handle()
    {
        $now = Carbon::now();

        // Obtenha todas as consultas recorrentes que precisam ser executadas
        $queries = Query::with('research')
            ->where('is_recurring', true)
            ->get();

        foreach ($queries as $query) {
            // Obtenha o QueryValue usando o enterprise_id da Query
            $queryValue = QueryValue::where('enterprise_id', $query->enterprise_id)->first();

            if (!$queryValue) {
                continue;
            }

            $validityDays = 0;
            switch ($query->type) {
                case 'autonomous':
                    $validityDays = (int) $queryValue->autonomous_validity;
                    break;
                case 'aggregated':
                    $validityDays = (int) $queryValue->aggregated_validity;
                    break;
                case 'fleet':
                    $validityDays = (int) $queryValue->fleet_validity;
                    break;
            }

            // Calcule a data de validade
            $validityDate = $query->created_at->copy()->addDays($validityDays);

            // Adicione logs para depuração
            $this->info("Query ID: {$query->id}");
            $this->info("Created At: {$query->created_at}");
            $this->info("Validity Days: {$validityDays}");
            $this->info("Validity Date: {$validityDate}");
            $this->info("Current Date: {$now}");

            // Verifique se a data atual é maior ou igual à data de validade
            if ($validityDays > 0 && $now->greaterThanOrEqualTo($validityDate)) {
                $research = $query->research;

                if ($research) {
                    // Reutilize a lógica de criação de pesquisa
                    $request = new \Illuminate\Http\Request();
                    $request->replace($research->toArray());

                    $this->researchService->createResearch($request, $query->enterprise_id, $query->user_id);

                    // Atualize o campo is_recurring para 0
                    $query->update([
                        'is_recurring' => false,
                    ]);

                    $this->info("Recurring query executed for Query ID: {$query->id}");
                }
            }
        }

        return 0;
    }
}
