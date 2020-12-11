<?php

namespace App\Http\Controllers;

use App\Discount;
use App\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class discountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function create(Request $request)
    {
        $dataValidate = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'code' => 'required',
        ]);

        Discount::create($dataValidate);

        return redirect()->route('coupon.index')->with('message', 'Coupon Has been Updated!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $coupon = Discount::where('code', $request->coupon_code)->first();
        if (!$coupon) {
            return redirect()->back()->with('message', 'coupon code invalid');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::instance('shopping')->subtotal()),
        ]);
        return redirect()->back()->with('message', 'coupon code Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::where('id', $id)->first();
         $discount -> delete();
        return redirect()->route('admin.home')->with('message', 'Coupon Has been deleted!');
    }
}
