<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     *  Product add to wishlist
     */
    public function AddToWishlist($product_id){

        if(Auth::check()){


            $exists = Wishlist::where('user_id', Auth::id()) -> where('product_id', $product_id) -> first();

            if(!$exists){
                Wishlist::insert([
                    'user_id'       => Auth::id(),
                    'product_id'    => $product_id,
                    'created_at'    => Carbon::now()
                ]);
    
                return response() -> json([
                    'success'       =>  'Product Add to Wishlist'
                ]);
            }else{

                return response() -> json([
                    'error'       =>  'Product has already on your wishlish'
                ]);

            }

        }else{
            return response() -> json([
                'error'       =>  'Login Your Account'
            ]);
        }
    
    }

    /**
     *  wishlist view page show
     */
    public function ViweWishlistProduct(){

        return view('frontend.wishlist.view_wishlist');
          
    }

    
    /**
     *  show all wishlist products
     */
    public function GetWishlistProduct(){

        $product = Wishlist::with('product') -> where('user_id', Auth::id()) -> latest() -> get();
          
        return $product;
    }

    /**
     *  Remove product from wishlist
     */
    public function RemoveWishlistProduct($id){

        $del_product = Wishlist::where('user_id', Auth::id()) -> where('id', $id) -> first();
        $del_product -> delete();
        
        return [
            'success'       => 'Remove Wishlist Product'
        ];
    }


}
