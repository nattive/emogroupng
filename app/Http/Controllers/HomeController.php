<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Ramsey\Uuid\Generator\PeclUuidRandomGenerator;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Generate a user unique id
        $userUniqueId = "guest" . random_int(99, 9999) . '_' . strtotime(random_int(1978, 2019));
        $categories = ProductCategory::inRandomOrder()->with('products')->get();
        return view('index', compact('userUniqueId', 'categories'));
    }
    public function shop()
    {
        //Generate a user unique id
        // $userUniqueId = "guest" . random_int(99, 9999) . '_' . strtotime(random_int(1978, 2019));
        return view('shop');
    }
    public function product($slug)
    {
        $product = product::where('name', $slug)->first();
        return view('product', compact('product'));
    }
    public function cart()
    {
        // dd(Cart::instance('shopping')->content());
        return view('cart');
    }  
    public function checkout()
    {
        return view('checkout');
    }
     public function blog()
    {
        return view('blog');
    }
     public function about()
    {
        return view('about');
    }
}
