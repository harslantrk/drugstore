<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Product;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;


class ProductController extends Controller
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
    //Tüm Ürünler
    public function index(){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	//$products = Product::all();
        $products = DB::table('products')->join('users', 'products.author', '=', 'users.id')
                                ->select('products.*','users.name as username')
                                ->get();
    	return view('admin.product.index')->with(['products' => $products,'deleg' => $this->sess]);
    }
    //Yeni Ürünler
    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	return view('admin.product.create');
    }

    //Yeni Ürün Oluşturma Fonksiyonu
    public function save(Request $request){
    	$product = new Product();
        $product->author = Auth::user()->id;
        $product->name = $request->input("name");
        $product->content = $request->input("content");
        $product->price = $request->input("price");
        $product->stock = $request->input("stock");
        $product->description = $request->input("description");
        $product->priority = $request->input("priority");
        $product->tags = $request->input("tags");
        $product->image = $request->input("image");
        $product->status = 1;
        $product->save();
    	return redirect('/admin/product/tum-urunler');
    }

    public function edit(Request $request){
        if($this->read==0 || $this->update==0){
            return redirect()->back();
        }
    	$id = $request->id;
    	$product = Product::find($id);
    	return view('admin.product.edit')->with(['product' => $product]);
    }
    
    // Ürün Güncelleme Fonksiyonu
    public function update(Request $request){
        $id = $request->input("id");
		$productData = Product::find($id);
        $productData->name = $request->input("name");
        $productData->content = $request->input("content");
        $productData->price = $request->input("price");
        $productData->stock = $request->input("stock");
        $productData->description = $request->input("description");
        $productData->priority = $request->input("priority");
        $productData->tags = $request->input("tags");
        $productData->image = $request->input("image");
        $productData->save();
    	return redirect('/admin/product/tum-urunler');
    }
    // Ürün Silme Fonksiyonu
    public function delete(Request $request){
        if ($this->read==0 || $this->delete==0) {
            return redirect()->action('Admin\HomeController@index');
        }
    	$id = $request->id;
    	$productData = Product::find($id);
		$productData->delete();
		return redirect('/admin/product/tum-urunler');
    }
    //ürünü taslak olarak Oluşturma Fonksiyonu
    public function draft(Request $request){
        $product = new Product();
        $product->name = $request->input("name");
        $product->content = $request->input("content");
        $product->price = $request->input("price");
        $product->stock = $request->input("stock");
        $product->description = $request->input("description");
        $product->priority = $request->input("priority");
        $product->tags = $request->input("tags");
        $product->image = $request->input("image");
        $product->status = 2;
        $product->save();
        return redirect('/admin/product/tum-urunler');
    }

    public function updateDraft(Request $request){
        $id = $request->input("id");
        $productData = Product::find($id);
        $productData->name = $request->input("name");
        $productData->content = $request->input("content");
        $productData->price = $request->input("price");
        $productData->stock = $request->input("stock");
        $productData->description = $request->input("description");
        $productData->priority = $request->input("priority");
        $productData->tags = $request->input("tags");
        $productData->image = $request->input("image");
        $productData->status = 2;
        $productData->save();
        return redirect('/admin/product/tum-urunler');
    }
}
