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
use App\Blog;
use App\Reference;
use App\Service;
use App\OurClients;

class ContactController extends Controller
{
    public function index(){
    	return view('template0.contact');
    }
}
