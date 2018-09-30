<?php

namespace Pomot\UseCases;

use Pomot\Domains\Log\Log;
use Pomot\Domains\Log\Tag;
use Pomot\User;
use Symfony\Component\HttpFoundation\ParameterBag;

class RegisterLogUseCase
{
    public function register(User $user, ParameterBag $parameters)
    {
        try {
            $log = new Log($parameters->all());

            return [
                'valid'  => true,
                'errors' => [],
                'log'    => null,
            ];
        } catch (\Exception $e) {
        }
    }
}
