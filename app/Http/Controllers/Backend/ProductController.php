<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     *  Product View
     */
    public function ProductView(){
        return view('backend.product.product_view');
    }
}
