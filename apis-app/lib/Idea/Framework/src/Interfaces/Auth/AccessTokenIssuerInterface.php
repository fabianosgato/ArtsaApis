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
namespace Idea\Framework\Interfaces\Auth;

interface AccessTokenIssuerInterface
{

}