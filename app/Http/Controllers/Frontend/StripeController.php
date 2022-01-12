<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function index(){
        if (Session::has('order_id')){
            return view('frontend.stripe');
        }else{
            return redirect()->route('cart');
        }
    }

    public function payment(Request $request)
    {
        $order = Order::with('user')->find(Session::get('order_id'));

        if($order->payment_status == 'Complete'){
            Session::forget('order_id');
            Session::forget('grand_total');
            Session::forget('coupon_amount');
            Session::forget('coupon_code');
            Cart::destroy();

            notify()->error('Order already completed!', 'Error');
            return redirect()->route('checkout');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data =  Stripe\Charge::create([
            "amount" => Session::get('grand_total')*100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => 'Payment successfully completed',
            "receipt_email" => $order->user->email,

        ]);


        if($data['status'] == 'succeeded') {

            if ($order->payment_status == 'Pending') {
                $update_product = DB::table('orders')
                    ->where('id', $order->id)
                    ->update(['payment_status' => 'Complete', 'transaction_id' => $data->id]);


                //----Send Mail
                $order_details = Order::with('order_products','user')->where('id', $order->id)->first();
                $email = Auth::user()->email;
                $data = [
                    'name' => Auth::user()->name,
                    'email' => $email,
                    'order_details' => $order_details,
                ];

                Mail::send('frontend.emails.order', $data, function ($messege) use ($email){
                    $messege->to($email)->subject('Order Placed - Restaurant');
                });
                return redirect()->route('thanks');

            }else{
                notify()->error('Order already completed!', 'Error');
                return redirect()->route('cart');
            }

        } else {
            notify()->error('Something went to wrong!', 'Error');
            return redirect()->route('checkout');
        }



    }
}
