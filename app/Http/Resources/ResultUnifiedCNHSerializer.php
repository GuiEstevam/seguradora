<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultUnifiedCNHSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'faceBase64' => $this->faceBase64,
            'validationStatusDocumentImage' => $this->validationStatusDocumentImage,
            'validationStatusCnh' => $this->validationStatusCnh,
            'validationStatusSecurityNumber' => $this->validationStatusSecurityNumber,
            'validationStatusUf' => $this->validationStatusUf,
            'validationImageMessage' => $this->validationImageMessage,
            'renachNumber' => $this->renachNumber,
            'registerNumber' => $this->registerNumber,
            'category' => $this->category,
            'name' => $this->name,
            'rgNumber' => $this->rgNumber,
            'ufRg' => $this->ufRg,
            'emissorRg' => $this->emissorRg,
            'cpf' => $this->cpf,
            'birthDate' => $this->birthDate,
            'issuanceDate' => $this->issuanceDate,
            'firstLicenseDate' => $this->firstLicenseDate,
            'expiryDate' => $this->expiryDate,
            'performsPaidActivity' => $this->performsPaidActivity,
            'moopCourse' => $this->moopCourse,
            'localIssuance' => $this->localIssuance,
            'observation' => $this->observation,
            'securityNumber' => $this->securityNumber,
            'ordinance' => $this->ordinance,
            'restriction' => $this->restriction,
            'mirrorNumber' => $this->mirrorNumber,
            'totalPoints' => $this->totalPoints,
            'statusCNHImage' => $this->statusCNHImage,
            'statusMessageCNHImage' => $this->statusMessageCNHImage,
            'base64CNHImage' => $this->base64CNHImage,
            'infractions' => isset($this->infractions) ? InfractionDetailSerializer::collection($this->infractions) : [],
            'suspensions' => isset($this->suspensions) ? SuspensionDetailSerializer::collection($this->suspensions) : [],
            'anttResult' => isset($this->anttResult) ? new AnttResponseSerializer($this->anttResult) : null,
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'faceBase64' => $data['faceBase64'] ?? null,
            'validationStatusDocumentImage' => $data['validationStatusDocumentImage'] ?? null,
            'validationStatusCnh' => $data['validationStatusCnh'] ?? null,
            'validationStatusSecurityNumber' => $data['validationStatusSecurityNumber'] ?? null,
            'validationStatusUf' => $data['validationStatusUf'] ?? null,
            'validationImageMessage' => $data['validationImageMessage'] ?? null,
            'renachNumber' => $data['renachNumber'] ?? null,
            'registerNumber' => $data['registerNumber'] ?? null,
            'category' => $data['category'] ?? null,
            'name' => $data['name'] ?? null,
            'rgNumber' => $data['rgNumber'] ?? null,
            'ufRg' => $data['ufRg'] ?? null,
            'emissorRg' => $data['emissorRg'] ?? null,
            'cpf' => $data['cpf'] ?? null,
            'birthDate' => $data['birthDate'] ?? null,
            'issuanceDate' => $data['issuanceDate'] ?? null,
            'firstLicenseDate' => $data['firstLicenseDate'] ?? null,
            'expiryDate' => $data['expiryDate'] ?? null,
            'performsPaidActivity' => $data['performsPaidActivity'] ?? null,
            'moopCourse' => $data['moopCourse'] ?? null,
            'localIssuance' => $data['localIssuance'] ?? null,
            'observation' => $data['observation'] ?? null,
            'securityNumber' => $data['securityNumber'] ?? null,
            'ordinance' => $data['ordinance'] ?? null,
            'restriction' => $data['restriction'] ?? null,
            'mirrorNumber' => $data['mirrorNumber'] ?? null,
            'totalPoints' => $data['totalPoints'] ?? null,
            'statusCNHImage' => $data['statusCNHImage'] ?? null,
            'statusMessageCNHImage' => $data['statusMessageCNHImage'] ?? null,
            'base64CNHImage' => $data['base64CNHImage'] ?? null,
            'infractions' => isset($data['infractions']) ? array_map(function ($infraction) {
                return InfractionSerializer::fromArray($infraction);
            }, $data['infractions']) : [],
            'suspensions' => isset($data['suspensions']) ? array_map(function ($suspension) {
                return SuspensionSerializer::fromArray($suspension);
            }, $data['suspensions']) : [],
            'anttResult' => isset($data['anttResult']) ? AnttResponseSerializer::fromArray($data['anttResult']) : null,
        ]);
    }
}
