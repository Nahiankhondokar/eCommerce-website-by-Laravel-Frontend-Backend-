<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

        return true;
    }


    /**
     *  Cart product Quantity decrement
     */
    public function cartProductDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row -> qty - 1);

        return true;
    }







}
