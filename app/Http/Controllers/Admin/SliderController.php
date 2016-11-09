<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use Auth;
use Carbon\Carbon;
use DB;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;

class SliderController extends Controller
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
    	$slider = Slider::all();

    	return view('admin.slider.index', ['slider' => $slider, 'deleg' => $this->sess]);
    }

    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        return view('admin.slider.create');
    }

    public function save(Request $request){       

       $path = base_path() . '/public/img/slider';

       $imageTempName = $request->file('image')->getPathname();
       $current_time = time();
       $imageName = $current_time."_".$request->file('image')->getClientOriginalName();

       $request->file('image')->move($path , $imageName);
       $newresim = '/img/slider/'.$imageName;

        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->priority = $request->input('priority');
        $slider->opacity = $request->input('opacity');
        $slider->image = $newresim;
        $slider->link = $request->input('link');
        $slider->status = $request->input('status');
        $slider->save();
        return redirect('/admin/slider'); 
        Flash::message('Slider başarılı bir şekilde eklendi.','success');
    }

    public function update(Request $request)
    {
    	$path = base_path() . '/public/img/slider';

       $imageTempName = $request->file('image')->getPathname();
       $current_time = time();
       $imageName = $current_time."_".$request->file('image')->getClientOriginalName();

       $request->file('image')->move($path , $imageName);
       $newresim = '/img/slider/'.$imageName;
        $slider = Slider::find($request->input('id'));
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->priority = $request->input('priority');
        $slider->opacity = $request->input('opacity');
        $slider->image = $newresim;
        $slider->link = $request->input('link');
        $slider->status = $request->input('status');
        $slider->save();        
        return redirect('/admin/slider'); 
        Flash::message('Slider başarılı bir şekilde güncellendi.','success');
    }

    public function edit($id)
    {
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allSlider = Slider::all();
        $slider = Slider::find($id);
        return view('admin.slider.edit',['slider' => $slider, 'allSlider' => $allSlider]);
    }

    

    public function delete($id) {
        if ($this->read==0 || $this->delete==0) {
            return redirect()->action('Admin\HomeController@index');
        }
        $slider=Slider::find($id);
        $slider->status=0;
        $slider->save();
        return redirect()->back();
    }
}
