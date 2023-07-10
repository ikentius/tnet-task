<?php

namespace App\Services\PopulateCountries\Strategies;

use App\Contracts\ImportCountriesInterface;
use App\Data\CountriesData;
use App\Models\Country\Country;
use Illuminate\Http\Client\Factory as Http;

final readonly class DevTestStrategy implements ImportCountriesInterface
{

    public function __construct(private Http $httpClient)
    {
    }

    public function import(): void
    {
        $countries = $this->httpClient->get(config('countries.dev_test_endpoint'))->json();

        foreach ($countries as $country) {
            Country::create(CountriesData::fromDevTestApi($country)->toArray());
        }
    }
}
