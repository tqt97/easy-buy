<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Knuckles\Scribe\Attributes\Group;

#[Group('Products', 'Managing Products')]
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(5);

        return ProductResource::collection($products);
    }
}
