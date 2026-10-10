<?php
/**
 * O UserAuthenticatorInterface autentica o usuário.
 * Já o AccessTokenIssuerInterface representa a capacidade de emitir um token para esse usuário.
 *
 * Essa separação permite que uma aplicação use Sanctum, enquanto outra pode fornecer uma implementação diferente, sem modificar o TokenService.
 *
 * O tipo Authenticatable é um contrato do próprio Laravel, adequado para a biblioteca reutilizável.
 * A implementação concreta da emissão, por sua vez, ficará na aplicação que utiliza o Sanctum.
 *
 */
declare(strict_types=1);

namespace Idea\Framework\Interfaces\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

interface AccessTokenIssuerInterface
{
    /**
     * Issue an access token for an authenticated user.
     */
    public function issue(
        Authenticatable $user,
        string $deviceName
    ): string;
}