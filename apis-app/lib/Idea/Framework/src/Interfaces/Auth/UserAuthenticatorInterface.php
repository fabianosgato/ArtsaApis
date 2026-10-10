<?php
/**
 * O retorno usa o contrato Authenticatable do Laravel, em vez de App\Models\User.
 *
 * Assim, qualquer model de usuário compatível pode ser utilizado. A implementação concreta ficará responsável
 * por verificar as credenciais e rejeitar contas inativas.
 *
 * A emissão do token ficará atrás de outra abstração, para que TokenService também não precise
 * conhecer diretamente o Sanctum.
 *
 */
declare(strict_types=1);

namespace Idea\Framework\Interfaces\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserAuthenticatorInterface
{
    /**
     * Authenticate a user using the provided credentials.
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function authenticate(
        string $email,
        string $password
    ): Authenticatable;

}