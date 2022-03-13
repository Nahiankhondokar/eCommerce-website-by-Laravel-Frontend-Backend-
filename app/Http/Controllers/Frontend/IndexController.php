<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{

    /**
     *  Create front page 
     */
    public function index(){
        return view('frontend.index');
    }


    /**
     *  user logout
     */
    public function userLogout(){
        Auth::logout();
        return redirect() -> route('login');
    }

    /**
     *  user profile edit
     */
    public function userProfileEdit(){
        $id = Auth::user() -> id;

        $user = User::find($id);
        return view('frontend.profile.edit_user_profile', compact('user'));
    }


     /**
     *  user profile update
     */
    public function userProfileUpdate(Request $request){

        // file management
        if($request -> hasFile('new_file')){

            $img = $request -> file('new_file');
            $unique = md5(time() .rand()) . '.' . $img -> getClientOriginalExtension();
            $img -> move(public_path('media/frontend'), $unique);

            if(file_exists('media/frontend/' . $request -> old_file)){
                unlink('media/frontend/' . $request -> old_file);
            }   

        }else{
            $unique = $request -> old_file;
        }

        // data update
        $id = Auth::user() -> id;
        $user_update = User::find($id);
        $user_update -> name = $request -> name;
        $user_update -> email = $request -> email;
        $user_update -> phone = $request -> phone;
        $user_update -> profile_photo_path = $unique;
        $user_update -> update();

        $notification = [
            'message'       => 'user profile updated successfully',
            'alert-type'    => 'success'
        ];


        return redirect() -> back() -> with($notification);
    }


     /**
     *  user password change
     */
    public function userPasswordChange(){
        $id = Auth::user() -> id;

        $user_pass = User::find($id);
        return view('frontend.user_change_password', compact('user_pass'));
    }


    /**
     *  user password Update
     */
    public function userPasswordUpdate(Request $request){

        // alert masseages
        $notification_one = [
            'message'       => 'confirmation password does not match',
            'alert-type'    => 'warning'
        ];

        $notification_two = [
            'message'       => 'password does not match',
            'alert-type'    => 'error'
        ];

        // validation
        $this -> validate($request, [
            'current_pass'   => 'required',
            'new_pass'       => 'required',
            'confirm_pass'   => 'required'
        ]);

        // data update
        $hash_pass = Auth::user() -> password;

        if(Hash::check($request -> current_pass, $hash_pass)){

            if($request -> new_pass == $request -> confirm_pass){

                $id = Auth::user() -> id;
                $update_pass = User::find($id);
                $update_pass -> password = Hash::make($request -> new_pass);
                $update_pass -> update();


            }else{
                return redirect() -> back() -> with($notification_one);
            }

        }else{
            return redirect() -> back() -> with($notification_two);
        }

        return redirect() -> route('login');

        
    }




}
