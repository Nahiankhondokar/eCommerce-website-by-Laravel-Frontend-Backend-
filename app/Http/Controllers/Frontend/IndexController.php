<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{

    /**
     *  Create front page 
     */
    public function index(){

        $products = Product::where('status', 1) ->orderBy('id', 'DESC') -> get();
        $slider = Slider::where('status', 1) ->orderBy('id', 'DESC') -> limit(3) -> get();
        $categories = Category::orderBy('category_name_eng', 'ASC') -> get();

        $skip_category_0 = Category::skip(0) -> first();
        $skip_product_0 = Product::where('status', 1) -> where('category_id', $skip_category_0 -> id) ->orderBy('id', 'DESC') -> limit(6) -> get();

        $skip_category_1 = Category::skip(1) -> first();
        $skip_product_1 = Product::where('status', 1) -> where('category_id', $skip_category_1 -> id) ->orderBy('id', 'DESC') -> limit(6) -> get();

        $skip_brand_1 = Brand::skip(1) -> first();
        $skip_brand_product_1 = Product::where('status', 1) -> where('brand_id', $skip_brand_1 -> id) ->orderBy('id', 'DESC') -> limit(6) -> get();


        $hotdeal = Product::where('hot_deal_product', 1) -> where('discount_price', '!=', Null) -> orderBy('id', 'DESC') -> limit(3)-> get();
        $specialoffer = Product::where('special_offer', 1) ->orderBy('id', 'DESC') -> limit(3) -> get();
        $specialdeal = Product::where('special_deal', 1) ->orderBy('id', 'DESC') -> limit(3) -> get();
        return view('frontend.index', compact('categories', 'slider', 'products', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_brand_1', 'skip_brand_product_1', 'hotdeal', 'specialdeal', 'specialoffer'));
    }


    /**
     *  user logout
     */
    public function userLogout(){
        Auth::logout();
        return redirect() -> route('login');
    }

    /**
     *  user profile edit
     */
    public function userProfileEdit(){
        $id = Auth::user() -> id;

        $user = User::find($id);
        return view('frontend.profile.edit_user_profile', compact('user'));
    }


     /**
     *  user profile update
     */
    public function userProfileUpdate(Request $request){

        // file management
        if($request -> hasFile('new_file')){

            $img = $request -> file('new_file');
            $unique = md5(time() .rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/frontend'), $unique);

            if(file_exists('media/frontend/' . $request -> old_file)){
                unlink('media/frontend/' . $request -> old_file);
            }   

        }else{
            $unique = $request -> old_file;
        }

        // data update
        $id = Auth::user() -> id;
        $user_update = User::find($id);
        $user_update -> name = $request -> name;
        $user_update -> email = $request -> email;
        $user_update -> phone = $request -> phone;
        $user_update -> profile_photo_path = $unique;
        $user_update -> update();

        $notification = [
            'message'       => 'user profile updated successfully',
            'alert-type'    => 'success'
        ];


        return redirect() -> back() -> with($notification);
    }


     /**
     *  user password change
     */
    public function userPasswordChange(){
        $id = Auth::user() -> id;

        $user_pass = User::find($id);
        return view('frontend.user_change_password', compact('user_pass'));
    }
    

    /**
     *  user password Update
     */
    public function userPasswordUpdate(Request $request){

        // alert masseages
        $notification_one = [
            'message'       => 'confirmation password does not match',
            'alert-type'    => 'warning'
        ];

        $notification_two = [
            'message'       => 'password does not match',
            'alert-type'    => 'error'
        ];

        // validation
        $this -> validate($request, [
            'current_pass'   => 'required',
            'new_pass'       => 'required',
            'confirm_pass'   => 'required'
        ]);

        // data update
        $hash_pass = Auth::user() -> password;

        if(Hash::check($request -> current_pass, $hash_pass)){

            if($request -> new_pass == $request -> confirm_pass){

                $id = Auth::user() -> id;
                $update_pass = User::find($id);
                $update_pass -> password = Hash::make($request -> new_pass);
                $update_pass -> update();


            }else{
                return redirect() -> back() -> with($notification_one);
            }

        }else{
            return redirect() -> back() -> with($notification_two);
        }

        return redirect() -> route('login');

        
    }


    /**
     *  Single Product Details
     */
    public function SingleProduct($id,$slug){
        $single_product = Product::find($id);
        $multiple_img = MultiImg::where('product_id', $id) -> get();

        // product Size
        $size_eng = $single_product -> product_size_eng;
        $product_size_eng = explode(',', $size_eng);

        $size_hin = $single_product -> product_size_hin;
        $product_size_hin = explode(',', $size_hin);


        // product color
        $color_eng = $single_product -> product_color_eng;
        $product_color_eng = explode(',', $color_eng);

        $color_hin = $single_product -> product_color_hin;
        $product_color_hin = explode(',', $color_hin);

        $cat_id = $single_product -> category_id;
        $related_product = Product::where('category_id', $cat_id) -> where('id', '!=', $id) -> orderBy('id', 'DESC') -> get();

        $hotdeal = Product::where('hot_deal_product', 1) -> where('discount_price', '!=', Null) -> orderBy('id', 'DESC') -> limit(3)-> get();

        // multiple images manage
        foreach ($multiple_img as $item) {
            $imgs = json_decode($item -> photo_name);
            foreach ($imgs as $img) {

            }
        }

        return view('frontend.single_product.single_product', compact('single_product', 'img', 'product_size_eng', 'product_size_hin', 'product_color_eng', 'product_color_hin', 'related_product', 'hotdeal'));
    }



    /**
     *  Tag wise produc show
     */
    public function tagWiseProduct($tag){
        
        if(Session() -> get('language') == 'hindi'){
            $product_hin = Product::where('status', 1) -> where('product_tag_hin', $tag) -> orderBy('id', 'DESC') -> paginate(1);

            $categories = Category::orderBy('category_name_hin', 'ASC') -> get();
            return view('frontend.tag.tag_view', [
                'product'           => $product_hin,
                'categories'        => $categories
            ]);
        }else{
            $product = Product::where('status', 1) -> where('product_tag_eng', $tag) -> orderBy('id', 'DESC') -> paginate(1);

            $categories = Category::orderBy('category_name_eng', 'ASC') -> get();
            return view('frontend.tag.tag_view', compact('product', 'categories'));
        }

    }



    /**
     *   Sub -> category wise product search
     */
    public function SubCategoryWiseProduct($subcat_id,$slug){

        $subcat_product = Product::where('status', 1) -> where('subcategory_id',  $subcat_id) -> orderBy('product_name_eng', 'DESC') -> get();
        $categories = Category::orderBy('category_name_eng', 'ASC') -> get();

        return view('frontend.product.subcat_product', compact('subcat_product', 'categories'));
    }


    /**
     *   Sub -> category wise product search
     */
    public function SubSubCategoryWiseProduct($subsubcat_id,$slug){

        $subsubcat_product = Product::where('status', 1) -> where('subsubcategory_id',  $subsubcat_id) -> orderBy('product_name_eng', 'DESC') -> get();
        $categories = Category::orderBy('category_name_eng', 'ASC') -> get();

        return view('frontend.product.subsubcat_product', compact('subsubcat_product', 'categories'));
    }



    
    /**
     *   Product view modal
     */
    public function ProductViewModal($id){

        $product = Product::with('category', 'brand') -> find($id);

        // product Size
        $size = $product -> product_size_eng;
        $produdct_size = explode(',', $size);

        $color = $product -> product_color_eng;
        $product_color = explode(',', $color);

        // return $produdct_size;
        return [
            "product"        => $product,
            "sizes"          => $produdct_size,
            "colors"         => $product_color
        ];

    }




}
