<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupone;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
    /**
     *  add to cart
     *  bumbummen99 package for add to cart
     */
    public function AddToCart(Request $request, $id){

        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        
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

    /**
     *  Mini Cart Manage
     */
    public function MiniCart(){

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
     *  Remove product from Mini Cart
     */
    public function RemoveProductMiniCart($rowId){

        Cart::remove($rowId);
        return response() -> json([
            'success'   => 'Product Remove From Cart'
        ]);

    }


    /**
     *  Coupon Apply 
     */
    public function CouponeApply(Request $request){
        
        $coupon = Coupone::where('coupone_name', $request -> coupon_name) -> where('coupone_validity', '>=', Carbon::now() -> format('Y-m-d')) -> first();
        if($coupon){

            // put the coupon information to session
            Session::put('coupon', [
                'coupon_name'       => $coupon -> coupone_name,
                'coupon_discount'   => $coupon -> coupone_discount,
                'discount_amount'   => round(Cart::total() * $coupon -> coupone_discount / 100),
                'total_amount'      => round(Cart::total() - Cart::total() * $coupon -> coupone_discount / 100)
            ]);

            // response message
            return response() -> json([
                'success'   => 'Coupon Add Successfully'
            ]);

        }else{

            // response message
            return response() -> json([
                'error'   => 'Invalid Coupon'
            ]);

        }

    }


    /**
     *  Coupon calculation
     */
    public function CouponeCalculation(){
        if(Session::get('coupon')){
            return [
                'subtotal'          => Cart::total(),
                'coupon_name'       => Session::get('coupon')['coupon_name'],
                'coupon_discount'   => Session::get('coupon')['coupon_discount'],
                'discount_amount'   => Session::get('coupon')['discount_amount'],
                'total_amount'      => Session::get('coupon')['total_amount'],
            ];
        }else{
            return [
                'total'          => Cart::total()
            ];
        }
    }


    /**
     *  Coupon Remove
     */
    public function CouponeRemove(){
 
        Session::forget('coupon');
        return [
            'success'          => 'Coupon Remove Successfully'
        ];

    }




    
}
