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
use App\Slider;
use App\OurClients;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
        
     

    public function index()
    {

        $hak=Page::where('status','1')->get();
        $blog=Blog::where('status','1')->get();
        $services=Service::where('status','1')->orderBy('priority','asc')->limit(9)->get();
        $comment=OurClients::where('status','1')->orderBy('priority','asc')->get();
        $reference=Reference::where('status','1')->orderBy('priority','asc')->get();
        $sliders=Slider::where('status','1')->orderBy('priority','asc')->get();
        return view('template0.home',['hak'=>$hak,'blog'=>$blog,'services'=>$services,'comment'=>$comment,'reference'=>$reference,'sliders'=>$sliders]);
    }
    public function showPage($slug){
        $page=Page::where('slug',$slug)->where('status','1')->first();
        if (isset($page)) {
            return view('template0.page',['page'=>$page]);
        }
        else {
            return redirect()->action('HomeController@index');
        }
        
    }

    public function web(){
        return view('welcome');
    }

}
