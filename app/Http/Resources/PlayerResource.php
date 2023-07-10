<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'value' => $this->value,
            'position' => PlayerPositionResource::make($this->whenLoaded('position')),
            'team' => TeamResource::make($this->whenLoaded('team')),
            'country' => CountryResource::make($this->whenLoaded('country'))
        ];
    }
}
