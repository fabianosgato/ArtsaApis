<?php

namespace Modules\Mercadolivre\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Mercadolivre\Services\MercadoLivreService;

class MercadolivreController extends Controller
{

    protected MercadoLivreService $meli;

    public function __construct(MercadoLivreService $meli)
    {
        $this->meli = $meli;
    }

    public function authUrl()
    {
        return response()->json([
            'url' => $this->meli->getAuthorizationUrl()
        ]);
    }

    public function callback(Request $request)
    {
        $code = $request->get('code');

        if (!$code) {
            return response()->json(['error' => 'Code not provided'], 400);
        }

        $this->meli->storeTokenFromCode($code);

        return response()->json(['message' => 'Token salvo com sucesso']);

    }

    public function notifications(Request $request)
    {
        \Log::info('MELI Notification', $request->all());
        return response()->json(['status' => 'ok']);
    }

}
