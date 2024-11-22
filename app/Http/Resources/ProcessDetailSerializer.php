<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'number' => $this->resource['number'],
            'uf' => $this->resource['uf'],
            'date' => $this->resource['date'],
            'area' => $this->resource['area'],
            'classDescription' => $this->resource['classDescription'],
            'situation' => $this->resource['situation'],
            'districtProcess' => $this->resource['districtProcess'],
            'court' => $this->resource['court'],
            'parts' => PartProcessDetailSerializer::collection($this->resource['parts']),
            'subjects' => $this->resource['subjects'],
            'policeDistrictData' => PoliceDistrictDataSerializer::collection($this->resource['policeDistrictData']),
            'articles' => ArticleSerializer::collection($this->resource['articles']),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
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
