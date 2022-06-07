<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     *  Product View
     */
    public function ProductView(){
        $category = Category::latest() -> get();
        $subcategory = SubCategory::latest() -> get();
        $brand = Brand::latest() -> get();
        return view('backend.product.product_add', [
            'category'       => $category,
            'subcategory'    => $subcategory,
            'brand'          => $brand,
        ]);
    }

    /**
     *  Product subcategory show
     */
    public function ProductSubCatFind($id){

        // return $id;

        $subcat = SubCategory::where('category_id', $id) -> orderBy('subcategory_name_eng', 'DESC') -> get();

        return $subcat;

    }


    /**
     *  Product sub-subcategory show
     */
    public function ProductSubSubCatFind($id){
        // return $id;

        $subsubcat = SubSubCategory::where('subcategory_id', $id) -> orderBy('subsubcategory_name_eng', 'DESC') -> get();

        return $subsubcat;

    }



    /**
     *  Product Insert
     */
    public function ProductAdd(Request $request){

        // return $request -> product_color_eng;

        // image upload
        if($request -> hasFile('product_thamnail')){
            $img = $request -> file('product_thamnail');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/admin/products/thambnail'), $unique);
            
        }
      
        // Product insert
        $product_id = Product::insertGetId([
            'brand_id'          	=> $request -> brand_id,
            'category_id'           => $request -> category_id,
            'subcategory_id'        => $request -> subcategory_id,
            'subsubcategory_id'     => $request -> subsubcategory_id,
            'product_name_eng'      => $request -> product_name_eng,

            'product_name_hin'      => $request -> product_name_hin,
            'product_slug_eng'      => strtolower(str_replace(' ', '-', $request -> product_name_eng)),
            'product_slug_hin'      => str_replace(' ', '-', $request -> product_name_hin),
            'product_code'           => $request -> product_code,
            'product_qty'            => $request -> product_qty,

            'product_tag_eng'        => $request -> product_tag_eng,
            'product_tag_hin'        => $request -> product_tag_hin,
            'product_size_eng'       => $request -> product_size_eng,
            'product_size_hin'       => $request -> product_size_hin,
            'product_color_eng'      => $request -> product_color_eng,

            'product_color_hin'      => $request -> product_color_hin,
            'selling_price'         => $request -> selling_price,
            'discount_price'        => $request -> discount_price,
            'product_thamnail'      => $unique,

            'short_desc_eng'        => $request -> short_desc_eng,
            'short_desc_hin'        => $request -> short_desc_hin,
            'long_desc_eng'         => $request -> long_desc_eng,
            'long_desc_hin'         => $request -> long_desc_hin,
            'hot_deal_product'      => $request -> hot_deal_products,
            
            'feature_product'       => $request -> feature_products,
            'special_offer'         => $request -> special_offer,
            'special_deal'          => $request -> special_deals, 
            'status'                => 1
        ]);


        // product gallery 
        $gallery = $request -> file('product_gallery');
        foreach ($gallery as $gal) {
            $unique = md5(time() . rand()) . '.' . $gal -> getClientOriginalExtension();
            $gal -> move(public_path('media/admin/products/gallery'), $unique);

            MultiImg::create([
                'product_id'        => $product_id,
                'photo_name'        => $unique
            ]);

        }

        // alert msg
        $notify = [
            'message'       => 'Product Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('manage.product') -> with($notify);

    }


    /**
     *  Product Manage
     *  All product Show
     */
    public function ProductManage(){
        
        $products = Product::latest() -> get();
        return view('backend.product.all_product', compact('products'));

    }


    /**
     *  Product Manage
     *  product View
     */
    public function SingleProductView($id){

        $single_data = Product::find($id);

        // $data = $single_data -> category() -> attach($single_data -> categroy_id);

        return $single_data;

    }



    /**
     *  Product Manage
     *  product Edit
     */
    public function ProductEdit($id){
        // return $id;
        $category       = Category::latest() -> get();
        $subcategory    = SubCategory::latest() -> get();
        $subsubcategory = SubSubCategory::latest() -> get();
        $brand          = Brand::latest() -> get();
        $product        = Product::find($id);
        return view('backend.product.product_edit', [
            'category'              => $category,
            'subcategory'           => $subcategory,
            'subsubcategory'        => $subsubcategory,
            'brand'                 => $brand,
            'product'               => $product

        ]);

    }



    /**
     *  Edit Product subcategory show
     */
    public function EditProductSubCatFind($id){

        // return $id;

        $subcat = SubCategory::where('category_id', $id) -> orderBy('subcategory_name_eng', 'DESC') -> get();

        return $subcat;

    }


    /**
     *  Edit Product sub-subcategory show
     */
    public function EditProductSubSubCatFind($id){
        // return $id;

        $subsubcat = SubSubCategory::where('subcategory_id', $id) -> orderBy('subsubcategory_name_eng', 'DESC') -> get();

        return $subsubcat;

    }




}
