<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfractionDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'infractions' => isset($this->infractions) ? InfractionSerializer::collection($this->infractions) : [],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'infractions' => array_map(function ($infraction) {
                return InfractionSerializer::fromArray($infraction);
            }, $data['infractions'] ?? []),
        ]);
    }
}
