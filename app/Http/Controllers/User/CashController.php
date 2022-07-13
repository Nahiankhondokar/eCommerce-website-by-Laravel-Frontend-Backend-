<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
       /**
     *  Stripe setup
     */
    public function CashOrder(Request $request){


        // coupon Check
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = Cart::total();
        }


        // Order Details store
        $order_id = Order::insertGetId([
            'user_id'           => Auth::id(),
            'division_id'       => $request -> division_id,
            'district_id'       => $request -> district_id,
            'state_id'          => $request -> division_id,
            'post_code'         => $request -> post_code,
            'phone'             => $request -> phone,
            'email'             => $request -> email,
            'name'              => $request -> name,
            'notes'             => $request -> notes,

            'payment_type'      => 'Cash on Delivery',
            'payment_method'    => 'Cash on Delivery',
            'currency'          => 'USD',
            'amount'            => $total_amount,
            'invoice_no'        => 'EOS'.mt_rand(10000000, 99999999),
            'order_date'        => Carbon::now() -> format('d F Y'),
            'order_month'       => Carbon::now() -> format('F'),
            'order_year'        => Carbon::now() -> format('Y'),

            'status'            => 'Pendding',
            'created_at'        => Carbon::now()

        ]);


        // Mail Send to Customer
        $order_details = Order::findOrFail($order_id);
        $mail_data = [
            "invoice_no"    => $order_details -> invoice_no,
            "amount"        => $total_amount,
            "name"          => $request -> name,
            "email"         => $request -> email,
            'payment_type'  => 'Cash on Delivery',
        ];

        Mail::to($request -> email) -> send(new OrderMail($mail_data));



        // order Item Store
        $carts = Cart::content();
        foreach($carts as $cart){
            OrderItem::insert([
                'order_id'          => $order_id,
                'product_id'        => $cart -> id,
                'color'             => $cart -> options -> color,
                'size'              => $cart -> options -> size,
                'qty'               => $cart -> qty,
                'price'             => $cart -> price,
                'created_at'        => Carbon::now()
            ]);
        }


        // Session forget
        if(Session::has('coupon')){
            Session::forget();
        }

        // cart destroy
        Cart::destroy();

        // Confirmajtion message
        $notification = [
            'message'       => 'Your Order is Placed Successfully',
            'alert-type'    => 'success'
        ];


        return redirect() -> route('dashboard') -> with($notification);


    }
}
