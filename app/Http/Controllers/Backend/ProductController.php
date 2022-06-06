<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
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
     *  Product sub-subcategory show
     */
    public function ProductAdd(Request $request){
      
        return 'done';

    }



}
