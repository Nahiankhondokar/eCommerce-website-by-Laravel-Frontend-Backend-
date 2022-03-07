<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     *  Create front page 
     */
    public function index(){
        return view('frontend.index');
    }
}
