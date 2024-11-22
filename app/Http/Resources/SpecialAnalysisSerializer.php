<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialAnalysisSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'resultSpecialAnalysisMessage' => $this->resultSpecialAnalysisMessage,
            'results' => SpecialAnalysisResultSerializer::collection($this->results),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'resultSpecialAnalysisMessage' => $data['resultSpecialAnalysisMessage'] ?? null,
            'results' => array_map(function ($result) {
                return SpecialAnalysisResultSerializer::fromArray($result);
            }, $data['results'] ?? []),
        ]);
    }
}
