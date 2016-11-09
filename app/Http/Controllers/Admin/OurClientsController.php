<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OurClients;
use Auth;
use Carbon\Carbon;
use DB;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;

class OurClientsController extends Controller
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
    	$ourclients = OurClients::all();

    	return view('admin.ourclients.index', ['ourclients' => $ourclients, 'deleg' => $this->sess]);

    }
    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        return view('admin.ourclients.create');
    }

    public function save(Request $request){
        $path = base_path() . '/public/img/our-client';

       $imageTempName = $request->file('image')->getPathname();
       $current_time = time();
       $imageName = $current_time."_".$request->file('image')->getClientOriginalName();

       $request->file('image')->move($path , $imageName);
       $newresim = '/img/our-client/'.$imageName;

        $comment = new OurClients();
        $comment->name = $request->input('name');
        $comment->priority = $request->input('priority');
        $comment->image = $newresim;
        $comment['slug']=str_slug($request->input('name'));
        $comment->position = $request->input('position');
        $comment->comment = $request->input('comment');
        $comment->status = $request->input('status');
        $comment->save();
        return redirect('/admin/our-client'); 
        Flash::message('Yorum başarılı bir şekilde eklendi.','success');
    }

    public function update(Request $request)
    {
        $path = base_path() . '/public/img/our-client';

       $imageTempName = $request->file('image')->getPathname();
       $current_time = time();
       $imageName = $current_time."_".$request->file('image')->getClientOriginalName();

       $request->file('image')->move($path , $imageName);
       $newresim = '/img/our-client/'.$imageName;
        $comment = OurClients::find($request->input('id'));
        $comment->name = $request->input('name');
        $comment->priority = $request->input('priority');
        $comment->image = $newresim;
        $comment['slug']=str_slug($request->input('name'));
        $comment->position = $request->input('position');
        $comment->comment = $request->input('comment');
        $comment->status = $request->input('status');
        $comment->save();
        
        return redirect('/admin/our-client'); 
        Flash::message('Yorum başarılı bir şekilde güncellendi.','success');
    }

    public function edit($id)
    {
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allClientComment = OurClients::all();
        $clientcomment = OurClients::find($id);
        return view('admin.ourclients.edit',['clientcomment' => $clientcomment, 'allClientComment' => $allClientComment]);
    }

    

    public function delete($id) {
        if ($this->read==0 || $this->delete==0) {
            return redirect()->action('Admin\HomeController@index');
        }
        $clientcomment=OurClients::find($id);
        $clientcomment->status=0;
        $clientcomment->save();
        return redirect()->back();
    }

}