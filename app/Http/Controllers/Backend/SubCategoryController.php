<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     *  Subcategory view
     */
    public function SubCategoryView(){

        $category = Category::orderBy('category_name_eng', 'ASC') -> get();
        $subcat = SubCategory::latest() -> get();
        return view('backend.Category.subcategory_view', compact('subcat', 'category'));

    }

    /**
     *  Subcategory store
     */
    public function SubCategoryStore(Request $request){

        SubCategory::insert([
            'category_id'               => $request -> category_id,
            'subcategory_name_eng'      => $request -> eng_name,
            'subcategory_name_hin'      => $request -> hin_name,
            'subcategory_slug_eng'      => strtolower(str_replace(' ', '-', $request -> eng_name)),
            'subcategory_slug_hin'      => str_replace(' ', '-', $request -> hin_name),
        ]);

        // alert msg
        $alert = [
            'message'       => 'SubCategory Added Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($alert);

    }


     /**
     *  Subcategory edit
     */
    public function SubCategoryEdit($id){
        
        $category = Category::orderBy('category_name_eng', 'ASC') -> get();
        $edit_data = SubCategory::findOrFail($id);
        return view('backend.Category.subcategory_edit', compact('edit_data', 'category'));

    }


    /**
     *  Subcategory Update
     */
    public function SubCategoryUpdate(Request $request){
        
        $id = $request -> update_id;
        $update = SubCategory::findOrFail($id);
        $update -> subcategory_name_eng = $request -> eng_name;
        $update -> subcategory_name_hin = $request -> hin_name;
        $update -> subcategory_slug_eng = strtolower(str_replace(' ', '-', $request -> eng_name));
        $update -> subcategory_slug_hin = str_replace(' ', '-', $request -> hin_name);
        $update -> category_id          = $request -> category_id;
        $update -> update();

        // alert msg
        $notify = [
            'message'       => 'SubCategory Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('all.subcategory') -> with($notify);

    }



    /**
     *  Subcategory delete
     */
    public function SubCategoryDelete($id){
        
        $delete = SubCategory::findOrFail($id);
        $delete -> delete();
        
        // alert msg
        $notify = [
            'message'       => 'SubCategory Deleted Successfully',
            'alert-type'    => 'warning'
        ];

        return redirect() -> back() -> with($notify);

    }





    // --------- This is for Sub -> SubCategory functions ----------

    /**
     *  Sub -> Subcategory view
     */
    public function SubSubCategoryView(){

        $category = Category::orderBy('category_name_eng', 'ASC') -> get();
        $subsubcat = SubSubCategory::latest() -> get();
        return view('backend.Category.sub_subcategory_view', compact('subsubcat', 'category'));

    }


    /**
     *  Sub -> Subcategory store
     */
    public function SubSubCategoryStore(Request $request){

        // validation
        $this -> validate($request, [
            'eng_name'      => 'required',
            'hind_name'     => 'required',
            'category_id'   => 'required',
            'subcategory_id'=> 'required'
        ], [
            'category_id.required' => 'Category Feild is empty !'
        ]);

        // Data store
        SubSubCategory::create([
            'category_id'               => $request -> category_id,
            'subcategory_id'            => $request -> subcategory_id,
            'subsubcategory_name_eng'   => $request -> eng_name,
            'subsubcategory_name_hin'   => $request -> hin_name,
            'subsubcategory_slug_eng'   => strtolower(str_replace(' ', '-', $request -> eng_name)),
            'subsubcategory_slug_hin'   => str_replace(' ', '-', $request -> hin_name)
        ]);


         // alert msg
         $notify = [
            'message'       => 'Sub - SubCategory Added Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notify);


    }














    /**
     *  Sub -> Subcategory view
     */
    public function SubCategoryFind($id){

        $subcat = SubCategory::where('category_id',$id) -> orderBy('subcategory_name_eng', 'DESC') -> get();

        return $subcat;

        // return json_encode($subcat);

    }







}
