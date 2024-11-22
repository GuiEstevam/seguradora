<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultUnifiedProcessSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'dataValidation' => new DataValidationSerializer($this->dataValidation),
            'processResultMessage' => $this->processResultMessage,
            'process' => ProcessDetailSerializer::collection($this->process),
            'specialAnalysis' => new SpecialAnalysisSerializer($this->specialAnalysis),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'dataValidation' => DataValidationSerializer::fromArray($data['dataValidation'] ?? []),
            'processResultMessage' => $data['processResultMessage'] ?? null,
            'process' => array_map(function ($process) {
                return ProcessDetailSerializer::fromArray($process);
            }, $data['process'] ?? []),
            'specialAnalysis' => SpecialAnalysisSerializer::fromArray($data['specialAnalysis'] ?? []),
        ]);
    }
}
