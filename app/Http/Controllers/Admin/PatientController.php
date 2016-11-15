<?php

namespace App\Http\Controllers\Admin;

use League\Flysystem\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use Auth;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Patient;

class PatientController extends Controller
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
        $patients = Patient::where('status',1)->get();

        return view('admin.patient.index', ['patients' => $patients, 'deleg' => $this->sess]);
    }
    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
        return view('admin.patient.create');
    }
    public function save(Request $requests){
        try {
            $patient = new Patient();
            $patient->status = 1;
            $patient->name = $requests->input('name');
            $patient->tc_no = $requests->input('tc_no');
            $patient->phone = $requests->input('phone');
            $patient->birthdate = $requests->input('birthdate');
            $patient->street = $requests->input('street');
            $patient->district = $requests->input('district');
            $patient->city = $requests->input('city');
            $patient->apartment = $requests->input('apartment');
            $patient->post_code = $requests->input('post_code');
            $patient->school_name = $requests->input('school_name');
            $patient->class = $requests->input('class');
            $patient->educational = $requests->input('educational');
            $patient->detail = $requests->input('detail');
            $patient->social_insurance = $requests->input('social_insurance');

            $patient->save();
            Flash::message('Hasta başarılı bir şekilde eklendi.','success');
            return $this->index();
        } catch (\Exception $e) {
            Flash::message($e->getMessage(),'danger');
            return $this->index();
        }

    }
    public function delete(Request $request){
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
        try {
            $id = $request->id;
            $patient = Patient::findOrFail($id);
            $patient->status = 0;
            $patient->save();

            Flash::message('Hasta başarılı bir şekilde silindi.','success');

            return $this->index();
        } catch (\Exception $e) {
            Flash::message($e->getMessage(),'danger');
            return $this->index();
        }
    }
    public function edit(Request $requests){
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }

        try {
            $id = $requests->id;
            $patient = Patient::findOrFail($id);

            return view('admin.patient.edit')->with(['patient' => $patient]);

        } catch (\Exception $e) {

            Flash::message($e->getMessage(),'danger');
            return $this->index();
        }
    }
    public function update(Request $requests){
        try {
            $id = $requests->id;
            $data = $requests->all();
            Patient::find($id)->update($data);
            Flash::message('Hasta Güncelleme İşlemi Başarılı','success');
            return $this->index();
        } catch (\Exception $e) {

            Flash::message($e->getMessage(),'danger');
            return $this->index();
        }
    }
}
