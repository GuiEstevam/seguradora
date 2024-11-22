<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PoliceDistrictDataSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'district' => $this->resource['district'],
            'locality' => $this->resource['locality'],
            'city' => $this->resource['city'],
            'uf' => $this->resource['uf'],
            'documentNumber' => $this->resource['documentNumber'],
            'documentType' => $this->resource['documentType'],
            'blatant' => $this->resource['blatant'],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'district' => $data['district'] ?? null,
            'locality' => $data['locality'] ?? null,
            'city' => $data['city'] ?? null,
            'uf' => $data['uf'] ?? null,
            'documentNumber' => $data['documentNumber'] ?? null,
            'documentType' => $data['documentType'] ?? null,
            'blatant' => $data['blatant'] ?? null,
        ]);
    }
}
