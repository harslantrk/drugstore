<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\Receipt;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;
use Laracasts\Flash\Flash;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Patient;
use App\Report;

class BezController extends Controller
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
        $patients = Patient::where('status',1)->where('report_type','like','%'.'"1":"on"'.'%')->get();

        $reports = Report::all();
        $receipts = Receipt::all();
        /*echo '<pre>';
        print_r($rapor);
        die();*/

        return view('admin.bez.reports.index', ['patients' => $patients, 'deleg' => $this->sess,'reports' => $reports,'receipts'=>$receipts]);
    }
    public function BezReportSave(Request $request){
        $data = $request->all();
        $data['report_type'] = 1;

        Report::create($data);
        return redirect()->back();
        /*echo '<pre>';
        print_r($data);
        die();*/
    }
    public function BezReceiptSave(Request $request){
        $data = $request->all();
        //$data['report_type'] = 1;
        /*echo '<pre>';
        print_r($data);
        die();*/
        Receipt::create($data);
        return redirect()->back();

    }
    public function reportGetir(Request $request){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $data = $request->all();

        $reports = Report::where('patient_id',$data['receipt_id'])->get();

        /*echo '<pre>';
        echo $reports[0]['patient_id'];
        var_dump($reports);
        die();*/
        return view('admin.bez.reports.modalView',['reports' => $reports]);
    }
    public function show($id){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $patients = Patient::where('id',$id)->get();
        $reports = Report::where('patient_id',$id)
                        ->where('report_type',1)
                        ->get();
        /*echo '<pre>';
        var_dump($patients[0]);
        die();*/
        return view('admin.bez.reports.show',['deleg'=>$this->sess,'patients' => $patients,'reports' => $reports]);
    }
    public function receiptShow($report_id,$patient_id){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $receipts = Receipt::where('patient_id',$patient_id)
                            ->where('report_id',$report_id)
                            ->get();
        $reports = Report::where('id',$report_id)
                            ->where('patient_id',$patient_id)
                            ->where('report_type',1)
                            ->get();
        $patient = Patient::where('id',$patient_id)
                            ->get();
        return view('admin.bez.reports.receiptShow',['deleg'=>$this->sess,'patients' => $patient,'reports' => $reports,'receipts' => $receipts]);
    }
    public function PaymentGetir(Request $request){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $data = $request->all();

        $receipts = Receipt::where('patient_id',$data['patient_id'])->get();
        /*echo '<pre>';
                var_dump($receipts);
                die();*/
        return view('admin.bez.reports.modalView',['receipts' => $receipts]);
    }
    public function Paymentsave(Request $request){
        $data = $request->all();
        /*echo '<pre>';
                var_dump($data);
                die();*/
        Payment::create($data);
        return redirect()->back();
    }
    public function paymentShow($receipt_id,$patient_id){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        $receipts = Receipt::where('patient_id',$patient_id)
            ->get();

        $payments = Payment::where('receipt_id',$receipt_id)
            ->get();

        $patient = Patient::where('id',$patient_id)
            ->get();

        return view('admin.bez.reports.paymentShow',['deleg'=>$this->sess,'patients' => $patient,'payments' => $payments,'receipts' => $receipts]);
    }
    public function ExcelReport($patient_id){

        $patient = Patient::where('id',$patient_id)->get();
        $reports = Report::where('patient_id',$patient_id)->get();

        Excel::create($patient[0]->name.' - Raporları', function($excel) use($reports) {
            $excel->sheet('Raporlar', function($sheet) use($reports) {

                $row = 2;

                $sheet->setAutoSize(true);
                $sheet->cells('A1:C1', function($cells) {

                    $cells->setBackground('#e69988');
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                    ));
                    $cells->setAlignment('center');
                    //$cells->setBorder('solid', 'none', 'none', 'solid'); Çalışmıyor :/

                });
                $sheet->setBorder('A1:C1', 'thin');
                $sheet->row(1,['Başlangıç Tarihi','Bitiş Tarihi','Rapor No']); // Sutun isimlerini Verme

                foreach ($reports as $report){
                    $sheet->row($row,[
                        Carbon::parse($report->start_date)->format('d/m/Y'),
                        Carbon::parse($report->finish_date)->format('d/m/Y'),
                        $report->report_no
                    ]);
                    $row++;
                }

            });
        })->export('xls');
    }
}
