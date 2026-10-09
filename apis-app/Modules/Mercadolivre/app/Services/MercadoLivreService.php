<?php

namespace Modules\Mercadolivre\Services;

use App\Models\MeliAuthToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class MercadoLivreService
{
    protected string $baseUri;
    protected string $clientId;
    protected string $clientSecret;
    protected string $redirectUri;

    protected string $defaultUser = 'default';

    public function __construct()
    {
        $this->baseUri      = 'test';
        $this->clientId     = 'teste-client-id';
        $this->clientSecret = 'services.mercadolivre.client_secret';
        $this->redirectUri  = 'services.mercadolivre.redirect_uri';
    }

    public function getAuthorizationUrl(): string
    {
        return "https://auth.mercadolivre.com.br/authorization" .
            "?response_type=code" .
            "&client_id={$this->clientId}" .
            "&redirect_uri={$this->redirectUri}";
    }

    /**
     * Salva token inicial após callback
     */
    public function storeTokenFromCode(string $code): MeliAuthToken
    {

        $response = Http::asForm()->post("{$this->baseUri}/oauth/token", [
            'grant_type'    => 'authorization_code',
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code'          => $code,
            'redirect_uri'  => $this->redirectUri,
        ]);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        $data = $response->json();

        return $this->persistToken($data);
    }

    /**
     * Retorna token válido (auto refresh se necessário)
     */
    public function getValidAccessToken(): string
    {
        $token = MeliAuthToken::query()->where(
            column: 'user_identifier',
            operator: '=',
            value: $this->defaultUser)->first();

        if (!$token) {
            throw new \Exception('Token não encontrado. Autorize primeiro.');
        }

        if ($token->isExpired()) {
            $token = $this->refreshToken($token);
        }

        return $token->access_token;
    }

    protected function refreshToken(MeliAuthToken $token): MeliAuthToken
    {

        $response = Http::asForm()->post("{$this->baseUri}/oauth/token", [
            'grant_type'    => 'refresh_token',
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $token->refresh_token,
        ]);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $this->persistToken($response->json());
    }

    protected function persistToken(array $data): MeliAuthToken
    {
        return MeliAuthToken::query()->updateOrCreate(
            [
                'user_identifier' => $this->defaultUser
            ],
            [
                'access_token'  => $data['access_token'],
                'refresh_token' => $data['refresh_token'],
                'expires_at'    => Carbon::now()->addSeconds($data['expires_in'] - 60),
            ]
        );
    }

    /**
     * Categorias com token automático
     */
    public function getCategories(string $site = 'MLB'): array
    {
        $token = $this->getValidAccessToken();

        $response = Http::withToken($token)
            ->get("{$this->baseUri}/sites/{$site}/categories");

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json();
    }

    /**
     * Retorna a informação completa da Categoria do MercadoLivre
     */
    public function getCategoryInfo(string $mlCategoryId): array
    {

        $token = $this->getValidAccessToken();

        $response = Http::withToken($token)
            ->get("{$this->baseUri}/categories/{$mlCategoryId}");

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json();
    }

    /**
     * Retorna a informação completa da Categoria do MercadoLivre
     */
    public function getCategoryAttributes(string $mlCategoryId): array
    {

        $token = $this->getValidAccessToken();

        $response = Http::withToken($token)
            ->get("{$this->baseUri}/categories/{$mlCategoryId}/attributes");

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json();
    }

}
