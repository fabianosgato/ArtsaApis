<?php

declare(strict_types=1);

namespace Idea\Framework\Interfaces\Auth;

use Idea\Framework\Interfaces\ServiceInterface;

interface TokenServiceInterface extends ServiceInterface
{
    /**
     * Authenticate the user and issue an access token.
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function issueToken(
        string $email,
        string $password,
        string $deviceName
    ): string;

}

