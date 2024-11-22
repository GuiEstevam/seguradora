<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrafficTicketRestrictionDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'infractions' => InfractionVehicleSerializer::collection($this->infractions),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'infractions' => array_map(function ($infraction) {
                return InfractionVehicleSerializer::fromArray($infraction);
            }, $data['infractions']),
        ]);
    }
}
