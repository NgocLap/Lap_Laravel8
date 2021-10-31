<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientCategoryController extends Controller
{
    public function index($slug, $categoryId)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where(['category_id' => $categoryId])->get();

        return view('client.components.product.list', compact('categorysLimit','categorys','products'));
    }
}
