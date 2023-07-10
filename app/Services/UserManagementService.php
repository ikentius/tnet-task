<?php

namespace App\Services;

use App\Contracts\UserManagementServiceInterface;
use App\Data\RegistrationData;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\JsonResponse;


final readonly class UserManagementService implements UserManagementServiceInterface
{
    public function __construct(
        private ResponseFactory $responseFactory,
        private Dispatcher $eventDispatcher
    ) {
    }

    public function register(RegistrationData $data): JsonResponse
    {
        $user = User::create(attributes: $data->toArray());

        $this->eventDispatcher->dispatch(new Registered($user));

        return $this->responseFactory->json(data: ['message' => __('auth.registered')]);
    }
}
