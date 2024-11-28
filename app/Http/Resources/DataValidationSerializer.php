<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataValidationSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'cpf' => $this->cpf,
            'birthDate' => $this->birthDate,
            'name' => $this->name,
            'rg' => $this->rg,
            'mother' => $this->mother,
            'deathFlag' => $this->deathFlag,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'cpf' => $data['cpf'] ?? null,
            'birthDate' => $data['birthDate'] ?? null,
            'name' => $data['name'] ?? null,
            'rg' => $data['rg'] ?? null,
            'mother' => $data['mother'] ?? null,
            'deathFlag' => $data['deathFlag'] ?? null,
        ]);
    }
}
