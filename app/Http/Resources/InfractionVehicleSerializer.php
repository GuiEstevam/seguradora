<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfractionVehicleSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'infractionClassification' => $this->infractionClassification,
            'descriptionCode' => $this->descriptionCode,
            'authorBodyCode' => $this->authorBodyCode,
            'complementInfractionPlace' => $this->complementInfractionPlace,
            'infractionDate' => $this->infractionDate,
            'registrationInfractionDate' => $this->registrationInfractionDate,
            'defenseDeadlineDate' => $this->defenseDeadlineDate,
            'appealClosingDate' => $this->appealClosingDate,
            'description' => $this->description,
            'complementDescription' => $this->complementDescription,
            'hourInfraction' => $this->hourInfraction,
            'registerHourInfraction' => $this->registerHourInfraction,
            'infractionPlace' => $this->infractionPlace,
            'complementNoticeNumber' => $this->complementNoticeNumber,
            'infractionNoticeNumber' => $this->infractionNoticeNumber,
            'processingNumber' => $this->processingNumber,
            'renainfNumber' => $this->renainfNumber,
            'authorBody' => $this->authorBody,
            'infractionSituation' => $this->infractionSituation,
            'infractionType' => $this->infractionType,
            'infractionValue' => $this->infractionValue,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'infractionClassification' => $data['infractionClassification'],
            'descriptionCode' => $data['descriptionCode'],
            'authorBodyCode' => $data['authorBodyCode'],
            'complementInfractionPlace' => $data['complementInfractionPlace'],
            'infractionDate' => $data['infractionDate'],
            'registrationInfractionDate' => $data['registrationInfractionDate'],
            'defenseDeadlineDate' => $data['defenseDeadlineDate'],
            'appealClosingDate' => $data['appealClosingDate'],
            'description' => $data['description'],
            'complementDescription' => $data['complementDescription'],
            'hourInfraction' => $data['hourInfraction'],
            'registerHourInfraction' => $data['registerHourInfraction'],
            'infractionPlace' => $data['infractionPlace'],
            'complementNoticeNumber' => $data['complementNoticeNumber'],
            'infractionNoticeNumber' => $data['infractionNoticeNumber'],
            'processingNumber' => $data['processingNumber'],
            'renainfNumber' => $data['renainfNumber'],
            'authorBody' => $data['authorBody'],
            'infractionSituation' => $data['infractionSituation'],
            'infractionType' => $data['infractionType'],
            'infractionValue' => $data['infractionValue'],
        ]);
    }
}
