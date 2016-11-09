<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Helpers\Helper;
use Session;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        Helper::sessionReload();

    }
    public function index()
    {
        return view('admin.home');
    }
}
