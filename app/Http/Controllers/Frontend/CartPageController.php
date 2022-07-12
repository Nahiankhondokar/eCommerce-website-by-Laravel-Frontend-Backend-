<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    
    /**
     *  Cart product page show
     */
    public function ViweCartProduct(){

       return view('frontend.wishlist.view_mycart');

    }


    /**
     *  all my cart product show
     */
    public function GetCartProduct(){

        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();


        return [
            'carts'     => $carts,
            'cart_qty'  => $cart_qty,
            'cart_total'=> round($cart_total)
        ];
 
    }


    /**
     *  Cart product Quantity increment
     */
    public function cartProductIncrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row -> qty + 1);

        // coupon update again for product decrement
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupone::where('coupone_name', $coupon_name) -> first();

            Session::put('coupon', [
                'coupon_name'       => $coupon -> coupone_name,
                'coupon_discount'   => $coupon -> coupone_discount,
                'discount_amount'   => round(Cart::total() * $coupon -> coupone_discount / 100),
                'total_amount'      => round(Cart::total() - Cart::total() * $coupon -> coupone_discount / 100)
            ]);

        }

        return true;
    }


    /**
     *  Cart product Quantity decrement
     */
    public function cartProductDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row -> qty - 1);

        // coupon update again for product decrement
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupone::where('coupone_name', $coupon_name) -> first();

            Session::put('coupon', [
                'coupon_name'       => $coupon -> coupone_name,
                'coupon_discount'   => $coupon -> coupone_discount,
                'discount_amount'   => round(Cart::total() * $coupon -> coupone_discount / 100),
                'total_amount'      => round(Cart::total() - Cart::total() * $coupon -> coupone_discount / 100)
            ]);

        }

        return true;
    }


    /**
     *  my cart product remove
     */
    public function RemoveCartProduct($rowId){

        // Cart product remove
        Cart::remove($rowId);

        // coupon update again for product decrement
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupone::where('coupone_name', $coupon_name) -> first();

            Session::put('coupon', [
                'coupon_name'       => $coupon -> coupone_name,
                'coupon_discount'   => $coupon -> coupone_discount,
                'discount_amount'   => round(Cart::total() * $coupon -> coupone_discount / 100),
                'total_amount'      => round(Cart::total() - Cart::total() * $coupon -> coupone_discount / 100)
            ]);

        }

        // Cart functionality
        if(Cart::count() == 0){
            if(Session::has('coupon')){
                Session::forget('coupon');
            }
            return response() -> json([
                'emptyCart' => 'done'
            ]);
        }

        return response() -> json([
            'success'   => 'Product Remove From MyCart Page'
        ]);
 
     }





    

}
