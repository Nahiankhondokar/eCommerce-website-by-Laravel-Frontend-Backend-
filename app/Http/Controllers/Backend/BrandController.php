<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    
    /**
     *  Brand View 
     */
    public function brand_view(){
        $brand = Brand::latest() -> get();
        return view('backend.brand.brand_view', compact('brand'));
    }


    /**
     *  Brand store 
     */
    public function brand_store(Request $request){

        // validation
        $this -> validate($request, [
            'eng_name'      => 'required',
            'hin_name'      => 'required',
            'brand_img'     => 'required'
        ], [
            'eng_name.required'      => 'Brand eng name is required',
        ]);

        // image upload
        $img = $request -> file('brand_img');
        $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
        $img -> move(public_path('media/brand/'), $unique);

        
        // get all input data
        Brand::create([
            'brand_name_eng'        => $request -> eng_name,
            'brand_name_hin'        => $request -> hin_name,
            'brand_slug_eng'        => strtolower(str_replace(' ', '-' , $request -> eng_name)),
            'brand_slug_hin'        => str_replace(' ', '-' , $request -> hin_name),
            'brand_image'           => $unique,
        ]);

        $notification = [
            'message'       => 'Brand Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notification);
    }


    /**
     *  Brand Edit 
     */
    public function BrandEdit($id){

        $brand = Brand::find($id);
        return view('backend.brand.brand_edit', compact('brand'));

    }


    /**
     *  Brand Delete 
     */
    public function BrandDelete($id){


        $brand_del = Brand::find($id);
        $img = $brand_del -> brand_image;
        $brand_del -> delete();
        unlink('media/brand/' . $img);

        $notification = [
            'message'       => 'Brand Deleted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('all.brand');
    }


    /**
     *  Brand Update 
     */
    public function BrandUpdate(Request $request){


        // image manage
        if($request -> hasFile('brand_img_new')){

            $img = $request -> file('brand_img_new');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/brand/'), $unique);

            if(file_exists('media/brand/' . $request -> brand_img_old)){
                unlink('media/brand/' . $request -> brand_img_old);
            }

        }else{
            $unique = $request -> brand_img_old;
        }


        // data update
        $id = $request -> update_id;
        $brand_update = Brand::find($id);
        $brand_update -> brand_name_eng = $request -> eng_name;
        $brand_update -> brand_name_hin = $request -> hin_name;
        $brand_update -> brand_slug_eng = strtolower(str_replace(' ', '-', $request -> eng_name));
        $brand_update -> brand_slug_hin = str_replace(' ', '-', $request -> hin_name);
        $brand_update -> brand_image    = $unique;
        $brand_update -> update();


        $notification = [
            'message'       => 'Brand Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() ->back() -> with($notification);
        
    }





}
