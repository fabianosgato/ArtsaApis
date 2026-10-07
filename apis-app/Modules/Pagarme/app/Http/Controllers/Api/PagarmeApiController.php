<?php
/**
 * Fabiano Gato
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 *
 * Não editar ou acrescentar à este arquivo se você quiser fazer o upgrade para versões
 * mais recentes no futuro.
 *****************************************************
 *
 * @copyright    Copyright (c) Fabiano Gato
 * @author       Fabiano Gato <fabianogattoti@gmail.com>
 *
 */

namespace Modules\Pagarme\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagarmeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true
        ]);
    }

    public function orders(Request $request)
    {

        return response()->json(
            [
                'id' => 'or_AeObDlYTJu22bl9k',
                'code' => 'EXA-00000000001',
                'amount' => 500000,
                'currency' => 'BRL',
                'closed' => true,
                'items' => [
                    [
                        'id' => 'oi_Na6RLX8c9HDaRwkv',
                        'type' => 'product',
                        'description' => 'Vacina contra o sarampo, 18/08 às 10:00',
                        'amount' => 500000,
                        'quantity' => 1,
                        'status' => 'active',
                        'created_at' => '2026-10-07T09:58:46Z',
                        'updated_at' => '2026-10-07T09:58:46Z',
                        'code' => 'EXA0000006'
                    ]
                ],
                'customer' => [
                    'id' => 'cus_A3aVzqqF6UWNzpRP',
                    'name' => 'Fabiano Gatto',
                    'email' => 'fabiano.sgato@gmail.com',
                    'document' => '03660314650',
                    'document_type' => 'cpf',
                    'type' => 'individual',
                    'delinquent' => false,
                    'address' => [
                        'id' => 'addr_1JBGNENsmTb9Oe8b',
                        'line_1' => '340, Rua Conrado de Brito, Custódio Pereira',
                        'line_2' => 'Casa',
                        'zip_code' => '38405206',
                        'city' => 'Uberlândia',
                        'state' => 'MG',
                        'country' => 'BR',
                        'status' => 'active',
                        'created_at' => '2026-08-22T12:27:28Z',
                        'updated_at' => '2026-08-22T12:48:14Z'
                    ],
                    'created_at' => '2026-08-22T12:27:28Z',
                    'updated_at' => '2026-08-22T12:48:14Z',
                    'birthdate' => '1993-01-09T00:00:00Z',
                    'phones' => [
                        'home_phone' => [
                            'country_code' => '55',
                            'number' => '000000000',
                            'area_code' => '11'
                        ],
                        'mobile_phone' => [
                            'country_code' => '55',
                            'number' => '998119639',
                            'area_code' => '34'
                        ]
                    ],
                    'metadata' => [
                        'classificação' => 'Cliente VIP'
                    ]
                ],
                'status' => 'paid',
                'created_at' => '2026-10-07T09:58:46Z',
                'updated_at' => '2026-10-07T09:58:48Z',
                'closed_at' => '2026-10-07T09:58:46Z',
                'charges' => [
                    [
                        'id' => 'ch_PGLVxk8fYSZpBlwq',
                        'code' => 'EXA-00000000001',
                        'gateway_id' => '2213771563',
                        'amount' => 500000,
                        'paid_amount' => 500000,
                        'status' => 'paid',
                        'currency' => 'BRL',
                        'payment_method' => 'credit_card',
                        'paid_at' => '2026-10-07T09:58:48Z',
                        'created_at' => '2026-10-07T09:58:46Z',
                        'updated_at' => '2026-10-07T09:58:48Z',
                        'customer' => [
                            'id' => 'cus_A3aVzqqF6UWNzpRP',
                            'name' => 'Fabiano Gatto',
                            'email' => 'fabiano.sgato@gmail.com',
                            'document' => '03660314650',
                            'document_type' => 'cpf',
                            'type' => 'individual',
                            'delinquent' => false,
                            'address' => [
                                'id' => 'addr_1JBGNENsmTb9Oe8b',
                                'line_1' => '340, Rua Conrado de Brito, Custódio Pereira',
                                'line_2' => 'Casa',
                                'zip_code' => '38405206',
                                'city' => 'Uberlândia',
                                'state' => 'MG',
                                'country' => 'BR',
                                'status' => 'active',
                                'created_at' => '2026-08-22T12:27:28Z',
                                'updated_at' => '2026-08-22T12:48:14Z'
                            ],
                            'created_at' => '2026-08-22T12:27:28Z',
                            'updated_at' => '2026-08-22T12:48:14Z',
                            'birthdate' => '1993-01-09T00:00:00Z',
                            'phones' => [
                                'home_phone' => [
                                    'country_code' => '55',
                                    'number' => '000000000',
                                    'area_code' => '11'
                                ],
                                'mobile_phone' => [
                                    'country_code' => '55',
                                    'number' => '998119639',
                                    'area_code' => '34'
                                ]
                            ],
                            'metadata' => [
                                'classificação' => 'Cliente VIP'
                            ]
                        ],
                        'last_transaction' => [
                            'brand_id' => '524698',
                            'id' => 'tran_EKawvY2uPnFXkZR2',
                            'transaction_type' => 'credit_card',
                            'gateway_id' => '2213771563',
                            'amount' => 500000,
                            'status' => 'captured',
                            'success' => true,
                            'installments' => 1,
                            'statement_descriptor' => 'EXAMIX',
                            'acquirer_name' => 'pagarme',
                            'acquirer_tid' => '2213771563',
                            'acquirer_nsu' => '2213771563',
                            'acquirer_auth_code' => '626563',
                            'acquirer_message' => 'Transação aprovada com sucesso',
                            'acquirer_return_code' => '0000',
                            'operation_type' => 'auth_and_capture',
                            'card' => [
                                'id' => 'card_XJAbMXGsgsVejoEG',
                                'first_six_digits' => '400000',
                                'last_four_digits' => '0010',
                                'brand' => 'Visa',
                                'holder_name' => 'Tony Stark',
                                'exp_month' => 1,
                                'exp_year' => 2030,
                                'status' => 'active',
                                'type' => 'credit',
                                'created_at' => '2026-08-22T12:27:28Z',
                                'updated_at' => '2026-10-07T09:58:46Z',
                                'billing_address' => [
                                    'zip_code' => '05425070',
                                    'city' => 'São Paulo',
                                    'state' => 'SP',
                                    'country' => 'BR',
                                    'line_1' => '7221, Avenida Dra Ruth Cardoso, Pinheiro'
                                ]
                            ],
                            'funding_source' => 'credit',
                            'created_at' => '2026-10-07T09:58:46Z',
                            'updated_at' => '2026-10-07T09:58:46Z',
                            'gateway_response' => [
                                'code' => '200'
                            ],
                            'antifraud_response' => [
                                'status' => 'approved',
                                'score' => 'moderated',
                                'provider_name' => 'pagarme'
                            ],
                            'metadata' => []
                        ]
                    ]
                ],
                'checkouts' => []
            ]
        );
    }

}
