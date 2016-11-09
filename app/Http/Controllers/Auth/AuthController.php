<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $tarih = date('Y')."".date('m')."".date('d')."".date('H').date('i')."".date('s');
        $rand = rand(10000,99999);
        $ip_address = Request::getClientIp();
        $token = $tarih."".$rand."".$ip_address;
        $last_seen = $tarih;
        $email_code = Request::server("HTTP_HOST")."/admin/user-activate/".$token;
        $sms_code = $rand;
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->remember_token = $token;
        $user->group_id = 2;
        $user->last_seen = $last_seen;
        $user->ip_address = $ip_address;
        $user->email_code = $email_code;
        $user->sms_code = $sms_code;
        $user->status = 1;
        $user->save();
        return $user;//redirect()->action('HomeController@index');
        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => $token,
            'group_id' => 2,
            'last_seen' => $last_seen,
            'ip_address' => $ip_address,
            'email_code' => bcrypt($email_code),
            'sms_code' => bcrypt($sms_code),
            'status' => 1,
        ]);
        */
    }
}
