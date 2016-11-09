<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use DB;
use Session;
use App\Helpers\Helper;
use Auth;
use Laracasts\Flash\Flash;

class CategoriesController extends Controller
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
    public function index()
    {
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        Session::put('deneme', 'Hasan');
        $categories = Categories::where('type', 'page')->where('status', 1)->get();
        return view('admin.categories.index',['categories' => $categories, 'deleg'=>$this->sess]);
    }
    public function blog()
    {
        $categories = Categories::where('type', 'blog')->where('status', 1)->get();
        return view('admin.categories.blog',['categories' => $categories]);
    }
    public function gallery()
    {
        $categories = Categories::where('type', 'gallery')->get();
        return view('admin.categories.gallery',['categories' => $categories]);
    }
    public function create()
    {
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allCategories = Categories::all();
        return view('admin.categories.create')->with('allCategories', $allCategories);
    }
    public function save(Request $request)
    {
        $categories = new Categories();
        $categories->title = $request->input('title');
        $categories->type = $request->input('type');
        $categories->description = $request->input('description');
        $categories->parent = $request->input('parent');
        $categories->priority = $request->input('priority');
        $categories->status = 1;
        $categories->save();
        Flash::message('Kategori başarılı bir şekilde eklendi.','success');
        //return redirect()->back();
    }
    public function update(Request $request)
    {
        $categories = Categories::find($request->input('categories_id'));
        $categories->title = $request->input('title');
        $categories->type = $request->input('type');
        $categories->description = $request->input('description');
        $categories->parent = $request->input('parent');
        $categories->priority = $request->input('priority');
        $categories->save();
        return redirect()->back();
    }
    public function edit($id)
    {
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allCategories = Categories::all();
        $categories = Categories::find($id);
        return view('admin.categories.edit',['categories' => $categories, 'allCategories' => $allCategories]);
    }
    public function delete($id)
    {
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $categories = Categories::find($id);
        $categories->status = 0;
        $categories->save();
        return redirect()->back();
    }
    public function test()
    {
        $deger = DB::getSchemaBuilder()->getColumnListing('emc_categories');
        echo "<pre>";
        print_r($deger);
        die();
    }

}
