<?php

namespace App\Http\Controllers;

use App\Brand;
use App\category;
use App\Customer;
use App\Events\TransactionInitiatedEvent;
use App\Http\Resources\productResource;
use App\Mail\transactionalMail;
use App\product;
use App\ProductCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        // Cart::destroy();
        // return  $request->all();
        $duplicate = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($duplicate->isNotEmpty()) {
            $rowId = Cart::instance('shopping')->content()->where('id', $request->id)->first()->rowId;
            // Cart::remove($rowId);
            $arr = array('msg' => 'Already in Cart', 'Status' => false, 'Cart_cout' => Cart::instance('shopping')->content());
            return response($arr, 200);
        } else {
            // Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99 );

            Cart::instance('shopping')->add($request->id, $request->name, $request->qty ?? 1, $request->amount , ['qtyValue' => $request->qtyValue])
                ->associate('\App\Product');;
            $arr = array('msg' => 'Added to cart', 'Status' => true, 'Cart_cout' => Cart::instance('shopping')->content());
            return response($arr, 200);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function fetchAll()
    {
        $products = product::with('brand')->paginate(8);
        return productResource::collection($products);
    }


    /*
    *
    * @param int
    * @return \Illuminate\Http\Response
    * Gets specific number of product 
    *
    */
    public function pick($count)
    {
        $products = product::paginate($count);
        return productResource::collection($products);
    }

    public function fetchProductByCategory($slug)
    {
        $category = ProductCategory::where('categoryName', $slug)->first();
        if ($category) {
            $products = $category->products->all();
            return json_encode($products);
        } else {
            return response("Not found", 404);
        }
    }

    public function fetchProductByBrand($slug)
    {
        $brand = Brand::where('brandName', $slug)->first();
        if ($brand) {
            $products = $brand->products->all();
            return json_encode($products);
        } else {
            return response("Not found", 404);
        }
    }

    public function fetchProductByGender($slug)
    {
        $products = product::where('genderSpecification', $slug)->get();
        return json_encode($products);
    }

    public function fetchAllCategory()
    {
        $categories = ProductCategory::all();
        return json_encode($categories);
    }
    public function fetchAllBrand()
    {
        $brands = Brand::all();
        return json_encode($brands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    public function storeCart(Request $request)
    {
        Cart::store('$request -> email');
    }

    public function updateCart(Request $request)
    {
        $rowId = Cart::instance('shopping')->content()->where('id', $request->id)->first()->rowId;
        Cart::update($rowId,  $request->qty);
        $arr = array(
            'Cart_cout' => Cart::instance('shopping')->count(),
            'subtotal' =>  Cart::instance('shopping')->subtotal(),
            'total' =>  Cart::instance('shopping')->total(),
        );
        return response($arr, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyInCart(Request $request)
    {
        $rowId = Cart::instance('shopping')->content()->where('id', $request->id)->first()->rowId;
        Cart::remove($rowId);
    }
}
