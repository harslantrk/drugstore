<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use App\Categories;
use DB;
use Auth;
use App\Helpers\Helper;
use Session;

class PageController extends Controller
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
        /*$page = Page::where('status', 1)->get();*/
        $page=DB::table('emc_page')
            ->leftjoin('emc_categories', 'emc_page.cat_id', '=', 'emc_categories.id')
            ->where('emc_page.status', 1)
            ->select('emc_page.*','emc_categories.title as cat_title')
            ->get();
        return view('admin.pages.index',['pages' => $page, 'deleg' => $this->sess]);
    }
    public function draft()
    {
        $page=DB::table('emc_page')
            ->join('emc_categories', 'emc_page.cat_id', '=', 'emc_categories.id')
            ->where('emc_page.status', 2)
            ->select('emc_page.*','emc_categories.title as cat_title')
            ->get();
        return view('admin.pages.draft',['pages' => $page]);
    }
    public function deleted()
    {
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $page = Page::where('status', 0)->get();
        return view('admin.pages.deleted',['pages' => $page]);
    }
    public function create()
    {
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allPage = Page::all();
        $categories = Categories::where('type', 'page')->where('status', 1)->get();
        return view('admin.pages.create', ['allPage' => $allPage, 'allCategories' => $categories]);
    }
    public function save(Request $request)
    {
        $page = new Page();
        $page->cat_id = $request->input('cat_id');
        $page->title = $request->input('title');
        $page->slug = str_slug($request->input('title'));
        $page->description = $request->input('description');
        $page->content = $request->input('content');
        $page->keyword = $request->input('keyword');
        $page->priority = $request->input('priority');
        $page->parent = $request->input('parent');
        $page->status = 1;
        $page->save();
    }
    public function update(Request $request)
    {
        $data = $request->all();
        /*echo "<pre>";
        print_r($data);
        die();*/
        $updateOrder = Page::find($request->input('pages_id'))->update($data);
        return redirect()->back();
    }
    public function edit($id)
    {
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $allCategories = Categories::where('status', 1)->get();
        $allPages = Page::where('status', 1)->where('id', '!=', $id)->get();
        $pages = Page::find($id);
        return view('admin.pages.edit',['pages' => $pages, 'allCategories' => $allCategories, 'allPages' => $allPages]);
    }
    public function delete($id)
    {
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $pages = Page::find($id);
        $pages->status = 0;
        $pages->save();
        return redirect()->back();
    }
    public function active($id)
    {
        $pages = Page::find($id);
        $pages->status = 1;
        $pages->save();
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
