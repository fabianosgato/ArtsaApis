<?php

namespace Modules\Mercadolivre\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Mercadolivre\Services\MercadoLivreService;

class MercadoLivreController extends Controller
{

    protected MercadoLivreService $meli;

    public function __construct(MercadoLivreService $meli)
    {
        $this->meli = $meli;
    }

    public function categories()
    {
        $categories = $this->meli->getCategories();
        return response()->json($categories);
    }

    public function categoryInfo(Request $request)
    {

        // Id da Categoria do MercadoLivre
        $categoryId = $request->input('category_id');

        $categories = $this->meli->getCategoryInfo($categoryId);

        return response()->json($categories);
    }

    public function categoryAttributes(Request $request)
    {

        // Id da Categoria do MercadoLivre
        $categoryId = $request->input('category_id');

        $categories = $this->meli->getCategoryAttributes($categoryId);

        return response()->json($categories);
    }

}
