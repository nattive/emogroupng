<?php

namespace App\Http\Controllers;

use App\Brand;
use App\category;
use App\Customer;
use App\Discount;
use App\messages;
use App\product;
use App\ProductCategory;
use App\subscriber;
use App\Testimonials;
use App\transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('ok');
        $transacrions = transaction::all();
        $sum = 0;
        for ($i = 0; $i < $transacrions->count(); $i++) {
            $sum  = $transacrions[$i]->amount + $sum;
        }
        $subscribers = subscriber::all();
        $messages = messages::all();
        $products = product::all();

        $unread = messages::where('isRead', false)->count();
        return view('admin.dashboard', compact('subscribers', 'messages', 'unread', 'products', 'sum', 'transacrions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $Categories = ProductCategory::all();
        return view('admin.addProduct', compact('brands', 'Categories'));
    }

    public function Testimony(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'Image' => 'required',
            'Body' => 'required',
        ]);
        $imagePath =  $request->Image->store('product', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 600);
        $image->save();
        $imageArray = array(
            'Image' => $imagePath,
        );
        // return $validatedData;
        Testimonials::create(array_merge(
            $validatedData,
            $imageArray
        ));
        return back()->with('Message', 'Testimony Uploaded');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// return $request-> all();
        $validatedData = $request->validate([
            'name' => 'max:255',
            'amount' => 'required',
            'old_amount' => '',
            'stock' => 'required',
            'carton' => '',
            'Picture' => 'required',
            'description' => 'required',
            'pack' => '',
            'genderSpecification' => 'required',
            'brand' => 'required',
        ]);
           $product = new product;
        $imagePath = \Cloudinary::upload($request->file('Picture')->getRealPath())->getSecurePath();
        
        // $imagePath = request('Picture')->store('product', 'public');
        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(600, 800);
        // $image->save();
        $product->name = $request->name;
        $product->carton = $request->carton;
        $product->pack = $request->pack;
        $product->amount = $request->amount;
        $product->old_amount = $request->old_amount;
        $product->description = $request->description;
        if ($request->stock <= 0) {
            $product->stock = 'Out Of Stock';
        } else {
            $product->stock = $request->stock;
        }
        $product->product_category_id = $request->CategoryName;
        $product->brand_id = $request->brand;
        $product->genderSpecification = $request->genderSpecification;
        $product->image = $imagePath;
        $product->save();
        return back()->with('Message', 'Product Uploaded');
    }

    /**
     * Shows brand and category display page
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function createBAC()
    {
        $brands = Brand::all();
        $Categories = ProductCategory::all();
        return view('admin.createBaC', compact('brands', 'Categories'));
    }

    public function createCategory(Request $request)
    {
        $validatedData = $request -> validate([
            'categoryName' => 'required|unique:product_categories'
        ]);

        ProductCategory::create($validatedData);
        $success = 'Created Successfully';
        return redirect()->route('admin.createBAC', compact('success'));
    }

    public function createBrand(Request $request)
    {
        $validatedData = $request -> validate([
            'BrandName' => 'required|unique:brands'
        ]);

        Brand::create($validatedData);

        $success = 'Created Successfully';
        return redirect()->route('admin.createBAC', compact('success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product  = product::where('name', $slug)->first();
        return view('admin.addProduct', compact('product'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'amount' => 'required',
            'stock' => 'required',
            'category' => '',
            'Picture' => '',
            'description' => '',
        ]);
        $product = product::where('id', $id)->first();
        if (request('Picture')) {
            $imagePath = request('Picture')->store('product', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 1000);
            $image->save();
            $product->image = $imagePath;
        }
        $product->name = $request->name ?? $product->name;
        $product->amount =  $request->amount ?? $product->amount;
        $product->description =  $request->description ?? $product->description;


        if ($request->stock <= 0) {
            $product->stock = 'Out Of Stock';
        } else {
            $product->stock =  $request->stock ?? $product->stock;
        }

        $product->category_id =  $request->category_id ?? $product->category_id;
        $product->save();
        return response('done', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = product::where('id', $id)->first();
        $products->delete();
        $message = 'Products deleted';
        return back()->with($message);
    }
    public function products_all()
    {
        $products = product::all();
        return view('admin.productslist', compact('products'));
    }

    public function Order()
    {
        $products = product::all();
        $customer = Customer::all();
        $transacrions = transaction::orderBy('created_at', 'desc')->get();
        return view('admin\Orders', compact('products', 'transacrions', 'customer'));
    }
    public function discount()
    {
        $discounts = Discount::all();
        return view('admin\discount', compact('discounts'));
    }
    public function customerDetails($id, Request $request)
    {
        $customer = Customer::where('id', $id)->first();
        $transaction = transaction::where('transactionRef', $request->transactionRef)->first();
        $carts = Cart::instance('shopping')->restore($request->transactionRef);
        // dd($carts);
        return view('admin.customerDetails', compact('customer', 'transaction', 'carts'));
    }
}
