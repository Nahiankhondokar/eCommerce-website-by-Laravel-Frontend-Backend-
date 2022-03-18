<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /**
     *  Category view
     */
    public function CategoryView(){
        $category = Category::latest() -> get();
        return view('backend.Category.category_view', [
            'category'      => $category
        ]);
    }


    /**
     *  Category store
     */
    public function CategoryStore(Request $request){

        // validation
        $request -> validate([
            'eng_name'      => 'required',
            'hin_name'      => 'required',
            'category_icon' => 'required'
        ], [
            'eng_name.required'  => 'Category feild is empty !'
        ]);

        // Category store
        Category::insert([
            'category_name_eng'         => $request -> eng_name,
            'category_name_hin'         => $request -> hin_name,
            'category_slug_eng'         => strtolower(str_replace(' ', '-', $request -> eng_name)),
            'category_slug_hin'         => str_replace(' ', '-', $request -> hin_name),
            'category_icon'             => $request -> category_icon,
        ]);


        // alert msg
        $notify = [
            'message'       => 'Category Inserted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> back() -> with($notify);
       
    }






}
