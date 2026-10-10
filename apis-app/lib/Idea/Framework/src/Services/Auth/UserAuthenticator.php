<?php
declare(strict_types=1);

namespace Idea\Framework\Services\Auth;

use Idea\Framework\Interfaces\Auth\UserAuthenticatorInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserAuthenticator implements UserAuthenticatorInterface
{
    public function authenticate(
        string $email,
        string $password
    ): Authenticatable
    {

        $provider = Auth::guard()->getProvider();

        $user = $provider->retrieveByCredentials([
            'email' => $email,
        ]);

        if (
            $user === null ||
            !$provider->validateCredentials($user, [
                'password' => $password,
            ]) ||
            !($user->status ?? false)
        ) {
            throw new AuthenticationException(
                'Credenciais inválidas.'
            );
        }

        return $user;
    }

}