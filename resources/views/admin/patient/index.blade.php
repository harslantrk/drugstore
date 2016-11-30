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
                <li><a href="/admin/patient"><i class="fa fa-dashboard active"></i> Hastalar</a></li>
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
                                    <th>Sıra</th>
                                    <th>Ad - Soyad</th>
                                    <th>TC - No</th>
                                    <th>Telefon</th>
                                    <th>Adres</th>
                                    <th>Sosyal Güvence</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;?>
                                @foreach($patients as $patient)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$patient->name}}</td>
                                            <td>{{$patient->tc_no}}</td>
                                            <td>{{$patient->phone}}</td>
                                            <td>{{$patient->street.' '.$patient->apartment.' '.$patient->district.' / '.$patient->city}}</td>
                                            <td>{{$patient->social_insurance}}</td>
                                            <td>
                                                @if($deleg['u']==1)<a href="/admin/patient/edit/{{$patient->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>@endif
                                                @if($deleg['d']==1)<a onclick="deleteApprove('/admin/patient/delete/{{$patient->id}}')" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>@endif

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
@endsection