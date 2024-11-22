<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OccurrenceSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ocurrenceCategory' => $this->ocurrenceCategory,
            'occurrenceDate' => $this->occurrenceDate,
            'occurrenceType' => $this->occurrenceType,
            'agencyUf' => $this->agencyUf,
            'occurrenceNumber' => $this->occurrenceNumber,
            'agency' => $this->agency,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'ocurrenceCategory' => $data['ocurrenceCategory'] ?? null,
            'occurrenceDate' => $data['occurrenceDate'] ?? null,
            'occurrenceType' => $data['occurrenceType'] ?? null,
            'agencyUf' => $data['agencyUf'] ?? null,
            'occurrenceNumber' => $data['occurrenceNumber'] ?? null,
            'agency' => $data['agency'] ?? null,
        ]);
    }
}
