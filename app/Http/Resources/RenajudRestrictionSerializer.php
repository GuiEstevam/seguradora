<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RenajudRestrictionSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'restriction' => $this->restriction,
            'observation' => $this->observation,
            'tribunal' => $this->tribunal,
            'processNumber' => $this->processNumber,
            'blockType' => $this->blockType,
            'failureType' => $this->failureType,
            'situation' => $this->situation,
            'searchAndSeizure' => $this->searchAndSeizure,
            'judiciaryBody' => $this->judiciaryBody,
            'complement' => $this->complement,
            'registerDateTime' => $this->registerDateTime,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'restriction' => $data['restriction'] ?? null,
            'observation' => $data['observation'] ?? null,
            'tribunal' => $data['tribunal'] ?? null,
            'processNumber' => $data['processNumber'] ?? null,
            'blockType' => $data['blockType'] ?? null,
            'failureType' => $data['failureType'] ?? null,
            'situation' => $data['situation'] ?? null,
            'searchAndSeizure' => $data['searchAndSeizure'] ?? null,
            'judiciaryBody' => $data['judiciaryBody'] ?? null,
            'complement' => $data['complement'] ?? null,
            'registerDateTime' => $data['registerDateTime'] ?? null,
        ]);
    }
}
