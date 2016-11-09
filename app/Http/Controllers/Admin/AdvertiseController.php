<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Advertise;
use Laracasts\Flash\Flash;
use Auth;
use App\Helpers\Helper;
use Session;

class AdvertiseController extends Controller
{
    public function introIndex(){
    	$advertise = Advertise::where('type',1)->where('status',1)->get();
    	return view('admin.advertise.intro.index')->with(['advertise' => $advertise]);
    }

    public function introCreate(){
    	return view('admin.advertise.intro.create');
    }

    public function introSave(Request $request){
		$type = $request->input("type");
		$name = $request->input("name");
		$image = $request->input("image");
		$title = $request->input("title");
		$content = $request->input("content");
		$slug = $request->input("slug");
		$display = $request->input("display");
		$advertise = new Advertise;
		$advertise->type = $type;
		$advertise->name = $name;
		$advertise->image = $image;
		$advertise->title = $title;
		$advertise->content = $content;
		$advertise->slug = $slug;
		$advertise->display = $display;
		$advertise->status = 1;
		$advertise->save();

        Flash::message('İntro reklamı başarılı bir şekilde eklendi.','success');

    	return redirect()->action('Admin\AdvertiseController@introIndex');
    }

    public function introEdit(Request $request){
    	$id = $request->id;
    	$advertise = Advertise::find($id);
    	return view('admin.advertise.intro.edit')->with(['advertise' => $advertise]);
    }

    public function introUpdate(Request $request){
		$id = $request->input("id");
		$type = $request->input("type");
		$name = $request->input("name");
		$image = $request->input("image");
		$title = $request->input("title");
		$content = $request->input("content");
		$slug = $request->input("slug");
		$display = $request->input("display");
		$advertise = Advertise::find($id);
		$advertise->type = $type;
		$advertise->name = $name;
		$advertise->image = $image;
		$advertise->title = $title;
		$advertise->content = $content;
		$advertise->slug = $slug;
		$advertise->display = $display;
		$advertise->save();

        Flash::message('İntro reklamı başarılı bir şekilde güncellendi.','success');

		return redirect()->action('Admin\AdvertiseController@introIndex');
    }

    public function introDelete(Request $request){
    	$id = $request->id;
    	$advertise = Advertise::find($id);
    	$advertise->status = 0;
		$advertise->save();

        Flash::message('İntro reklamı başarılı bir şekilde silindi.','danger');

        return redirect()->action('Admin\AdvertiseController@introIndex');
    }

    public function popupIndex(){
    	$advertise = Advertise::where('type',2)->where('status',1)->get();
    	return view('admin.advertise.popup.index')->with(['advertise' => $advertise]);
    }

    public function popupCreate(){
    	return view('admin.advertise.popup.create');
    }

    public function popupSave(Request $request){
		$type = $request->input("type");
		$name = $request->input("name");
		$page_id = $request->input("page");
		$image = $request->input("image");
		$title = $request->input("title");
		$content = $request->input("content");
		$slug = $request->input("slug");
		$display = $request->input("display");
		$advertise = new Advertise;
		$advertise->type = $type;
		$advertise->name = $name;
		$advertise->page_id = $page_id;
		$advertise->image = $image;
		$advertise->title = $title;
		$advertise->content = $content;
		$advertise->slug = $slug;
		$advertise->display = $display;
		$advertise->status = 1;
		$advertise->save();

        Flash::message('Popup reklamı başarılı bir şekilde eklendi.','success');

    	return redirect()->action('Admin\AdvertiseController@popupIndex');
    }

    public function popupEdit(Request $request){
    	$id = $request->id;
    	$advertise = Advertise::find($id);
    	return view('admin.advertise.popup.edit')->with(['advertise' => $advertise]);
    }

    public function popupUpdate(Request $request){
		$id = $request->input("id");
		$type = $request->input("type");
		$name = $request->input("name");
		$page_id = $request->input("page");
		$image = $request->input("image");
		$title = $request->input("title");
		$content = $request->input("content");
		$slug = $request->input("slug");
		$display = $request->input("display");
		$advertise = Advertise::find($id);
		$advertise->type = $type;
		$advertise->name = $name;
		$advertise->page_id = $page_id;
		$advertise->image = $image;
		$advertise->title = $title;
		$advertise->content = $content;
		$advertise->slug = $slug;
		$advertise->display = $display;
		$advertise->save();

        Flash::message('Popup reklamı başarılı bir şekilde güncellendi.','success');

        return redirect()->action('Admin\AdvertiseController@popupIndex');
    }

    public function popupDelete(Request $request){
    	$id = $request->id;
    	$advertise = Advertise::find($id);
    	$advertise->status = 0;
		$advertise->save();

        Flash::message('Popup reklamı başarılı bir şekilde silindi.','danger');

        return redirect()->action('Admin\AdvertiseController@popupIndex');
    }

    public function pageInIndex(){
    	$advertise = Advertise::where('type',3)->where('status',1)->get();
    	return view('admin.advertise.pageIn.index')->with(['advertise' => $advertise]);
    }

    public function pageInCreate(){
    	return view('admin.advertise.pageIn.create');
    }

    public function pageInSave(Request $request){
		$type = $request->input("type");
		$name = $request->input("name");
		$page_id = $request->input("page");
		$top = $request->input("top");
		$left = $request->input("left");
		$inside = $request->input("inside");
		$right = $request->input("right");
		$bottom = $request->input("bottom");
		$layout	= $top."|".$left."|".$inside."|".$right."|".$bottom;
		$image = $request->input("image");
		$title = $request->input("title");
		$content = $request->input("content");
		$slug = $request->input("slug");
		$display = $request->input("display");
		$advertise = new Advertise;
		$advertise->type = $type;
		$advertise->name = $name;
		$advertise->page_id = $page_id;
		$advertise->layout = $layout;
		$advertise->image = $image;
		$advertise->title = $title;
		$advertise->content = $content;
		$advertise->slug = $slug;
		$advertise->display = $display;
		$advertise->status = 1;
		$advertise->save();

        Flash::message('Sayfa içi reklamı başarılı bir şekilde eklendi.','success');

    	return redirect()->action('Admin\AdvertiseController@pageInIndex');
    }

    public function pageInEdit(Request $request){
    	$id = $request->id;
    	$advertise = Advertise::find($id);
    	return view('admin.advertise.pageIn.edit')->with(['advertise' => $advertise]);
    }

    public function pageInUpdate(Request $request){
		$id = $request->input("id");
		$type = $request->input("type");
		$name = $request->input("name");
		$page_id = $request->input("page");
		$top = $request->input("top");
		$left = $request->input("left");
		$inside = $request->input("inside");
		$right = $request->input("right");
		$bottom = $request->input("bottom");
		$layout	= $top."|".$left."|".$inside."|".$right."|".$bottom;
		$image = $request->input("image");
		$title = $request->input("title");
		$content = $request->input("content");
		$slug = $request->input("slug");
		$display = $request->input("display");
		$advertise = Advertise::find($id);
		$advertise->type = $type;
		$advertise->name = $name;
		$advertise->page_id = $page_id;
		$advertise->layout = $layout;
		$advertise->image = $image;
		$advertise->title = $title;
		$advertise->content = $content;
		$advertise->slug = $slug;
		$advertise->display = $display;
		$advertise->save();

        Flash::message('Sayfa içi reklamı başarılı bir şekilde güncellendi.','success');

        return redirect()->action('Admin\AdvertiseController@pageInIndex');
    }

    public function pageInDelete(Request $request){
    	$id = $request->id;
    	$advertise = Advertise::find($id);
    	$advertise->status = 0;
		$advertise->save();

        Flash::message('Sayfa içi reklamı başarılı bir şekilde silindi.','danger');

        return redirect()->action('Admin\AdvertiseController@pageInIndex');
    }
}
