@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BEZ RAPORLARI
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li> Hasta Listesi</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if($deleg['a']==1)
                    <div class="col-lg-12">
                        <a href="/admin/patient/create" class="button btn btn-primary">Hasta Ekle</a>
                    </div>
                @endif
            </div><!-- /.row -->
            @foreach($patients as $patient)
                @endforeach
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center">{{$patient->name}}</h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Tc No</b> <span class="pull-right">{{$patient->tc_no}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Telefon</b> <span class="pull-right">{{$patient->phone}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Adres</b> <span class="pull-right">{{$patient->street.' sokak / '.$patient->district.' / '.$patient->city}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Veli</b> <span class="pull-right">{{$patient->parent_name}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Veli Telefon</b> <span class="pull-right">{{$patient->parent_phone}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Sosyal Güvence</b> <span class="pull-right">{{$patient->social_insurance}}</span>
                                </li>
                            </ul>
                            <a href="{{URL::to('/admin/patient/edit/'.$patient->id)}}" class="btn btn-danger btn-block"><b>Bilgileri Düzenle</b></a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Raporlar</h3>
                            <span class="pull-right none-print">
                              <div class="btn-group-vertical">
                              </div>
                          </span>
                            <a href="{{URL::to('/admin/bez/reports/ExcelReport/'.$patient->id)}}" class="btn btn-success pull-right margin-r-5"><i class="fa fa-file-excel-o"></i> Excel Döküm</a>
                            <button class="btn btn-primary pull-right none-print margin-r-5" data-toggle="modal" data-target="#modalYeniRapor"><b>Yeni Rapor Girişi Yap</b></button>
                        </div>
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>Rapor No</th>
                                    <th>Rapor Türü</th>
                                </tr>
                                <?php $no = 1;?>
                                @foreach($reports as $report)
                                    <tr onclick="document.location = '/admin/bez/reports/show/receipt/{{$report->id}}/{{$patient->id}}';" style="cursor: pointer;" title="Reçeteleri Görmek İçin Tıklayınız.">
                                        <td>{{$no}}</td>
                                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$report->start_date)->format('d/m/Y')}}</td>
                                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$report->finish_date)->format('d/m/Y')}}</td>
                                        <td>{{$report->report_no}}</td>
                                        <td>Bez Raporu</td>
                                    </tr>
                                    <?php $no++;?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!-- Rapor Ekleme Modeli -->
    <div class="modal fade" id="modalYeniRapor" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form role="form" action="{{URL::to('/admin/bez/reports/Reportsave')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Yeni Rapor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="start_date">Başlangıç Tarihi</label>
                                <input class="form-control" type="date" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="finish_date">Bitiş Tarihi</label>
                                <input class="form-control" type="date" name="finish_date">
                            </div>
                            <div class="form-group">
                                <label for="reportNo">Rapor No</label>
                                <input class="form-control" type="text" name="report_no" id="report_no">
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Raporu Ekle</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection