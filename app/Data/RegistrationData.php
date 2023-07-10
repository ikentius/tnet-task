<?php

namespace App\Data;

use Illuminate\Foundation\Http\FormRequest;

final readonly class RegistrationData
{

    public function __construct(
        public string $fullName,
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            fullName: $request->full_name,
            email: $request->email,
            password: $request->password,
        );
    }

    public function toArray(): array
    {
        return [
            'full_name' => $this->fullName,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
