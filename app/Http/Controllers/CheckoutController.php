<?php

namespace App\Http\Controllers;
use Stripe\Charge;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Cart;
use Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey('sk_test_MHoadUkbbVhAIr9qQaykAR3B00oOQ1FgrG');
        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount' => Cart::getTotal() * 100, 
            'currency' => 'kzt',
            'description' => 'udemy course practice selling books',
            'source' => $token
        ]); 

        Cart::clear();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
        
        return redirect('/');
    }
}
