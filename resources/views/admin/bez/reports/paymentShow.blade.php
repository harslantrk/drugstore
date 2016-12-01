@extends('admin.master')

@section('content')
    @foreach($patients as $patient)
    @endforeach
    @foreach($receipts as $receipt)
    @endforeach
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Reçete Ödeme
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
                <div class="col-md-4">
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
                            <a href="{{URL::to('/admin/bez/reports/show/receipt/'.$receipt->id.'/'.$patient->id)}}" class="btn btn-danger btn-block"><b>Reçetelere Git</b></a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- Rapor Box -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <h3 class="profile-username text-center text-danger"><strong>Reçete Bilgileri</strong></h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Başlangıç Tarihi</b> <span class="pull-right">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receipt->start_date)->format('d/m/Y')}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Bitiş Tarihi</b> <span class="pull-right">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receipt->finish_date)->format('d/m/Y')}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Adet</b> <span class="pull-right">{{$receipt->quantity}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Birim Fiyat</b> <span class="pull-right">{{$receipt->unit_price}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Tutar</b> <span class="pull-right">{{$receipt->sum}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Toplam (KDV % 18)</b> <span class="pull-right">{{$receipt->total}}</span>
                                </li>
                            </ul>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Ödemeler</h3>
                            <span class="pull-right none-print">
                              <div class="btn-group-vertical">
                                  <button type="button" class="btn btn-success" onclick="window.print()">
                                      <i class="fa fa-print"></i>
                                      Yazdır
                                  </button>
                              </div>
                          </span>
                            <button id="OdemeModalButon" class="btn btn-primary pull-right none-print" data-toggle="modal" data-target="#modalYeniOdeme" style="width: 20%; margin-right:20px;"><b>Yeni Ödeme</b></button>
                        </div>
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                <tr class="bg-red-gradient">
                                    <th style="width: 10px">#</th>
                                    <th>Ödeme Tarihi</th>
                                    <th>Ödemeyi Yapan</th>
                                    <th>Ödenen Tutar</th>
                                </tr>
                                <?php
                                    $no = 1;
                                    $toplam = 0;
                                ?>
                                @foreach($payments as $payment)
                                    <tr class="bg-green-gradient">
                                        <td>{{$no}}</td>
                                        <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$payment->payment_date)->format('d/m/Y')}}</td>
                                        <td>{{$payment->payment_person}}</td>
                                        <td>{{$payment->payment}}</td>
                                    </tr>
                                    <?php
                                        $no++;
                                        $toplam += $payment->payment;
                                    ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pull-right">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Kalan Tutar</h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Ödemesi Yapılan Tutar:</th>
                                        <td class="text-danger text-bold">{{$toplam}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kalan Tutar</th>
                                        <td id="kalanTutar" class="text-danger text-bold">{{$kalan =  $receipt->total - $toplam}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!-- Ödeme Yapma Modeli -->
    <div class="modal fade" id="modalYeniOdeme" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form role="form" action="{{URL::to('/admin/bez/reports/Paymentsave')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="patient_id" id="patient_id" value="{{ $receipt->patient_id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Yeni Ödeme</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="start_date">Reçete Seç</label>
                                <input class="form-control" type="text" name="receipt_id" value="{{$receipt->detail}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="finish_date">Ödeme Tarihi</label>
                                <input class="form-control" type="date" name="payment_date">
                            </div>
                            <div class="form-group">
                                <label for="reportNo">Ödeme Yapan</label>
                                <input class="form-control" type="text" name="payment_person">
                            </div>
                            <div class="form-group">
                                <label for="reportNo">Ödeme Tutarı</label>
                                <input class="form-control" type="number" name="payment">
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Ödemeyi Yap</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div>
    </div><!-- /.modal -->
    <script type="text/javascript">
        var sıfırMı = document.getElementById('kalanTutar').innerHTML;
        if(sıfırMı == 0){
            document.getElementById('OdemeModalButon').setAttribute('disabled','');
            document.getElementById('OdemeModalButon').innerHTML = 'Ödeme Yapılamaz !'
        }
        console.log(document.getElementById('kalanTutar').innerHTML);
    </script>
@endsection
