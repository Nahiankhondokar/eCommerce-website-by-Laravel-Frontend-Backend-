<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    
    /**
     *  create admin profile view
     */
    public function adminProfile(){
        $profile_data = Admin::find(1);
        return view('admin.admin_profile_view', compact('profile_data'));
    }

    /**
     *   admin profile edit
     */
    public function adminProfileEdit(){
        $profile_edit = Admin::find(1);
        return view('admin.admin_profile_edit', compact('profile_edit'));
    }

    /**
     *   admin profile edit
     */
    public function adminProfileUpdate(Request $request){
   
        // file update
        if($request -> hasFile('new_file')){

            $img = $request -> file('new_file');
            $unique_name = md5( time() . rand()) .'.'. $img -> getClientOriginalExtension();
            $img -> move(public_path('upload/admin'), $unique_name);

            if(file_exists('upload/admin/' . $request -> old_file)){
                unlink('upload/admin/' . $request -> old_file);
            }


        }else{
            $unique_name = $request -> old_file;
        }


        // data store
        $profile_update = Admin::find(1);
        $profile_update -> email                = $request -> email;
        $profile_update -> name                 = $request -> name;
        $profile_update -> profile_photo_path   = $unique_name;
        $profile_update -> update();

        $notification = [
            'message'       => 'Admin Profile Updated Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('admin.profile') -> with($notification);

    }


     /**
     *   admin change password
     */
    public function adminChangePassword(){
        $pass_data = Admin::find(1);
        return view('admin.admin_change_password', compact('pass_data'));

    }




}
