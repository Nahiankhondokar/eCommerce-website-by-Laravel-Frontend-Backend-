<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    /**
     *  Slider view
     */
    public function sliderView(){
        $slider = Slider::latest() -> get();
        return view('backend.slider.slider_view', compact('slider'));
    }

    /**
     *  Slider Store
     */
    public function SliderStore(Request $request){

        // validation
        $request -> validate([
            'slider_img'  => 'required'
        ]);

        // image upload
        if($request -> hasFile('slider_img')){
            $img = $request -> file('slider_img');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/frontend/slider/'), $unique);

            $save_file = 'media/frontend/slider/' . $unique;

        }

        // Slider store
        Slider::create([
            'slider_img'    => $save_file,
            'title'         => $request -> title,
            'desc'          => $request -> desc
        ]);

        // Alert message
        $notification = [
            'message'       => 'slider Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notification);

    }


    /**
     *  Slider Delete
     */
    public function SliderDelete($id){

        // slider delete
        $delete = Slider::find($id);
        $delete -> delete();

        if(file_exists($delete -> slider_img)){
            unlink($delete -> slider_img);
        }

        // Alert message
        $notification = [
            'message'       => 'slider Deleted Successfully',
            'alert-type'    => 'danger'
        ];

        return redirect() -> back() -> with($notification);

    }

    /**
     *  Slider Edit
     */
    public function SliderEdit($id){

        $slider = Slider::find($id);
        return view('backend.slider.slider_edit', compact('slider'));

    }


    /**
     *  Slider Update
     */
    public function SliderUpdate(Request $request){

        // image update
        if($request -> hasFile('slider_img_new')){
            $img = $request -> file('slider_img_new');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/frontend/slider/'), $unique);
            
            $save_file = 'media/frontend/slider/' . $unique;

            if(file_exists($request -> slider_img_old)){
                unlink($request -> slider_img_old);
            }
        }else{
            $unique = $request -> slider_img_old;
        }


        // slider updated
        $id = $request -> update_id;
        $update = Slider::find($id);
        $update -> slider_img = $save_file;
        $update -> title      = $request -> title;
        $update -> desc       = $request -> desc;
        $update -> update();

        // Alert message
        $notification = [
            'message'       => 'slider Updated Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('slider.view') -> with($notification);

    }


    /**
     *  Slider Active or Inactive
     */
    public function sliderActiveInactive($id){

        $slider = Slider::find($id);
        if($slider -> status == 1){
            $slider -> status = 0;
            $slider -> update();
        }else{
            $slider -> status = 1;
            $slider -> update();
        }

        // Alert message
        $notification = [
            'message'       => 'slider Status changed Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('slider.view') -> with($notification);

    }

}
