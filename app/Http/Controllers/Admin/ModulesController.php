<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Modules;

class ModulesController extends Controller
{

	public function index(){


		$data=Modules::where('status','1')->get();

		return view('admin/modules/index',['data'=>$data]);
	}

	public function create_file(){


		return view('admin/modules/create');
	}

	public function edit_file($id){
		$data=Modules::where('id',$id)->first();


		return view('admin/modules/update',['data'=>$data]);
	}

	public function ajax_createFile(Request $request){
		$data=$request->all();

		$js=json_decode($data[0]);

$key=0;
$query=array();

$parent=array(
	'name'=>$js[0]->value,
	'url'=>$js[1]->value,
	'parent_id'=>0,
	'priority'=>$js[3]->value,
	'status'=>'1',
	);
$error=Modules::create($parent);
if(count($js)>4){

$parent_id=$error->id;
$t=0;
		for($i=4;$i<count($js);$i++){
			
			if($t%3==0){
				$key++;}
				$query[$key][$js[$i]->name]=$js[$i]->value;
				$t++;
			
			
		}
$parent=array();
foreach ($query as $value) {

	$value['status']='1';
	$value['parent_id']=$parent_id;

	Modules::create($value);
	
}
}

return true;


	}

	public function ajax_editFile(Request $request){

		$data=$request->all();
echo '<pre>';
	
	$js=json_decode($data[0]);
$key=0;

	$id=$js[0]->value;
	$parent=array(
	'name'=>$js[1]->value,
	'url'=>$js[2]->value,
	'parent_id'=>0,
	'priority'=>$js[4]->value,
	'status'=>'1',
	);

	Modules::find($id)->update($parent);
	if(count($js)>5){
	$t=0;
	for($i=5;$i<count($js);$i++){
			
			if($t%3==0){
				$key++;}
				$query[$key][$js[$i]->name]=$js[$i]->value;
				$t++;
		}

		foreach ($query as $value) {

	$value['status']='1';
	$value['parent_id']=$id;

	Modules::create($value);
	
}
}

	}

	public function ajax_deleteFile(Request $request){
		$data=$request->all();
		
		$category = Modules::where('id', $data['id'])->first();
		$category->status = '0';
		$category->save();
		return redirect()->action('Admin\ModulesController@index');
	}
    //
}
