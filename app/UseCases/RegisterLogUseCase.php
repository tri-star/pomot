<?php

namespace Pomot\UseCases;

use Pomot\User;
use Symfony\Component\HttpFoundation\ParameterBag;

class RegisterLogUseCase
{

    public function register(User $user, ParameterBag $parameters)
    {
        return [
            'valid' => true,
            'errors' => [],
        ];
    }

}
