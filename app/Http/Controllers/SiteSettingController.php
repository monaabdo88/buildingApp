<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SiteSettingController extends Controller
{
    //
    public function index(SiteSetting $siteSetting){
        $siteSetting = $siteSetting->all();
        return view('admin.settings.index',compact('siteSetting'));
    }
    public function store(Request $request, SiteSetting $siteSetting){

        foreach(array_except($request->toArray(), ['_token' , 'submit']) as $key => $req){
            $siteSettingUpdate = $siteSetting->where('namesetting' , $key)->get()[0];
            if($siteSettingUpdate->type != 3) {
                $siteSettingUpdate->fill(['value' => $req])->save();
            }else{
                $fileName = upload_img($req,'/public/upload/','1600','500',base_path().'/public/upload/'.$siteSettingUpdate->value);
                if($fileName){
                    $siteSettingUpdate->fill(['value' => $fileName])->save();
                }
            }
        }
        return Redirect::back()->withFlashMessage('تم تعديل الإعدادات بنجاح');
    }
}
