<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use Laracasts\Flash\Flash;
use Session;
use App\Helpers\Helper;
use Auth;

class SettingsController extends Controller
{
	public function __construct(Request $request)
	{
		$url = $request->path();
		Helper::sessionReload();
		$sess= Helper::shout($url);
		$this->read=$sess['r'];
		$this->update=$sess['u'];
		$this->add=$sess['a'];
		$this->delete=$sess['d'];
		$this->sess=$sess;

	}
    public function index(){
		if($this->read==0){
			return redirect()->action('Admin\HomeController@index');
		}
    	$settings = Setting::take(1)->first();
    	return view('admin.settings.index', ['settings' => $settings, 'deleg' => $this->sess]);
    }

    public function save(Request $request){
        $path = base_path() . '/public/img/setting';

        $imageTempName = $request->file('logo')->getPathname();
        
        $current_time = time();
        $imageName = $current_time."_".$request->file('logo')->getClientOriginalName();
        
        $request->file('logo')->move($path , $imageName);
        $newresim = '/img/setting/'.$imageName;
        
    	$id = $request->input("id");
    	$icon = $request->input("icon");
    	$logo = $newresim;
    	$name = $request->input("name");
    	$website = $request->input("website");
    	$email = $request->input("email");
    	$phone = $request->input("phone");
    	$fax = $request->input("fax");
    	$address = $request->input("address");
    	$facebook = $request->input("facebook");
    	$twitter = $request->input("twitter");
    	$instagram = $request->input("instagram");
    	$gplus = $request->input("gplus");
    	$youtube = $request->input("youtube");
    	$latitude = $request->input("latitude");
    	$longitude = $request->input("longitude");

    	if($id == "null"){
    		$settings = new Setting;
    	} else {
    		$settings = Setting::find($id);
    	}
		$settings->icon = $icon;
		$settings->logo = $logo;
		$settings->name = $name;
		$settings->web_site = $website;
		$settings->email = $email;
		$settings->phone = $phone;
		$settings->fax = $fax;
		$settings->address = $address;
		$settings->facebook = $facebook;
		$settings->twitter = $twitter;
		$settings->instagram = $instagram;
		$settings->google_plus = $gplus;
		$settings->youtube = $youtube;
		$settings->latitude = $latitude;
		$settings->longitude = $longitude;
		$settings->save();

        Flash::message('Ayarlar işlemi başarılı bir şekilde etkilendi.','success');

    	return redirect()->action('Admin\SettingsController@index');
    }

    public function googleAnalytics(){
    	$settings = Setting::take(1)->first();
    	return view('admin.advertise.googleAnalytics.index')->with(['settings' => $settings]);
    }

    public function googleAnalyticsSave(Request $request){
    	$id = $request->input("id");
    	$code = $request->input("analytics_code");
    	if($id == "null"){
    		$settings = new Setting;
    	} else {
    		$settings = Setting::find($id);
    	}
		$settings->analytics_code = $code;
		$settings->save();

        Flash::message('Google analiz başarılı bir şekilde etkilendi.','success');

    	return redirect()->action('Admin\SettingsController@googleAnalytics');
    }
}
