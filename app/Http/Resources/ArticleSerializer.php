<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'code' => $this->resource['code'],
            'sequence' => $this->resource['sequence'],
            'description' => $this->resource['description'],
            'classificationCode' => $this->resource['classificationCode'],
            'classificationDescription' => $this->resource['classificationDescription'],
            'groupDescription' => $this->resource['groupDescription'],
            'groupCode' => $this->resource['groupCode'],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'code' => $data['code'] ?? null,
            'sequence' => $data['sequence'] ?? null,
            'description' => $data['description'] ?? null,
            'classificationCode' => $data['classificationCode'] ?? null,
            'classificationDescription' => $data['classificationDescription'] ?? null,
            'groupDescription' => $data['groupDescription'] ?? null,
            'groupCode' => $data['groupCode'] ?? null,
        ]);
    }
}
