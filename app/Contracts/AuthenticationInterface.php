<?php

namespace App\Contracts;

use App\Data\CredentialsData;
use Illuminate\Http\JsonResponse;

interface AuthenticationInterface
{
    public function login(CredentialsData $credentials): JsonResponse;
    public function logout(): JsonResponse;
}
