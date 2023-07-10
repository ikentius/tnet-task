<?php

namespace App\Data;

use Illuminate\Foundation\Http\FormRequest;

final readonly class MarketplaceData
{
    public function __construct(
        public int $playerId,
        public float $price,
    ) {
    }

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            playerId: $request->player_id,
            price: $request->price,
        );
    }

    public function toArray(): array
    {
        return [
            'player_id' => $this->playerId,
            'price' => $this->price,
        ];
    }
}
