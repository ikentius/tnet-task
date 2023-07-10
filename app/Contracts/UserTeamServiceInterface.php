<?php

namespace App\Contracts;
use App\Http\Requests\Team\UpdateTeamRequest;
use Illuminate\Http\JsonResponse;

interface UserTeamServiceInterface
{
    public function show(): JsonResponse;

    public function update(UpdateTeamRequest $request): JsonResponse;
}
