<?php

namespace App\Repositories\User;

use App\Http\DTO\User\UserRegisterDTO;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository
{
    public function create(UserRegisterDTO $dto): User
    {
        return User::create([
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
            'gender' => $dto->gender,
        ]);
    }
}