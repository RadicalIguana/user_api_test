<?php

namespace App\Services\User;

use App\Http\DTO\User\UserRegisterDTO;
use App\Repositories\User\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $repository,
    ){}

    public function register(UserRegisterDTO $dto): array
    {
        $user = $this->repository->create($dto);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}