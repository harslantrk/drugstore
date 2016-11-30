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
use App\Patient; // Silinecek !!!

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
        $reports_type = DB::table('reports_type')
            ->select('reports_type.*')
            ->get();
        return view('admin.patient.create',['reports_type' => $reports_type]);
    }
    public function save(Request $requests){
        try {
            $data = $requests->all();
            $data['status'] = 1;
            if ($data['report_type']) {
                $data['report_type'] = json_encode($data['report_type']);
            }else{
                $data['report_type'] = '{}';
            }

            /*echo '<pre>';
            print_r($data);
            die();*/
            Patient::create($data);
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
            $reports_type = DB::table('reports_type')
                ->select('reports_type.*')
                ->get();
            $this_report_type = json_decode($patient->report_type);
            return view('admin.patient.edit')->with(['patient' => $patient,'reports_type' => $reports_type, 'this_report_type' => $this_report_type]);

        } catch (\Exception $e) {

            Flash::message($e->getMessage(),'danger');
            return $this->index();
        }
    }
    public function update(Request $requests){
        try {
            $id = $requests->id;
            $data = $requests->all();
            if($data['report_type']){
                $data['report_type'] = json_encode($data['report_type']);
            }else{
                $data['report_type'] = '{}';
            }

            /*echo '<pre>';
            print_r($data);
            die();*/
            Patient::findOrFail($id)->update($data);
            Flash::message('Hasta Güncelleme İşlemi Başarılı','success');
            return $this->index();
        } catch (\Exception $e) {

            Flash::message($e->getMessage(),'danger');
            return $this->index();
        }
    }
}
