<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use App\Http\Controllers\Controller;
use DB;
use App\UserDelegation;
use App\Modules;
use Auth;
use App\Helpers\Helper;

class UserDelegationController extends Controller
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
    	$migrate=UserDelegation::where('status', '1')->get();
	    $data=array();

//        echo "<pre>";

       $column=Modules::where('status','1')->get();

       
       foreach ($migrate as $key => $value) {

        $data[$key]['id']=$value->id;
        $data[$key]['name']=$value->name;
        $auth=json_decode($value->auth);

        foreach ($column as $k => $v) {
            $data[$key][$v->name]=array(
                'r'=>0,
                'a'=>0,
                'u'=>0,
                'd'=>0,
                'p_id'=>$v->parent_id,                
                );

        }

        foreach ($auth as $ky => $str) {

                        $read=substr($str,0,1);
                        $add=substr($str,1,1);
                        $update=substr($str,2,1);
                        $delete=substr($str,3,1);
                        $string=array();
                        $string['p_id']=Modules::where('id',$ky)->select('parent_id')->first()->parent_id;
                        $string['r']=0;
                            $string['a']=0;
                            $string['u']=0;
                            $string['d']=0;
                        if($read==0){
                            $string['r']=0;
                            $string['a']=0;
                            $string['u']=0;
                            $string['d']=0;
                            
                        }else{
                            $string['r']=1;
                            if($add==1){
                               $string['a']=1;
                            }
                            if($update==1){
                                $string['u']=1;
                            }
                            if($delete==1){
                                $string['d']=1;
                            }
                            
                        }
        foreach ($column as $val) {
            if($val->id==$ky){
                $cat=$val->name;
            }
        }

        $data[$key][$cat]=$string;}

       }
       
    	return view('admin.delegation.index',['migrate'=>$data,'column'=>$column,'deleg'=>$this->sess]);
    }

    public function create_file(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }

    	$column=Modules::where('status','1')->get();

    	return view('admin.delegation.create',['column'=>$column]);
    }
    public function update_file($id){
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$migrate=UserDelegation::where('id',$id)->first();
    	/*$column=DB::getSchemaBuilder()->getColumnListing('emc_delegation');*/

        $column=Modules::where('status','1')->get();
    	$data=array();
    	$data['id']=$id;
    	$data['name']=$migrate['name'];

        $auth=json_decode($migrate->auth);

        foreach ($column as $key => $value) {
            $data[$value->name]=array(
                                    'r'=>"",
                                    'a'=>"",
                                    'u'=>"",
                                    'd'=>"",
                                    );
            
        }


        foreach ($auth as $ky => $str) {
                        $read=substr($str,0,1);
                        $add=substr($str,1,1);
                        $update=substr($str,2,1);
                        $delete=substr($str,3,1);
                        $string=array();
                        $string['r']="";
                            $string['a']="";
                            $string['u']="";
                            $string['d']="";
                        if($read==0){
                            $string['r']="";
                            $string['a']="";
                            $string['u']="";
                            $string['d']="";
                            
                        }else{
                            $string['r']=" checked";
                            if($add==1){
                               $string['a']=" checked";
                            }
                            if($update==1){
                                $string['u']=" checked";
                            }
                            if($delete==1){
                                $string['d']=" checked";
                            }
                            
                        }
        foreach ($column as $val) {
            if($val->id==$ky){
                $cat=$val->name;
            }
        }

        $data[$cat]=$string;
        }

    	return view('admin.delegation.update',['data'=>$data,'column'=>$column]);

    }

    public function ajax_createFile(Request $request){
    	$data=$request->all();

    	if($data['name']==null){
    		return 2;
    	}

    	/*$column=DB::getSchemaBuilder()->getColumnListing('emc_delegation');*/

        $column=Modules::where('status','1')->get();

    	$create=array();
    	
    	foreach ($column as  $value) {
    		$read=$value->id.'_list';
    		$add=$value->id.'_add';
    		$update=$value->id.'_update';
    		$delete=$value->id.'_delete';
    		$r=$a=$u=$d='0';
    		if($data[$read]=='on'){
    			$r=1;
    		}
    		if($data[$add]=='on'){
    			$a=1;
    		}
    		if($data[$update]=='on'){
    			$u=1;
    		}
    		if($data[$delete]=='on'){
    			$d=1;
    		}
    	$create[$value->id]=$r.$a.$u.$d;
    	}
        
    	$auth=json_encode($create);

        $end=array(
            'name'=>$data['name'],
            'auth'=>$auth,
            'status'=>'1',
            );
        $error=UserDelegation::create($end);

    	print_r($error->exists);
    }

    public function ajax_editFile(Request $request){
    	$data=$request->all();
    /*	$column=DB::getSchemaBuilder()->getColumnListing('emc_delegation');*/

    $column =Modules::where('status','1')->get();
    	$create=array();
        
        foreach ($column as  $value) {
            $read=$value->id.'_list';
            $add=$value->id.'_add';
            $update=$value->id.'_update';
            $delete=$value->id.'_delete';
            $r=$a=$u=$d='0';
            if($data[$read]=='on'){
                $r=1;
            }
            if($data[$add]=='on'){
                $a=1;
            }
            if($data[$update]=='on'){
                $u=1;
            }
            if($data[$delete]=='on'){
                $d=1;
            }
        $create[$value->id]=$r.$a.$u.$d;
        }
        
        $auth=json_encode($create);

        $end=array(
            'name'=>$data['name'],
            'auth'=>$auth,
            'status'=>'1',
            );
    	$updateOrder = UserDelegation::find($data['id'])->update($end);

    	print_r($updateOrder);
    }

    public function ajax_deleteFile(Request $request){
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$data=$request->all();

    	$category = UserDelegation::where('id', $data['id'])->first();
		$category->status = '0';
		$category->save();
		return redirect()->action('Admin\UserDelegationController@index');
    }
}
