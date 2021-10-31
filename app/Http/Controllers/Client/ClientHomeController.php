<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        $productRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('client.layout.home',compact('slider','categorys','products',
        'productRecommend','categorysLimit'));
    }
}
