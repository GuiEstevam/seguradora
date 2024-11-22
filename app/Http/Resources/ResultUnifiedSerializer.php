<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultUnifiedSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'statusCode' => $this->statusCode,
            'solicitationID' => $this->solicitationID,
            'resultDProcesso' => new ResultUnifiedProcessSerializer($this->resultDProcesso),
            'resultDCNH' => new ResultUnifiedCNHSerializer($this->resultDCNH),
            'resultsDVeiculos' => ResultUnifiedVehicleSerializer::collection($this->resultsDVeiculos),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'statusCode' => $data['statusCode'] ?? null,
            'solicitationID' => $data['solicitationID'] ?? null,
            'resultDProcesso' => ResultUnifiedProcessSerializer::fromArray($data['resultDProcesso'] ?? []),
            'resultDCNH' => ResultUnifiedCNHSerializer::fromArray($data['resultDCNH'] ?? []),
            'resultsDVeiculos' => array_map(function ($vehicle) {
                return ResultUnifiedVehicleSerializer::fromArray($vehicle);
            }, $data['resultsDVeiculos'] ?? []),
        ]);
    }
}
