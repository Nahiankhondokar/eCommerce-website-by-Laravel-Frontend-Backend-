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
            $img -> move(public_path('media/admin/products/tham-nail'), $unique);
            
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
        $galleryArr = [];
        $gallery = $request -> file('product_gallery');
        foreach ($gallery as $gal) {
            $unique = md5(time() . rand()) . '.' . $gal -> getClientOriginalExtension();
            $gal -> move(public_path('media/admin/products/gallery'), $unique);
            array_push($galleryArr, $unique);
        }

        // gallery final array
        $finalGallery = [
            'gallery'       => $galleryArr
        ];
        

        MultiImg::create([
            'product_id'        => $product_id,
            'photo_name'        => json_encode($finalGallery)
        ]);



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

        $multiple_img = MultiImg::where('product_id', $id) -> get();

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
            'product'               => $product,
            'multiple_img'          => $multiple_img
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



    /**
     *  Product Update
     */
    public function ProductUpdate(Request $request){

        $update_id = $request -> update_id;
        
        // Product insert
        Product::findOrFail($update_id) -> update([
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


        // alert msg
        $notify = [
            'message'       => 'Product Updated Successfully without image',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('manage.product') -> with($notify);

    }



    /**
     *  product gallery update
     */
    public function ProductGalleryUpdate(Request $request){

        // product id
        $product_id = $request -> product_id;

        $arrGall = [];
        $imgs = $request -> file('product_gallery');
        foreach( $imgs as $img){

            // data get & img deleteing system
            $del_img = MultiImg::where('product_id', $product_id) -> get();
            foreach($del_img as $del){
            $data = json_decode($del -> photo_name);
    
                foreach($data -> gallery as $s_gallery){
                    // echo $s_gallery;
                    if(file_exists('media/admin/products/gallery/'. $s_gallery)){
                        unlink('media/admin/products/gallery/'. $s_gallery);
                    }

                }
    
            }
            
            $unique =   (time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/admin/products/gallery'), $unique);
            array_push($arrGall, $unique);

        }

        // gallery array
        $galleryUpdateArr = [
            'gallery'       => $arrGall
        ];

  
        // gallery images updated 
        MultiImg::where('product_id', $product_id) -> update([
            'photo_name'        => json_encode($galleryUpdateArr)
        ]);


        // alert msg
        $notify = [
            'message'       => 'Product Gallery Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('manage.product') -> with($notify);


    }



    
    /**
     *  product thambnail update
     */
    public function ProductThambnailUpdate(Request $request){

        // product id 
         $id = $request -> product_id;

        // image Update
        if($request -> hasFile('product_thamnail')){
            
            $img_thamnail = $request -> file('product_thamnail');
            $unique_name = md5(time() . rand()) . '.' . $img_thamnail -> getClientOriginalExtension();
            $img_thamnail -> move(public_path('media/admin/products/tham-nail'), $unique_name);
        }



        // thambnail image update
        $product_data = Product::findOrFail($id);
        $product_data  -> product_thamnail = $unique_name;
        $product_data  -> update();

        // unlink old thambnail imgae
        if(file_exists('media/admin/products/tham-nail/'. $product_data -> product_thamnail)){
            unlink('media/admin/products/tham-nail/'. $product_data -> product_thamnail);
        }



        // alert msg
        $notify = [
            'message'       => 'Product Thamnail updated Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('manage.product') -> with($notify);


    }



    /**
    *  product Delete
    */
    public function ProductDelete($id){

        // product delete
        $del_data = Product::find($id);
        if(file_exists('media/admin/products/tham-nail/' . $del_data -> product_thamnail)){
            unlink('media/admin/products/tham-nail/' . $del_data -> product_thamnail);
        }
        $del_data -> delete();

        // product gallery delete
        $del_gallery_data = MultiImg::where('product_id', $id) -> get();
        foreach($del_gallery_data as $gall_info){

            $del_gallery = MultiImg::find($gall_info -> id);
            foreach(json_decode($gall_info -> photo_name) as $img){
                foreach($img as $photo){
                    if(file_exists('media/admin/products/gallery/' . $photo)){
                        unlink('media/admin/products/gallery/' . $photo);
                    }
            
                }
            }
            $del_gallery -> delete();

        }

          // alert msg
        $notify = [
            'message'       => 'Product Deleted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('manage.product') -> with($notify);


    }




}
