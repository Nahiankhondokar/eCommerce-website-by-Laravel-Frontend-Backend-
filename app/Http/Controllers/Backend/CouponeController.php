<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupone;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponeController extends Controller
{
    /**
     *  Coupone view
     */
    public function CouponeView(){
        $coupone = Coupone::orderBy('id', 'DESC') -> get();
        return view('backend.coupone.view_coupone', compact('coupone'));
    }

    /**
     *  Coupone Delete
     */
    public function CouponeDelete($id){
       
        $del_data = Coupone::find($id);
        $del_data -> delete();

        // confirmation message
        $notification = [
            'message'       => 'Coupone Deleted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> back() -> with($notification);

    }

    
    /**
     *  Coupone Edit
     */
    public function CouponeEdit($id){
 
        $coupone = Coupone::orderBy('id', 'DESC') -> get();
        $single_coupone = Coupone::find($id);
        return view('backend.coupone.edit_coupone', compact('coupone', 'single_coupone'));       

    }

    /**
     *  Coupone Update
     */
    public function CouponeUpdate(Request $request, $id){
 
        $edit_data = Coupone::find($id);
        $edit_data -> coupone_name      = strtoupper($request -> coupone_name);
        $edit_data -> coupone_discount  = $request -> coupone_discount;
        $edit_data -> coupone_validity  = $request -> coupone_validity;
        $edit_data -> created_at        = Carbon::now();
        $edit_data -> update();

        // confirmation message
        $notification = [
            'message'       => 'Coupone Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('manage-coupone') -> with($notification);
        

    }


    /**
     *  Coupone store
     */
    public function CouponetStore(Request $request){
        
        // validaiton
        $this -> validate($request, [
            'coupone_name'      => 'required', 
            'coupone_discount'  => 'required'
        ], [
            'coupone_name.required'     => 'coupone name is required'
        ]);

        // data insert
        Coupone::create([
            'coupone_name'          => strtoupper($request -> coupone_name),
            'coupone_discount'      => $request -> coupone_discount,
            'coupone_validity'      => $request -> coupone_validity,
            'created_at'            => Carbon::now()
        ]);

        // confirmation message
        $notification = [
            'message'       => 'Coupone Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notification);

    }



}
