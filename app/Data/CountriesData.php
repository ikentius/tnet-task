<?php

namespace App\Data;

final readonly class CountriesData
{
    public function __construct(
        public string $code,
        public array $enLocale,
        public array $kaLocale
    )
    {
    }


    public static function fromDevTestApi(array $countryData): self
    {
        return new self(
            code: $countryData['code'],
            enLocale: ["name" => $countryData['name']['en']],
            kaLocale: ["name" => $countryData['name']['ka']],
        );
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'en' => $this->enLocale,
            'ka' => $this->kaLocale,
        ];
    }
}
