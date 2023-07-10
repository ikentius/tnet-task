<?php

namespace App\Http\Controllers;

use App\Contracts\AuthenticationInterface;
use App\Data\CredentialsData;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

final class AuthenticationController extends Controller
{
    public function __construct(
        private readonly AuthenticationInterface $authenticationService
    ) {
    }

    public function login(LoginRequest $loginRequest): JsonResponse
    {
        return $this->authenticationService->login(CredentialsData::fromRequest($loginRequest));
    }

    public function logout(): JsonResponse
    {
        return $this->authenticationService->logout();
    }
}
