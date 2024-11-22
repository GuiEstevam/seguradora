<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnttResponseSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'resultFound' => $this->resultFound,
            'city' => $this->city,
            'registrationDate' => $this->registrationDate,
            'typeRntrc' => $this->typeRntrc,
            'document' => $this->document,
            'rntrcNumber' => $this->rntrcNumber,
            'anttSituation' => $this->anttSituation,
            'vehicleAnttSituation' => $this->vehicleAnttSituation,
            'ufRntrc' => $this->ufRntrc,
            'transporterMessage' => $this->transporterMessage,
            'vehicleMessage' => $this->vehicleMessage,
            'transporterName' => $this->transporterName,
            'expirationDate' => $this->expirationDate,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'resultFound' => $data['resultFound'] ?? null,
            'city' => $data['city'] ?? null,
            'registrationDate' => $data['registrationDate'] ?? null,
            'typeRntrc' => $data['typeRntrc'] ?? null,
            'document' => $data['document'] ?? null,
            'rntrcNumber' => $data['rntrcNumber'] ?? null,
            'anttSituation' => $data['anttSituation'] ?? null,
            'vehicleAnttSituation' => $data['vehicleAnttSituation'] ?? null,
            'ufRntrc' => $data['ufRntrc'] ?? null,
            'transporterMessage' => $data['transporterMessage'] ?? null,
            'vehicleMessage' => $data['vehicleMessage'] ?? null,
            'transporterName' => $data['transporterName'] ?? null,
            'expirationDate' => $data['expirationDate'] ?? null,
        ]);
    }
}
