<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfractionCNHSerializer extends JsonResource
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
        return new static([
            'vehiclePlate' => $data['vehiclePlate'],
            'authorBody' => $data['authorBody'],
            'autoInfractionNumber' => $data['autoInfractionNumber'],
            'infractionCode' => $data['infractionCode'],
            'infractionDate' => $data['infractionDate'],
            'infractionHour' => $data['infractionHour'],
            'registerInfractionDate' => $data['registerInfractionDate'],
            'registerInfractionHour' => $data['registerInfractionHour'],
            'infractionPoints' => $data['infractionPoints'],
            'infractionSituation' => $data['infractionSituation'],
            'infractionCodeType' => $data['infractionCodeType'],
            'infractionArticle' => $data['infractionArticle'],
            'infractionDescription' => $data['infractionDescription'],
            'infractionPlace' => $data['infractionPlace'],
            'infractionObservation' => $data['infractionObservation'],
            'infractionTypeAuthor' => $data['infractionTypeAuthor'],
            'authorPresentation' => $data['authorPresentation'],
            'infractionCounty' => $data['infractionCounty'],
            'infractionSerie' => $data['infractionSerie'],
            'infractionAppealDeadlineDate' => $data['infractionAppealDeadlineDate'],
        ]);
    }
}
