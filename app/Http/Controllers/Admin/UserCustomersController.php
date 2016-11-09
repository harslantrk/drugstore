<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use DB;
use App\UserCustomers;
use App\UserDelegation;

use App\Http\Controllers\Controller;

class UserCustomersController extends Controller
{
   	
   	public function index(){

   		$data=UserCustomers::where('status','1')->get();

   		return view('admin.customers.index',['data'=>$data]);
   	}

   	public function create_file(Request $request){
   		
   		return view('admin.customers.create');
   	}
      public function update_file($id){
         $data=UserCustomers::where('id',$id)->first();

         return view('admin.customers.update',['data'=>$data]);
      }

      public function ajax_createFile(Request $request){
         $data=$request->all();

         $data['status']='1';
         
         $error=UserCustomers::create($data);

            print_r($error);
      }

      public function ajax_editFile(Request $request){
         $data=$request->all();

         $updateOrder = UserCustomers::find($data['id'])->update($data);

         print_r($updateOrder);
      }

      public function get_deleteFile(Request $request){
         $data=$request->all();
         $category = UserCustomers::where('id', $data['id'])->first();
         $category->status = '0';
         $category->save();

         return redirect()->action('Admin\UserCustomersController@index');
      }
}
