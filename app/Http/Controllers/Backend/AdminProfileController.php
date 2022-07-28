<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    
    /**
     *  create admin profile view
     */
    public function adminProfile(){

        $id = Auth::user() -> id;
        $profile_data = Admin::find($id);
        return view('admin.admin_profile_view', compact('profile_data'));
    }

    /**
     *   admin profile edit
     */
    public function adminProfileEdit($id){
        $profile_edit = Admin::find($id);
        return view('admin.admin_profile_edit', compact('profile_edit'));
    }

    /**
     *   admin profile edit
     */
    public function adminProfileUpdate(Request $request){
   
        // get id
        $id = Auth::user() -> id;

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
        $profile_update = Admin::find($id);
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

        // get id
        $id = Auth::user() -> id;

        $pass_data = Admin::find($id);
        return view('admin.admin_change_password', compact('pass_data'));

    }


    /**
     *   admin change password
     */
    public function adminPasswordUpdate(Request $request){
        
        // get id
        $id = Auth::user() -> id;

        $notification_one = [
            'message'       => 'password does not match',
            'alert-type'    => 'error'
        ];

        $notification_two = [
            'message'       => 'comfirm password does not match',
            'alert-type'    => 'warning'
        ];

        // validation
        $this -> validate($request, [
            'current_pass'  => 'required',
            'new_pass'      => 'required'
        ]);

        // password update
        $hash_pass = Admin::find($id) -> password;
        if(Hash::check($request -> current_pass, $hash_pass)){

            if($request -> new_pass == $request -> confirm_pass){

                $admin = Admin::find($id);
                $admin -> password = Hash::make($request -> new_pass);
                $admin -> update();
                Auth::logout();
                return redirect() -> route('admin.logout');

            }else{
                return redirect() -> back() -> with($notification_two);
            }

        }else{
            return redirect() -> back() -> with($notification_one);
        }

    }




    /**
     *   All User show
     */
    public function AllUserShow(){
        $users = User::latest() -> get();
        return view('backend.user.user_view', compact('users'));
    }


    

}
