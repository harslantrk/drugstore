@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- ALERT -->
        @if (Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_notification.message') }}
            </div>
    @endif
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                HASTALAR
                <small>Hasta Listesi</small>
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
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hastalar</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="hastalar_table" class="table table-bordered table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th class="col-xs-1 col-sm-1">Sıra</th>
                                    <th>Ad - Soyad</th>
                                    <th>Telefon</th>
                                    <th>Sosyal Güvence</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;?>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td class="col-xs-1 col-sm-1">{{$no}}</td>
                                        <td>{{$patient->name}}</td>
                                        <td>{{$patient->phone}}</td>
                                        <td>{{$patient->social_insurance}}</td>
                                        <td>
                                            <a href="/admin/bez/reports/show/{{$patient->id}}" class="button btn btn-primary" title="Görüntüle"><i class="fa fa-search"></i></a>
                                            <a id="{{ $patient->id }}" href="#" class="button btn btn-success report" title="Rapor Ekle" data-toggle="modal" data-target="#modalYeniRapor"><i class="fa fa-file-excel-o"></i></a>
                                            <?php $sayac = 1;?>
                                           @foreach($reports as $report)
                                                @if($report->patient_id == $patient->id and $sayac == 1 )
                                                    <a name="{{ $patient->id }}" href="#" class="button btn btn-warning receipt receteGetir" title="Reçete Ekle" data-toggle="modal" data-target="#modalYeniRecete"><i class="fa fa-file-excel-o"></i></a>
                                                    <?php $sayac++;?>
                                                @endif
                                           @endforeach
                                            <?php $sayac2 = 1;?>
                                            @foreach($receipts as $receipt)
                                                @if($receipt->patient_id == $patient->id and $sayac2 ==1)
                                                    <a id="{{ $patient->id }}" href="#" class="button btn btn-danger odeme" title="Ödeme Yap" data-toggle="modal" data-target="#modalYeniOdeme"><i class="fa fa-try"></i></a>
                                                    <?php $sayac2++;?>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <?php $no++;?>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
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
    </div>
    <!-- /.modal -->
    <!-- Reçete Ekleme Modeli -->
    <div class="modal fade" id="modalYeniRecete" tabindex="-1" role="dialog">
    </div>
    <!-- /.modal -->
    <!-- Ödeme Yapma Modeli -->
    <div class="modal fade" id="modalYeniOdeme" tabindex="-1" role="dialog">
    </div><!-- /.modal -->
    <script type="text/javascript">
        $('.report').click(function () {
            document.getElementById('patient_id').value = $(this).attr('id');
            console.log($(this).attr('id'));
        });
        $('.receteGetir').click(function () {
            var receipt_id = $(this).attr('name');
            console.log($(this).attr('name'));
            $.ajax({
                url: '/admin/bez/reports/reportGetir',
                type: 'POST',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                cache: false,
                data: {receipt_id: receipt_id},
                success: function(data){
                    document.getElementById('modalYeniRecete').innerHTML=data;
                },
                error: function(jqXHR, textStatus, err){}
            });
        });
        $('.odeme').click(function () {
            var patient_id = $(this).attr('id');
            console.log(patient_id);
            $.ajax({
                url: '/admin/bez/reports/PaymentGetir',
                type: 'POST',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                cache: false,
                data: {patient_id: patient_id},
                success: function(data){
                    document.getElementById('modalYeniOdeme').innerHTML=data;
                },
                error: function(jqXHR, textStatus, err){}
            });
        });

        function hesaplama() {
            var sum = document.getElementById('sum');
            var quantity = document.getElementById('quantity');
            var unit_price = document.getElementById('unit_price');
            var total = document.getElementById('total');

            sum.value =quantity.value * unit_price.value;
            total.value = sum.value * 118/100;
            //console.log(document.getElementById('quantity').value * document.getElementById('unit_price').value);
        }
    </script>
@endsection