<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use Auth;
use Image;

class UserController extends Controller
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
    	$users = User::where('status',1)->get();
    	return view('admin.users.index',['users' => $users, 'deleg' => $this->sess]);
    }

    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	return view('admin.users.create');
    }

    public function save(Request $request){
    	$name = $request->input("name");
    	$email = $request->input("mail");
    	$password = $request->input("password");
        $phone = $request->input("phone");
        $picture = $request->input("picture");
        $web_site = $request->input("web_site");
        $address = $request->input("address");
        $tarih = date('Y')."".date('m')."".date('d')."".date('H').date('i')."".date('s');
        $rand = rand(10000,99999);
        $ip_address = $request->ip();
        $token = $tarih."".$rand."".$ip_address;
        $last_seen = $tarih;
        $email_code = $request->server("HTTP_HOST")."/admin/user-activate/".$token;
        $sms_code = $rand;
        $social = array(
            "facebook" => $request->input("facebook"),
            "twitter" => $request->input("twitter"),
            "instagram" => $request->input("instagram"),
            "google_plus" => $request->input("google_plus"),
            "youtube" => $request->input("youtube"),
        );

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->phone = $phone;
        $user->remember_token = $token;
        $user->picture = $picture;
        $user->group_id = 2;
        $user->last_seen = $last_seen;
        $user->ip_address = $ip_address;
        $user->web_site = $web_site;
        $user->address = $address;
        $user->email_code = $email_code;
        $user->email_confirmed = 0;
        $user->sms_code = $sms_code;
        $user->sms_confirmed = 0;
        $user->social = json_encode($social);
        $user->status = 1;
        $user->save();

        Flash::message('Kullanıcı başarılı bir şekilde eklendi.','success');

        return redirect()->action('Admin\UserController@index');
    }

    public function edit(Request $request){
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$id = $request->id;
    	$users = User::find($id);
        if($users->social)
        {
            $social = json_decode($users->social);
        }
        else
        {
            $social = json_decode(json_encode(array('facebook' => ' ', 'twitter' => ' ', 'instagram' => ' ', 'google_plus' => ' ', 'youtube' => ' ')));
        }

    	return view('admin.users.edit')->with(['users' => $users, 'social' => $social]);
    }

    public function update(Request $request){
    	$id = $request->input("id");
        $name = $request->input("name");
        $username = $request->input("username");
        $email = $request->input("mail");
        $password = $request->input("password");
        $phone = $request->input("phone");
        $picture = $request->input("picture");
        $web_site = $request->input("web_site");
        $address = $request->input("address");
        $tarih = date('Y')."".date('m')."".date('d')."".date('H').date('i')."".date('s');
        $ip_address = $request->ip();
        $last_seen = $tarih;
        $social = array(
            "facebook" => $request->input("facebook"),
            "twitter" => $request->input("twitter"),
            "instagram" => $request->input("instagram"),
            "google_plus" => $request->input("google_plus"),
            "youtube" => $request->input("youtube"),
        );

        $user = User::find($id);
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->phone = $phone;
        $user->picture = $picture;
        $user->last_seen = $last_seen;
        $user->ip_address = $ip_address;
        $user->web_site = $web_site;
        $user->address = $address;
        $user->social = json_encode($social);
        $user->save();

        Flash::message('Kullanıcı başarılı bir şekilde güncellendi.','success');

        return redirect()->action('Admin\UserController@index');
    }

    public function delete(Request $request){
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$id = $request->id;
    	$userData = User::find($id);
    	$userData->status = 0;
		$userData->save();

        Flash::message('Kullanıcı başarılı bir şekilde silindi.','danger');

        return redirect()->action('Admin\UserController@index');
    }
    public function resizeImagePost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads/');
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.$input['imagename']);

        $user = User::findOrFail($request->id);
        $user->picture ='/uploads/'.$input['imagename'];
        $user->save();

        return back()
            ->with('success','Resim Başarı İle Yüklenmiştir');
    }
}
