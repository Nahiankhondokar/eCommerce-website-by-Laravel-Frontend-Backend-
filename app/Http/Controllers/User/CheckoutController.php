<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    
    /**
     *  checkout page show
     */
    public function ViewCheckout(){

        // Security chekcing
       if(Auth::check()){

            if(Cart::count() > 0){

                $carts          = Cart::content();
                $cart_qty       = Cart::count();
                $cart_amount    = Cart::total();

                $divisions  = ShipDivision::latest() -> get();
                $districts  = ShipDistrict::latest() -> get();  
                $states     = ShipState::latest() -> get();  

                return view('frontend.checkout.view_checkout', compact('carts', 'cart_qty', 'cart_amount', 'divisions', 'districts', 'states'));
                
            }else{
                	// Alert message
                $notification = [
                    'message'       => 'Shopping At List One Product',
                    'alert-type'    => 'error'
                ];

                return redirect() -> to('/') -> with($notification);
            }

       }else{
            // Alert message
            $notification = [
                'message'       => 'Login First !',
                'alert-type'    => 'error'
            ];

            return redirect() -> route('login') -> with($notification);
       }

    }


    /**
     *  Checkout Store
     */
    public function CheckoutStore(Request $request){

        $data = [];
        $data['shipping_name']  = $request -> shipping_name;
        $data['shipping_email'] = $request -> shipping_email;
        $data['shipping_phone'] = $request -> shipping_phone;
        $data['post_code']      = $request -> post_code;

        $data['division_id']    = $request -> division_id;
        $data['district_id']    = $request -> district_id;
        $data['state_id']       = $request -> state_id;
        $data['notes']          = $request -> notes;

        if($request -> payment_method == 'stripe'){
            return view('frontend.payment.stripe', compact('data'));
        }else{

        }


    }



}
