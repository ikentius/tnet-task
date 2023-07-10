<?php

namespace App\Contracts;

use App\Data\RegistrationData;
use Illuminate\Http\JsonResponse;

interface UserManagementServiceInterface
{
    public function register(RegistrationData $data): JsonResponse;
}
