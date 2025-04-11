<?php

namespace App\Services;

use App\Models\Query;
use App\Models\QueryValue;
use App\Models\Research;

class ResearchService
{
    public function createResearch($request, $enterpriseId, $userId)
    {
        $queryValue = QueryValue::where('enterprise_id', $enterpriseId)->first();
        $plates = $request->vehicleCount;
        $type = $request->input('type'); // Tipo de pesquisa

        switch ($type) {
            case 'autonomous':
                $baseValue = $queryValue->autonomous_base;
                $additionalValue = $queryValue->autonomous_additional;
                $is_recurring = $queryValue->autonomous_recurring;
                break;
            case 'fleet':
                $baseValue = $queryValue->fleet_base;
                $additionalValue = $queryValue->fleet_additional;
                $is_recurring = $queryValue->fleet_recurring;
                break;
            case 'aggregated':
            default:
                $baseValue = $queryValue->aggregated_base;
                $additionalValue = $queryValue->aggregated_additional;
                $is_recurring = $queryValue->aggregated_recurring;
                break;
        }

        if ($plates) {
            $value = $baseValue + ($additionalValue * $plates);
        } else {
            $value = $baseValue;
        }

        $query = new Query;
        $query->type = ucfirst($type);
        $query->status = "pending";
        $query->enterprise_id = $enterpriseId;
        $query->user_id = $userId;
        $query->value = $value;
        $query->is_recurring = $is_recurring;
        $query->save();

        $researchData = $request->all();
        $researchData['query_id'] = $query->id;
        $researchData['type'] = $type;

        $research = Research::create($researchData);

        return $research;
    }
}
