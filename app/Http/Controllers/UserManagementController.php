<?php

namespace App\Http\Controllers;

use App\Contracts\UserManagementServiceInterface;
use App\Data\RegistrationData;
use App\Http\Requests\UserManagement\RegistrationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserManagementController extends Controller
{
    public function __construct(
        private readonly UserManagementServiceInterface $userManagement
    )
    {
    }

    public function register(RegistrationRequest $request): JsonResponse
    {
        return $this->userManagement->register(RegistrationData::fromRequest($request));
    }
}
