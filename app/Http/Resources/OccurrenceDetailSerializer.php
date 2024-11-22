<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OccurrenceDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'occurrences' => isset($this->occurrences) ? OccurrenceSerializer::collection($this->occurrences) : [],
        ];
    }

    public static function fromArray(array $data)
    {
        return new static((object) [
            'occurrences' => array_map(function ($occurrence) {
                return OccurrenceSerializer::fromArray($occurrence);
            }, $data['occurrences'] ?? []),
        ]);
    }
}
