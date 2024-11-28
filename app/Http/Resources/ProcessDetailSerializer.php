<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'number' => $this->number,
            'uf' => $this->uf,
            'date' => $this->date,
            'area' => $this->area,
            'classDescription' => $this->classDescription,
            'situation' => $this->situation,
            'districtProcess' => $this->districtProcess,
            'court' => $this->court,
            'parts' => PartProcessDetailSerializer::collection($this->parts),
            'subjects' => $this->subjects,
            'policeDistrictData' => PoliceDistrictDataSerializer::collection($this->policeDistrictData),
            'articles' => ArticleSerializer::collection($this->articles),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'number' => $data['number'] ?? null,
            'uf' => $data['uf'] ?? null,
            'date' => $data['date'] ?? null,
            'area' => $data['area'] ?? null,
            'classDescription' => $data['classDescription'] ?? null,
            'situation' => $data['situation'] ?? null,
            'districtProcess' => $data['districtProcess'] ?? null,
            'court' => $data['court'] ?? null,
            'parts' => array_map(function ($part) {
                return PartProcessDetailSerializer::fromArray($part);
            }, $data['parts'] ?? []),
            'subjects' => $data['subjects'] ?? [],
            'policeDistrictData' => array_map(function ($policeData) {
                return PoliceDistrictDataSerializer::fromArray($policeData);
            }, $data['policeDistrictData'] ?? []),
            'articles' => array_map(function ($article) {
                return ArticleSerializer::fromArray($article);
            }, $data['articles'] ?? []),
        ]);
    }
}
