<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataValidationSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'cpf' => $this->resource['cpf'],
            'birthDate' => $this->resource['birthDate'],
            'name' => $this->resource['name'],
            'rg' => $this->resource['rg'],
            'mother' => $this->resource['mother'],
            'deathFlag' => $this->resource['deathFlag'],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'cpf' => $data['cpf'] ?? null,
            'birthDate' => $data['birthDate'] ?? null,
            'name' => $data['name'] ?? null,
            'rg' => $data['rg'] ?? null,
            'mother' => $data['mother'] ?? null,
            'deathFlag' => $data['deathFlag'] ?? null,
        ]);
    }
}
