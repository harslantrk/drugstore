<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\Report;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Helpers\Helper;
use Session;
use App\Sms;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        Helper::sessionReload();

    }
    public function index()
    {
        $reports = Report::all()->count();
        $last_sms = Sms::all()->sortByDesc('id')->take(1);//Son Gönderilen Sms'i Alma
        $last_patient = Patient::all()->sortByDesc('id')->take(1);//Son Gönderilen Sms'i Alma
        $patients = Patient::where('status',1)->get();
        return view('admin.home',['patients' => $patients,'last_sms' => $last_sms,'last_patient' => $last_patient,'reports' => $reports]);
    }
}
