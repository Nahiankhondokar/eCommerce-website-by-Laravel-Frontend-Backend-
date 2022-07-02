<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    /**
     *  add to cart
     *  bumbummen99 package for add to cart
     */
    public function AddToCart(Request $request, $id){
        
        $product = Product::findOrFail($id);

        if($product -> discount_price == NULL){
            Cart::add([
                'id'        => $id, 
                'name'      => $request -> name, 
                'qty'       => $request -> qty, 
                'price'     => $product -> selling_price, 
                'weight'    => 1, 
                'options'   => [
                    'image' => $product -> product_thamnail,
                    'color' => $request -> color, 
                    'size'  => $request -> size 
                ]
            ]);

            return response() -> json([
                'success' => 'cart is successful with selling price'
            ]);


        }else{

            Cart::add([
                'id'        => $id, 
                'name'      => $request -> name, 
                'qty'       => $request -> qty, 
                'price'     => $product -> discount_price, 
                'weight'    => 1, 
                'options'   => [
                    'image' => $product -> product_thamnail,
                    'color' => $request -> color, 
                    'size'  => $request -> size 
                ]
            ]);

            return response() -> json([
                'success' => 'cart is successful with discount price'
            ]);

        }


    }
}
