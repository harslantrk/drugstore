<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;
use Auth;
use Carbon\Carbon;
use DB;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;

class ServiceController extends Controller
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
        /*die(Session::get('deneme'));*/
    	$services = Service::all();
    	/*$emc_blog_table = DB::getSchemaBuilder()->getColumnListing('emc_blog');
    	return view('admin.blog.index',['blogs' => $blogs, 'emc_blog_table' => $emc_blog_table]);	*/

    	return view('admin.service.index', ['services' => $services, 'deleg' => $this->sess]);

    }
    public function create(){
    	if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	return view('admin.service.create');
    }

    public function save(Request $request){
    	$hizmet = new Service();
        $hizmet->title = $request->input('title');
        $hizmet['slug']=$request->input('title');
        $hizmet->description = $request->input('description');
        $hizmet->content = $request->input('content');
        $hizmet->short_content = $request->input('short_content');
        $hizmet->icons = $request->input('icons');
        $hizmet->keywords = $request->input('keywords');
        $hizmet->priority = $request->input('priority');
        $hizmet->status = 1;
        $hizmet->save();
    	return redirect('/admin/services');	
    	Flash::message('Hizmet başarılı bir şekilde eklendi.','success');
    }

    public function update(Request $request)
    {
        $hizmet = Service::find($request->input('id'));
        $hizmet->title = $request->input('title');
        $hizmet['slug']=str_slug($request->input('title'));
        $hizmet->description = $request->input('description');
        $hizmet->content = $request->input('content');
        $hizmet->short_content = $request->input('short_content');
        $hizmet->icons = $request->input('icons');
        $hizmet->keywords = $request->input('keywords');
        $hizmet->priority = $request->input('priority');
        $hizmet->status = 1;
        $hizmet->save();
		
        return redirect('/admin/services');	
        Flash::message('Hizmet başarılı bir şekilde güncellendi.','success');
    }

    public function edit($id)
    {
        if($this->read==0 || $this->update==0){
            return redirect()->back();
        }
        $allService = Service::all();
        $services = Service::find($id);
        return view('admin.service.edit',['services' => $services, 'allService' => $allService]);
    }

    

    public function delete($id) {
    	if ($this->read==0 || $this->delete==0) {
    		return redirect()->action('Admin\HomeController@index');
    	}
    	$services=Service::find($id);
    	$services->status=0;
    	$services->save();
    	return redirect()->back();
    }
}
