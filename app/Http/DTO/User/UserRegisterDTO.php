<?php

namespace App\Http\DTO\User;

class UserRegisterDTO
{
    public function __construct (
        public string $email,
        public string $password,
        public ?string $gender = null,
    ){}

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'gender' => $this->gender,
        ];
    }
}