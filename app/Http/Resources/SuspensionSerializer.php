<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuspensionSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'suspensionReason' => $this->suspensionReason,
            'suspesionProcess' => $this->suspesionProcess,
            'suspensionDate' => $this->suspensionDate,
            'suspensionDeadlineDate' => $this->suspensionDeadlineDate,
            'suspensionSituation' => $this->suspensionSituation,
            'suspensionSituationRecicle' => $this->suspensionSituationRecicle,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'suspensionReason' => $data['suspensionReason'] ?? null,
            'suspesionProcess' => $data['suspesionProcess'] ?? null,
            'suspensionDate' => $data['suspensionDate'] ?? null,
            'suspensionDeadlineDate' => $data['suspensionDeadlineDate'] ?? null,
            'suspensionSituation' => $data['suspensionSituation'] ?? null,
            'suspensionSituationRecicle' => $data['suspensionSituationRecicle'] ?? null,
        ]);
    }
}
