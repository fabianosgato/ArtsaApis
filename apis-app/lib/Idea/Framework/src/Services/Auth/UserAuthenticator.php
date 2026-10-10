<?php
declare(strict_types=1);

namespace Idea\Framework\Services\Auth;

use Idea\Framework\Interfaces\Auth\UserAuthenticatorInterface;
use Idea\Framework\Repository\System\SysUserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class UserAuthenticator implements UserAuthenticatorInterface
{
    public function authenticate(
        string $email,
        string $password
    ): Authenticatable
    {

        $user = SysUserRepository::getData()->where(
            column: 'email',
            operator: '=',
            value: $email
        );

        if (
            $user === null ||
            !Hash::check($password, $user->password) ||
            !$user->status
        ) {
            throw new AuthenticationException(
                'Credenciais inválidas.'
            );
        }

        return $user;
    }
}