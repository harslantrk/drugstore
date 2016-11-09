<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
use Session;
use App\UserDelegation;
use App\Helpers\Helper;
use App\Modules;
use App\Page;
use App\Service;

class ServicesController extends Controller
{
    public function index(){
    	$services=Service::where('status','1')->orderBy('priority','asc')->get();
    	$pageService=Page::where('status','1')->where('slug','hizmetlerimiz')->get();
    	return view('template0.services',['services'=>$services,'pageService'=>$pageService]);
    }
}
