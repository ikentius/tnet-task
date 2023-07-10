<?php

namespace App\Data;

use Illuminate\Foundation\Http\FormRequest;

final readonly class CredentialsData
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            email: $request->email,
            password: $request->password,
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
