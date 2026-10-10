<?php

namespace Tests\Unit\Services\Auth;

use App\Models\User;
use Idea\Framework\Services\Auth\UserAuthenticator;
use Illuminate\Auth\SessionGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class UserAuthenticatorTest extends TestCase
{
    /**
     * @throws \Throwable
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function test_authenticates_an_active_user_with_valid_credentials(): void
    {
        // Arrange: prepara o usuário e as dependências simuladas.
        $user = new User();
        $user->status = true;

        $provider = Mockery::mock(UserProvider::class);

        $provider->shouldReceive('retrieveByCredentials')
            ->once()
            ->with(['email' => 'fabiano@test-example.com'])
            ->andReturn($user);

        $provider->shouldReceive('validateCredentials')
            ->once()
            ->with($user, ['password' => 'XnigLinkgqw12344'])
            ->andReturn(true);

        $guard = Mockery::mock(SessionGuard::class);

        $guard->shouldReceive('getProvider')
            ->once()
            ->andReturn($provider);

        Auth::shouldReceive('guard')
            ->once()
            ->andReturn($guard);

        // Act: executa a classe que queremos testar.
        $authenticator = new UserAuthenticator();

        $authenticatedUser = $authenticator->authenticate(
            'fabiano@test-example.com',
            'XnigLinkgqw12344'
        );

        // Assert: verifica o resultado.
        $this->assertSame($user, $authenticatedUser);

    }

    public function test_rejects_invalid_password(): void
    {
        $user = new User();
        $user->status = true;

        $provider = Mockery::mock(UserProvider::class);

        $provider->shouldReceive('retrieveByCredentials')
            ->once()
            ->with(['email' => 'fabiano@example.com'])
            ->andReturn($user);

        $provider->shouldReceive('validateCredentials')
            ->once()
            ->with($user, ['password' => 'wrong-password'])
            ->andReturn(false);

        $guard = Mockery::mock(SessionGuard::class);

        $guard->shouldReceive('getProvider')
            ->once()
            ->andReturn($provider);

        Auth::shouldReceive('guard')
            ->once()
            ->andReturn($guard);

        $authenticator = new UserAuthenticator();

        $this->expectException(
            \Illuminate\Auth\AuthenticationException::class
        );

        $authenticator->authenticate(
            'fabiano@example.com',
            'wrong-password'
        );
    }

}