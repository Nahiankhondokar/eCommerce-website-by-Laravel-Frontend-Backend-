<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminUserController extends Controller
{
    /**
     *  admin user role
     */
    public function AllAdminRole(){

        $adminUser = Admin::where('type', 2) -> latest() -> get();
        return view('backend.role.all_admin_role', compact('adminUser'));
    }


    /**
     *  create admin user role view page
     */
    public function CreateAdminView(){

        return view('backend.role.create_admin_view');

    }



    /**
     *  create admin user role
     */
    public function CreateAdmin(Request $request){

        // validation 
        $this -> validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required'
        ], [
            'name.required' => 'name feild is empty !'
        ]);


        // image upload 
        if($request -> hasFile('profile_photo_path')){

            $img = $request -> file('profile_photo_path');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            Image::make($img) -> resize(270, 270) -> save('media/admin/adminuserrole/'. $unique);
            $save_url = 'media/admin/adminuserrole/'. $unique;

        }

        // data create
        Admin::insert([
            'name'              => $request -> name,
            'email'             => $request -> email,
            'phone'             => $request -> phone,
            'password'          => Hash::make($request -> password),
            'profile_photo_path'=> $save_url,
            'brand'             => $request -> brand,
            'category'          => $request -> category,
            'product'           => $request -> product,
            'slider'            => $request -> slider,
            'coupone'           => $request -> coupone,
            'shipping'          => $request -> shipping,
            'blog'              => $request -> blog,
            'sitesetting'       => $request -> sitesetting,
            'returnorder'       => $request -> returnorder,
            'review'            => $request -> review,
            'stock'             => $request -> stock,
            'orders'            => $request -> orders,
            'reports'           => $request -> reports,
            'users'             => $request -> users,
            'adminuserrole'     => $request -> adminuserrole,
            'type'              => 2,
            'created_at'        => Carbon::now()
        ]);
        
        // confirmation message
        $notification = [
            'message'       => 'Admin User Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> route('all-admin-user') -> with($notification);

    }



    /**
     *  edit admin user role
     */
    public function AdminUserEdit($user_id){

        $adminUser = Admin::find($user_id);
        return view('backend.role.edit_admin_user_role', compact('adminUser'));

    }


    /**
     *  delete admin user role
     */
    public function AdminUserDelete($user_id){

        // get data
        $adminUser = Admin::find($user_id);

        // image delete
        if(file_exists($adminUser -> profile_photo_path)){
            unlink($adminUser -> profile_photo_path);
        }
        $adminUser -> delete();

        // confirmation message
        $notification = [
            'message'       => 'Admin User deleted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notification);

    }



        /**
     *  create admin user role
     */
    public function AdminUserUpdate(Request $request, $user_id){

        // validation 
        $this -> validate($request, [
            'name'          => 'required',
            'email'         => 'required'
        ], [
            'name.required' => 'name feild is empty !'
        ]);


        // image upload 
        if($request -> hasFile('profile_photo_path')){

            $img = $request -> file('profile_photo_path');
            $unique = md5(time() . rand()) . '.' . $img -> getClientOriginalExtension();
            Image::make($img) -> resize(270, 270) -> save('media/admin/adminuserrole/'. $unique);
            $save_url = 'media/admin/adminuserrole/'. $unique;

            // image delete
            if(file_exists($request -> old_photo)){
                unlink($request -> old_photo);
            }

        }else{
            $save_url = $request -> old_photo;
        }

        // data create
        Admin::find($user_id) -> update([
            'name'              => $request -> name,
            'email'             => $request -> email,
            'phone'             => $request -> phone,
            'profile_photo_path'=> $save_url,
            'brand'             => $request -> brand,
            'category'          => $request -> category,
            'product'           => $request -> product,
            'slider'            => $request -> slider,
            'coupone'           => $request -> coupone,
            'shipping'          => $request -> shipping,
            'blog'              => $request -> blog,
            'sitesetting'       => $request -> sitesetting,
            'returnorder'       => $request -> returnorder,
            'review'            => $request -> review,
            'stock'             => $request -> stock,
            'orders'            => $request -> orders,
            'reports'           => $request -> reports,
            'users'             => $request -> users,
            'adminuserrole'     => $request -> adminuserrole,
            'type'              => 2,
            'created_at'        => Carbon::now()
        ]);
        
        // confirmation message
        $notification = [
            'message'       => 'Admin User Updated Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> route('all-admin-user') -> with($notification);

    }


    
}
