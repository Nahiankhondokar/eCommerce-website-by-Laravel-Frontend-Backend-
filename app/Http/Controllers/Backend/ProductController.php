<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
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
        return view('backend.product.product_view', [
            'category'       => $category,
            'subcategory'    => $subcategory,
            'brand'    => $brand,
        ]);
    }
}
