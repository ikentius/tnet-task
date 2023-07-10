<?php

namespace App\Services;

use Illuminate\Auth\AuthManager;
use App\Contracts\AuthenticationInterface;
use App\Data\CredentialsData;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

final readonly class SanctumAuthenticationService implements AuthenticationInterface
{
    public function __construct(
        private AuthManager $authManager,
        private ResponseFactory $responseFactory,

    ) {
    }

    public function login(CredentialsData $credentials): JsonResponse
    {
        if (!$this->authManager->attempt($credentials->toArray())) {

            return $this->responseFactory->json(
                data: ['message' => __('auth.failed'),],
                status: 401
            );
        };

        $user = User::where('email', $credentials->email)->first();

        $token = $user->createToken('auth-token')->plainTextToken;

        return $this->responseFactory->json(
            data: [
                'message' => __('auth.success'),
                'token' => $token,
            ],
            status: 200
        );
    }

    public function logout(): JsonResponse
    {
        $this->authManager->user()->tokens()->revoke();

        return $this->responseFactory->json(status: 200);
    }
}
