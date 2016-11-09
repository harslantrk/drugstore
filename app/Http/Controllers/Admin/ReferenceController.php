<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reference;
use Auth;
use Carbon\Carbon;
use DB;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;


class ReferenceController extends Controller
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
    	$references = Reference::all();

    	return view('admin.reference.index', ['references' => $references, 'deleg' => $this->sess]);

    }
    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        return view('admin.reference.create');
    }

    public function save(Request $request){       

       $path = base_path() . '/public/img/reference';

       $imageTempName = $request->file('image')->getPathname();
       $current_time = time();
       $imageName = $current_time."_".$request->file('image')->getClientOriginalName();

       $request->file('image')->move($path , $imageName);
       $newresim = '/img/reference/'.$imageName;

        $reference = new Reference();
        $reference->name = $request->input('name');
        $reference->priority = $request->input('priority');
        $reference->image = $newresim;
        $reference->link = $request->input('link');
        $reference->status = $request->input('status');
        $reference->save();
        return redirect('/admin/reference'); 
        Flash::message('Referans başarılı bir şekilde eklendi.','success');
    }

    public function update(Request $request)
    {
    	$path = base_path() . '/public/img/reference';

       $imageTempName = $request->file('image')->getPathname();
       $current_time = time();
       $imageName = $current_time."_".$request->file('image')->getClientOriginalName();

       $request->file('image')->move($path , $imageName);
       $newresim = '/img/reference/'.$imageName;
        $reference = Reference::find($request->input('id'));
        $reference->name = $request->input('name');
        $reference->priority = $request->input('priority');
        $reference->image = $newresim;
        $reference->link = $request->input('link');
        $reference->status = $request->input('status');
        $reference->save();        
        return redirect('/admin/reference'); 
        Flash::message('Referans başarılı bir şekilde güncellendi.','success');
    }

    public function edit($id)
    {
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allReference = Reference::all();
        $reference = Reference::find($id);
        return view('admin.reference.edit',['reference' => $reference, 'allReference' => $allReference]);
    }

    

    public function delete($id) {
        if ($this->read==0 || $this->delete==0) {
            return redirect()->action('Admin\HomeController@index');
        }
        $reference=Reference::find($id);
        $reference->status=0;
        $reference->save();
        return redirect()->back();
    }

}
