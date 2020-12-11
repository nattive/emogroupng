<?php

namespace App\Http\Controllers;

use App\blog;
use App\product;
use App\category;
use App\Customer;
use App\subscriber;
use App\Testimonials;
use App\transaction;
use Artesaos\SEOTools\Facades\SEOTools;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends BassController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $G_categories = category::where('categoryToSub', 'true')->get();
        $G_Testimonies = Testimonials::all();
        $G_posts = blog::orderBy('created_at', 'desc')->take(5);
        $relatedproducts = product::take(4);
        return view()->share(compact('G_categories', 'G_Testimonies', 'relatedproducts', 'G_posts'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Home');
        SEOTools::setDescription('We are a top notch Manufacturer and Distributor of affordable luxury body fragrances; ranging from Bottled perfumes to
					BodySpray, with our Factories in America, Europe and Asia. Our brands include: Storm, Camil and Reebon; fully made of
					the best world leading beautiful scents that leave the user completely allured and ever refreshing.');
        SEOTools::opengraph()->setUrl($_SERVER['HTTP_HOST']);
        SEOTools::twitter()->setSite('Giddy And Claire');
        SEOTools::jsonLd()->addImage(asset('images/logo1.png'));

        $products = product::all();
        $blogs = blog::orderBy('created_at', 'desc')->paginate(6);
        $events = blog::where('PostType', 'event')->paginate(6);
        // return $G_categories;
        return view('home', compact('products', 'blogs', 'events'));
    }

    public function shop()
    {
        SEOTools::setTitle('Home');
        SEOTools::setDescription('Home of luxury cologne and cosmetics');
        SEOTools::opengraph()->setUrl($_SERVER['HTTP_HOST']);
        SEOTools::twitter()->setSite('Giddy And Claire');
        SEOTools::jsonLd()->addImage(asset('images/logo1.png'));
        $products = product::all();
        return view('shop', compact('products'));
    }
    public function product($slug)
    {
        $product = product::where('name', $slug)->first();
        SEOTools::setTitle($product->name);
        SEOTools::setDescription($product->description);
        SEOTools::opengraph()->setUrl($_SERVER['HTTP_HOST']);
        SEOTools::twitter()->setSite('Giddy And Claire');
        SEOTools::jsonLd()->addImage(asset('/storage/' .  $product->image));


        $relatedproducts = product::where('name', '!=', $slug)->paginate(4);
        return view('product', compact('product', 'relatedproducts'));
    }
    public function event()
    {
        $posts = blog::where('PostType', 'event')->get();
        return view('blog', compact('posts'));
    }
    public function about()
    {
        SEOTools::setTitle('About Giddy and Claire');
        SEOTools::setDescription('We are a top notch Manufacturer and Distributor of affordable luxury body fragrances; ranging from Bottled perfumes to
					BodySpray, with our Factories in America, Europe and Asia. Our brands include: Storm, Camil and Reebon; fully made of
					the best world leading beautiful scents that leave the user completely allured and ever refreshing.');
        SEOTools::opengraph()->setUrl($_SERVER['HTTP_HOST']);
        SEOTools::twitter()->setSite('Giddy And Claire');
        SEOTools::jsonLd()->addImage(asset('images/logo1.png'));
        return view('aboutUs');
    }

    public function search(Request $request)
    {
        $products = product::where('name', 'like', '%' . $request->Search . '%')->get();
        return view('search', compact('products'));
    }
    public function cart()
    {
        // // return Cart::instance('shopping')->content();
        $products = product::all();
        // return Cart::instance('shopping')->content();
        return view('cart', compact('products'));
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function contact()
    {
        return view('contact');
    }
    public function blog()
    {
        $posts = blog::orderBy('created_at', 'desc')->get();
        return view('blog', compact('posts'));
    }
    public function blogShow($id)
    {
        $post = blog::where('id', $id)->first();
        $categoties = category::all();
        $recentBlog = blog::where('id', '!=', $id)->orderBy('created_at', 'desc')->paginate(5);
        return view('post', compact('post', 'recentBlog', 'categoties'));
    }
    public function thankYou($id)
    {
        $transaction = transaction::where('transactionRef', $id)->first();
        return view('thankYou', compact('transaction'));
    }
    public function track()
    {
        return view('track');
    }
    public function Subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|unique:subscribers'
        ]);
        subscriber::create($data);
        return  response('Subscribed', 200);
    }
    public function trackshow(Request $request)
    {
        $customer = Customer::all();
        $transaction = transaction::where('transactionRef', 'like', '%' . $request->transactionRef . '%')->first();
        return view('trackResult', compact('transaction', 'customer'));
    }
    public function Cartdestroy()
    {
        Cart::instance('shopping')->destroy();
        return redirect()->back();
    }
}
