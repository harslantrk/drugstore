@extends('admin.master')

@section('content')
    @foreach($patients as $patient)
    @endforeach
    @foreach($reports as $report)
    @endforeach
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$report->report_no}} Numaralı Rapor
                <small>Görüntüleniyor</small>
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
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile -->
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
                            <a href="{{URL::to('/admin/bez/reports/show/'.$patient->id)}}" class="btn btn-danger btn-block"><b>Raporlara Git</b></a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- Rapor Box -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center text-danger"><strong>Rapor Bilgileri</strong></h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Başlangıç Tarihi</b> <span class="pull-right">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$report->start_date)->format('d/m/Y')}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Bitiş Tarihi</b> <span class="pull-right">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$report->finish_date)->format('d/m/Y')}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Rapor No</b> <span class="pull-right">{{$report->report_no}}</span>
                                </li>
                            </ul>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Reçeteler</h3>
                            <span class="pull-right none-print">
                              <div class="btn-group-vertical">
                                  <button type="button" class="btn btn-success" onclick="window.print()">
                                      <i class="fa fa-print"></i>
                                      Yazdır
                                  </button>
                              </div>
                          </span>
                            <button class="btn btn-primary pull-right none-print" data-toggle="modal" data-target="#modalYeniRecete" style="width: 20%; margin-right:20px;"><b>Yeni Reçete</b></button>
                        </div>
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>Adet</th>
                                    <th>Birim Fiyat</th>
                                    <th>Tutar</th>
                                    <th>Toplam (KDV % 18)</th>
                                    <th>Reçete Açıklaması</th>
                                </tr>
                                <?php $no = 1;?>
                                @foreach($receipts as $receipt)
                                    <tr onclick="document.location = '/admin/bez/reports/show/receipt/payment/{{$receipt->id}}/{{$patient->id}}/';" style="cursor: pointer;" title="Ödemeleri Görmek İçin Tıklayınız.">
                                        <td>{{$no}}</td>
                                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receipt->start_date)->format('d/m/Y')}}</td>
                                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receipt->finish_date)->format('d/m/Y')}}</td>
                                        <td>{{$receipt->quantity}}</td>
                                        <td>{{$receipt->unit_price}}</td>
                                        <td>{{$receipt->sum}}</td>
                                        <td>{{$receipt->total}}</td>
                                        <td>{{$receipt->detail}}</td>
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
    <!-- Reçete Ekleme Modeli -->
    <div class="modal fade" id="modalYeniRecete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form role="form" action="{{URL::to('/admin/bez/reports/ReceiptSave')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <input type="hidden" name="report_id" value="{{$report->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Yeni Reçete</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputKonu">Rapor</label>
                                <input class="form-control" type="text" name="report_id" value="{{$report->report_no}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Başlangıç Tarihi</label>
                                <input class="form-control" type="date" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="finish_date">Bitiş Tarihi</label>
                                <input class="form-control" type="date" name="finish_date">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Miktar</label>
                                <input class="form-control" type="number" name="quantity" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="unitPrice">Birim Fiyat</label>
                                <input class="form-control" type="number" name="unit_price" id="unit_price" onkeyup="hesaplama()">
                            </div>
                            <div class="form-group">
                                <label for="sum">Tutar</label>
                                <input class="form-control" type="number" name="sum" id="sum">
                            </div>
                            <div class="form-group">
                                <label for="total">Genel Toplam (KDV %18)</label>
                                <input class="form-control" type="number" name="total" id="total">
                            </div>
                            <div class="form-group">
                                <label for="detail">Açıklama</label>
                                <input class="form-control" type="text" name="detail">
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Reçeteyi Ekle</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div>
    </div><!-- /.modal-dialog -->
@endsection