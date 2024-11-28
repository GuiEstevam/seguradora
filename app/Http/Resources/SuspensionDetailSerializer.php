<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuspensionDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'suspensions' => isset($this->suspensions) ? SuspensionSerializer::collection($this->suspensions) : [],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'suspensions' => array_map(function ($suspension) {
                return SuspensionSerializer::fromArray($suspension);
            }, $data['suspensions'] ?? []),
        ]);
    }
}
