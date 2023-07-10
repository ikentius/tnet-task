<?php

namespace App\Services\PopulateCountries;

use App\Contracts\ImportCountriesInterface;
use App\Services\PopulateCountries\Strategies\DevTestStrategy;
use Illuminate\Http\Client\Factory as Http;

class PopulateCountriesStrategyContext
{
    private ImportCountriesInterface $populateCountries;

    public function __construct(
        string $method
    ) {
        $this->populateCountries = match ($method) {
            'devtest' => new DevTestStrategy(new Http()),
            default => throw new \InvalidArgumentException(message: 'incorrect strategy provided')
        };
    }

    public function import(): void
    {
        $this->populateCountries->import();
    }
}
