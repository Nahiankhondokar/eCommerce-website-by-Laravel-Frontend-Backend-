<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SiteSettingController extends Controller
{
    /**
     *  Site Setting view
     */
    public function SiteSettingUpdate(){

        $setting = SiteSetting::find(1);
        return view('backend.setting.site_setting_update', compact('setting'));
    }


        /**
     *  Site Setting Update
     */
    public function SiteSettingUpdateNow(Request $request){

        // file upload
        if($request -> hasFile('logo')){

            $logo = $request -> file('logo');
            $unique = md5(time() . rand()) . '.' . $logo -> getClientOriginalExtension();
            $logo -> move(public_path('media/admin/sitesetting'), $unique);
            $save_url = 'media/admin/sitesetting/' . $unique;
            // Image::make($logo) -> resize(139, 36) -> save('media/admin/sitesetting/' . $unique);
            
            // delete old file
            if(file_exists($request -> old_logo)){
                unlink($request -> old_logo);
            }

        }else{
            $save_url = $request -> old_logo;
        }


        // site setting create
        $setting = SiteSetting::find(1);
        $setting -> logo        = $save_url;
        $setting -> phone_one   = $request -> phone_one;
        $setting -> phone_two   = $request -> phone_two;
        $setting -> email       = $request -> email;
        $setting -> company_name        = $request -> company_name;
        $setting -> company_address     = $request -> company_address;
        $setting -> facebook        = $request -> facebook;
        $setting -> twitter         = $request -> twitter;
        $setting -> linkdin         = $request -> linkdin;
        $setting -> youtube         = $request -> youtube;
        $setting -> created_at      = Carbon::now();
        $setting -> update();



        // confirmation msg
        $notify = [
            'message'       => 'Site Setting Inserted Successfully',
            'alert-type'    => 'success'
        ];

        return redirect() -> back() -> with($notify);

    }



    /**
     *  Seo Setting view
     */
    public function SeoSetting(){

        $seo = Seo::find(1);
        return view('backend.setting.seo_update', compact('seo'));
    }


    /**
     *  Seo Setting Update
     */
    public function SeoSettingUpdate(Request $request){

        // site setting create
        $setting = Seo::find(1);
        $setting -> meta_title          = $request -> meta_title;
        $setting -> meta_keyword        = $request -> meta_keyword;
        $setting -> meta_author         = $request -> meta_author;
        $setting -> meta_discription    = $request -> meta_discription;
        $setting -> google_analytics    = $request -> google_analytics;
        $setting -> created_at          = Carbon::now();
        $setting -> update();



        // confirmation msg
        $notify = [
            'message'       => 'Seo Setting Inserted Successfully',
            'alert-type'    => 'info'
        ];

        return redirect() -> back() -> with($notify);

    }
}
