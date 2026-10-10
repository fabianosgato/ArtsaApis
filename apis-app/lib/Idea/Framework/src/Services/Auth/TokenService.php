<?php

namespace Idea\Framework\Services\Auth;

use Idea\Framework\Interfaces\Auth\TokenServiceInterface;

class TokenService implements TokenServiceInterface
{

    /**
     * @inheritDoc
     */
    public function issueToken(string $email, string $password, string $deviceName): string
    {



    }
}