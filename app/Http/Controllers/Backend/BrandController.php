<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
    /**
     *  Brand View 
     */
    public function brand_view(){
        $brand = Brand::latest() -> get();
        return view('backend.brand.brand_view', compact('brand'));
    }






}
