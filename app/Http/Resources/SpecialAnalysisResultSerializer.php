<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialAnalysisResultSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'date' => $this->date,
            'summary' => $this->summary,
            'qualification' => $this->qualification,
            'city' => $this->city,
            'uf' => $this->uf,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'date' => $data['date'] ?? null,
            'summary' => $data['summary'] ?? null,
            'qualification' => $data['qualification'] ?? null,
            'city' => $data['city'] ?? null,
            'uf' => $data['uf'] ?? null,
        ]);
    }
}
