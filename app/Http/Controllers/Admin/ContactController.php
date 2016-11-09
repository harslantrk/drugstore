<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contacts;
use Auth;
use Carbon\Carbon;
use DB;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;

class ContactController extends Controller
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

    public function index() {
    	if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$contacts = Contacts::all();

    	return view('admin.contact.index', ['contacts' => $contacts, 'deleg' => $this->sess]);
    }
    public function save(Request $request){
        $message = new Contacts();
        $message->name = $request->input('name');
        $message->subject = $request->input('subject');
        $message->email = $request->input('email');
        $message->phone = $request->input('phone');
        $message->status = 1;
        $message->message = $request->input('message');
        $message->save();
        return redirect('/iletisim'); 
        Flash::message('Mesajınız başarılı bir şekilde gönderildi.','success');
    }

    public function read(Request $request){
    	$contacts = Contacts::find($request->input('id'));
    	$contacts->read=1;
    	$contacts->save();
    }

    public function delete($id) {
        if ($this->read==0 || $this->delete==0) {
            return redirect()->action('Admin\HomeController@index');
        }
        $message=Contacts::find($id);
        $message->status=0;
        $message->save();
        return redirect()->back();
    }
}
