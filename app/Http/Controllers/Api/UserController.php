<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\DTO\User\UserRegisterDTO;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserService $service,
    ){}

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $dto = new UserRegisterDTO(
            $request->email,
            $request->password,
            $request->gender,
        );
        $result = $this->service->register($dto);

        return response()->json([
            'access_token' => $result['token'],
            'token_type' => 'Bearer',
        ], 201);
    }


    public function profile(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
