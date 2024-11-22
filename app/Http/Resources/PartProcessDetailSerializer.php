<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartProcessDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->resource['name'],
            'analyzedPart' => $this->resource['analyzedPart'],
            'cpf' => $this->resource['cpf'],
            'birthDate' => $this->resource['birthDate'],
            'type' => $this->resource['type'],
            'situation' => $this->resource['situation'],
            'motherName' => $this->resource['motherName'],
            'rgNumber' => $this->resource['rgNumber'],
            'rgUf' => $this->resource['rgUf'],
            'totalDays' => $this->resource['totalDays'],
            'sentenceDate' => $this->resource['sentenceDate'],
            'endOfSentenceDate' => $this->resource['endOfSentenceDate'],
            'prisionDate' => $this->resource['prisionDate'],
            'releaseDate' => $this->resource['releaseDate'],
            'heinousCrime' => $this->resource['heinousCrime'],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'name' => $data['name'] ?? null,
            'analyzedPart' => $data['analyzedPart'] ?? null,
            'cpf' => $data['cpf'] ?? null,
            'birthDate' => $data['birthDate'] ?? null,
            'type' => $data['type'] ?? null,
            'situation' => $data['situation'] ?? null,
            'motherName' => $data['motherName'] ?? null,
            'rgNumber' => $data['rgNumber'] ?? null,
            'rgUf' => $data['rgUf'] ?? null,
            'totalDays' => $data['totalDays'] ?? null,
            'sentenceDate' => $data['sentenceDate'] ?? null,
            'endOfSentenceDate' => $data['endOfSentenceDate'] ?? null,
            'prisionDate' => $data['prisionDate'] ?? null,
            'releaseDate' => $data['releaseDate'] ?? null,
            'heinousCrime' => $data['heinousCrime'] ?? null,
        ]);
    }
}
