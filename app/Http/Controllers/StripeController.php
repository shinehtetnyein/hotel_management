<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class StripeController extends Controller
{
   public function stripe($id, $price,$email)
    {
      $stripeSecretKey = config('stripe.stripe_sk');
      $stripe = new \Stripe\StripeClient($stripeSecretKey);
      $response = $stripe->checkout->sessions->create([
          'line_items' => [
              [
                  'price_data' => [
                      'currency' => 'usd',
                      'product_data' => [
                          'name' => 'Room Booking', // Name of the product (required)
                      ],
                      'unit_amount' => $price * 100, // Amount in cents
                  ],
                  'quantity' => 1, // Quantity
              ],
            ],
          // 'automatic_tax' => ['enabled' => true],
          'mode' => 'payment',
          'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
          'cancel_url' => route('cancel'),
      ]);
    //   dd($response);
  
      if (isset($response->id) && $response->id != '') {
          session()->put('room_id',$id);
          session()->put('amount', $price);
          session()->put('email',$email);
          return redirect($response->url);
      } else {
          return redirect()->route('cancel');
      }
   }

   public function success(Request $request){

        if(isset($request->session_id)){
            $stripeSecretKey = config('stripe.stripe_sk');
            $stripe = new \Stripe\StripeClient($stripeSecretKey);
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            // dd($response);

            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->currency = $response->currency;
            $payment->payer_name = $response->customer_details->name;
            $payment->payer_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Strip";
            $payment->amount = session()->get('amount');
            $payment->save();
            
            session()->forget('price');

            return view('hotel.thankYou');
        
        }else{
            return redirect()->route('cancel');
        }

   }

   public function cancel(){
    return view('cancel');
   }
}
