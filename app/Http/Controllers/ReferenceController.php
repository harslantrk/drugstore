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
use App\Reference;

class ReferenceController extends Controller
{
    public function index(){
    	$references=Reference::where('status','1')->orderBy('priority','asc')->get();
    	$pageReference=Page::where('status','1')->where('slug','referanslarimiz')->get();
    	return view('template0.references',['references'=>$references,'pageReference'=>$pageReference]);
    }
}