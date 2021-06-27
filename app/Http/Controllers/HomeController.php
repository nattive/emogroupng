<?php

namespace App\Http\Controllers;

use App\blog;
use App\category;
use App\Customer;
use App\product;
use App\ProductCategory;
use App\transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

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
        $blogs = blog::latest()->limit(3)->get();
        $categories = category::all();

        //Generate a user unique id
        $userUniqueId = "guest" . random_int(99, 9999) . '_' . strtotime(random_int(1978, 2019));
        $ProductCategories = ProductCategory::inRandomOrder()->with('products')->get();
        return view('index', compact('userUniqueId', 'ProductCategories', 'blogs', 'categories'));
    }
    public function shop()
    {
        //Generate a user unique id
        // $userUniqueId = "guest" . random_int(99, 9999) . '_' . strtotime(random_int(1978, 2019));
        return view('shop');
    }
    public function product($slug)
    {
       $product = product::where('name', $slug)->with(['brand'])->first();
        return view('product', compact('product'));
    }
    public function cart()
    {
        //    Cart::instance('shopping')->destroy();

        return view('cart');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function blog()
    {
        $blogs = blog::all();
        $categories = category::all();
        return view('Blog', compact('blogs', 'categories'));
    }
    public function about()
    {
        return view('about');
    }
    public function track()
    {
        return view('track');
    }
    public function viewpost($id)
    {
        $categories = category::all();
        $blogs = blog::latest()->get();
        $post = blog::find($id);
        return view('viewPost', compact('post', 'blogs', 'categories'));
    }

    public function thankyou($id)
    {
        $transaction = transaction::where('transactionRef', $id)->first();
        $cart = DB::table('shoppingcart')->where('identifier', $id)->first();
        $content = unserialize($cart->content);
        $customer = Customer::find($transaction->customer_id);
        return view('thankyou', compact('transaction', 'content', 'customer'));
    }
    public function trackshow()
    {
        $transaction = transaction::where('transactionRef', request('order'))->first();
        if ($transaction) {

            $cart = DB::table('shoppingcart')->where('identifier', request('order'))->first();
            $content = unserialize($cart->content);
            $customer = Customer::find($transaction->customer_id);
            return view('thankyou', compact('transaction', 'content', 'customer'));

        } else {
            return view('thankyou');
        }

    }
    public function Subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|unique:subscribers',
        ]);
        subscriber::create($data);
        return \route('home');
    }
     public function search()
    {
        $search_products = product::where('name', 'like', '%' . request('Search') . '%')->get();
        return view('shop', compact('search_products'));
    }
}
