<?php

namespace Tests\Feature;

use Tests\TestCase;

class StoreControllerTest extends TestCase
{

    public function test_stores_endpoint_returns_successful_json_response()
    {

        $response = $this->withHeaders([
            'x-api-user' => env('API_USER'),
            'x-api-key' => env('API_KEY'),
        ])->getJson('/api/v1/stores/');

        $response
            ->assertOk()
            ->assertJsonPath('request_info.success', true)
            ->assertJsonStructure([
                'request_info' => [
                    'success',
                ],
                'request_parameters',
                'request_metadata' => [
                    'created_at',
                    'processed_at',
                ],
                'data',
            ]);
    }

    public function test_stores_endpoint_rejects_invalid_credentials(): void
    {
        $response = $this->withHeaders([
            'x-api-user' => 'usuario_invalido',
            'x-api-key' => 'chave_invalida',
        ])->getJson('/api/v1/stores/');

        $response
            ->assertUnauthorized()
            ->assertJson([
                'message' => 'Unauthenticated user',
            ]);
    }

}
