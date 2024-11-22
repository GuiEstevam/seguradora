<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RenajudRestrictionDetailSerializer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'restrictions' => RenajudRestrictionSerializer::collection($this->restrictions),
        ];
    }

    public static function fromArray(array $data)
    {
        return new static([
            'restrictions' => array_map(function ($restriction) {
                return RenajudRestrictionSerializer::fromArray($restriction);
            }, $data['restrictions'] ?? []),
        ]);
    }
}
