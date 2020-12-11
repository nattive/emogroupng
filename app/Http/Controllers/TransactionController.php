<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\TransactionInitiatedEvent;
use App\transaction;
// use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkout(Request $request)
    {


        // return  $request->all();
        // $request =  $request->CartDetails;

        $customer = Customer::create($request->customerData);
        $orderDetails = [
            'sumTotal' => $request->CartDetails['CheckOutTotal'],
            'deliverCarge' => $request->CartDetails['deliveryCharge'],
            'transactionRef' => $request->CartDetails['transactionRef'],
            'cartContent' =>  $request->CartDetails['cartContent'],
            'confirmPayment' =>  $request->CartDetails['confirmPayment'],
        ];
        $transaction = new transaction();
        $transaction->paymentMode = $request->CartDetails['paymentMode'];
        $transaction->customer_id = $customer->id;
        $transaction->amount = $request->CartDetails['CheckOutTotal'];
        $transaction->confirmPayment = $request->CartDetails['confirmPayment'];
        $transaction->transactionRef =  $request->CartDetails['transactionRef'];
        $transaction->save();
        // return $transaction;

        event(new TransactionInitiatedEvent($orderDetails, $customer));
        // dd('oj');
        Cart::instance('shopping')->store($request->CartDetails['transactionRef']);
        Cart::instance('shopping')->destroy();
        //Notification to admin
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'streetaddress' => 'required',
            'Appartment' => 'required',
            'towncity' => 'required',
            'postcodezip' => '',
            'phone' => 'required',
            'emailaddress' => 'required',
            'transactionRef' => 'required',
            'paymentMode' => ''
        ]);
        transaction::create($validatedData);
        Cart::instance('shopping')->store($request->transactionRef);
        return response('Order posted', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transaction)
    {
        // return $request;
        $validatedData = $request->validate([
            'paymentMode' => '',
            'customer_id' => '',
            'amount' => '',
            'confirmPayment' => '',
            'transactionRef' => '',
            'status' => ''
        ]);
        $transaction = transaction::where('id', $request->id)->first();
        $transaction->paymentMode = $request->paymentMode ?? $transaction->paymentMode;
        $transaction->customer_id = $request->customer_id ?? $transaction->customer_id;
        $transaction->amount = $request->amount ?? $transaction->amount;
        $transaction->confirmPayment = $request->confirmPayment ?? $transaction->confirmPayment;
        $transaction->transactionRef = $request->transactionRef ?? $transaction->transactionRef;
        $transaction->status = $request->status ?? $transaction->status;
        $transaction->save();
        return $transaction;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
