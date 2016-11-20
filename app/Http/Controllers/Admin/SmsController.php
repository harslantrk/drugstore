<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Patient;
use App\Sms;

class SmsController extends Controller
{
    //Hizmetlerimiz Listeleme
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
        $patients = Patient::where('status',1)->get();


        return view('admin.sms.index', ['patients' => $patients, 'deleg' => $this->sess]);
    }
    public function createPost(Request $request){
        $table = $request->all();
        $veliler = $request->input('veli_id');
        $hastalar = $request->input('hasta_id');


        foreach($veliler as $key => $value)
        {
            $sms = new Sms();
            //echo "Veli Hasta ID = "."$key"." sms_detail_secerek = ".$request->input('sms_detail_secerek')."Veli Telefon Numarası = ".$table['veli_tel'][$key]."<br>";
            $sms->sms_detail = $table['sms_detail_secerek'];
            $sms->receiver = $key;
            $sms->phone = $table['veli_tel'][$key];
            $sms->issend = 0;
            $sms->status = 0;
            $sms->save();
        }
        foreach($hastalar as $key => $value)
        {
            $sms = new Sms();
            //echo "Hasta ID = "."$key"." sms_detail_secerek = ".$request->input('sms_detail_secerek')."Hasta Telefon Numarası = ".$table['hasta_tel'][$key]."<br>";
            $sms->sms_detail = $table['sms_detail_secerek'];
            $sms->receiver = $key;
            $sms->phone = $table['hasta_tel'][$key];
            $sms->issend = 0;
            $sms->status = 0;
            $sms->save();
        }
        /*echo '<pre>';
        print_r($table);
        die();*/

        return redirect()->back();
    }
    public function createElle(Request $request){
        $table = $request->all();
        $sms = new Sms();
        $sms->sms_detail = $table['sms_detail_elle'];
        $sms->receiver = 0;
        $sms->phone = $table['elle_phone'];
        $sms->issend = 0;
        $sms->status = 0;
        $sms->save();

        return redirect()->back();
    }
}
