<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function productDetails($product_id)
    {
        $product = Product::where('user_id', auth()->id())->findOrFail($product_id);
        return response()->json($product );
    }
}
