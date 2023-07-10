<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'value'=> $this->value,
            'country' => CountryResource::make($this->whenLoaded('country')),
            'players' => PlayerResource::collection($this->whenLoaded('players'))
        ];
    }
}
