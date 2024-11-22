<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfractionSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'vehiclePlate' => $this->vehiclePlate,
            'authorBody' => $this->authorBody,
            'autoInfractionNumber' => $this->autoInfractionNumber,
            'infractionCode' => $this->infractionCode,
            'infractionDate' => $this->infractionDate,
            'infractionHour' => $this->infractionHour,
            'registerInfractionDate' => $this->registerInfractionDate,
            'registerInfractionHour' => $this->registerInfractionHour,
            'infractionPoints' => $this->infractionPoints,
            'infractionSituation' => $this->infractionSituation,
            'infractionCodeType' => $this->infractionCodeType,
            'infractionArticle' => $this->infractionArticle,
            'infractionDescription' => $this->infractionDescription,
            'infractionPlace' => $this->infractionPlace,
            'infractionObservation' => $this->infractionObservation,
            'infractionTypeAuthor' => $this->infractionTypeAuthor,
            'authorPresentation' => $this->authorPresentation,
            'infractionCounty' => $this->infractionCounty,
            'infractionSerie' => $this->infractionSerie,
            'infractionAppealDeadlineDate' => $this->infractionAppealDeadlineDate,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'vehiclePlate' => $data['vehiclePlate'] ?? null,
            'authorBody' => $data['authorBody'] ?? null,
            'autoInfractionNumber' => $data['autoInfractionNumber'] ?? null,
            'infractionCode' => $data['infractionCode'] ?? null,
            'infractionDate' => $data['infractionDate'] ?? null,
            'infractionHour' => $data['infractionHour'] ?? null,
            'registerInfractionDate' => $data['registerInfractionDate'] ?? null,
            'registerInfractionHour' => $data['registerInfractionHour'] ?? null,
            'infractionPoints' => $data['infractionPoints'] ?? null,
            'infractionSituation' => $data['infractionSituation'] ?? null,
            'infractionCodeType' => $data['infractionCodeType'] ?? null,
            'infractionArticle' => $data['infractionArticle'] ?? null,
            'infractionDescription' => $data['infractionDescription'] ?? null,
            'infractionPlace' => $data['infractionPlace'] ?? null,
            'infractionObservation' => $data['infractionObservation'] ?? null,
            'infractionTypeAuthor' => $data['infractionTypeAuthor'] ?? null,
            'authorPresentation' => $data['authorPresentation'] ?? null,
            'infractionCounty' => $data['infractionCounty'] ?? null,
            'infractionSerie' => $data['infractionSerie'] ?? null,
            'infractionAppealDeadlineDate' => $data['infractionAppealDeadlineDate'] ?? null,
        ]);
    }
}
