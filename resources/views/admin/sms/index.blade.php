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
                SMS
                <small>SMS Listesi</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li><a href="/admin/sms"><i class="fa fa-dashboard active"></i> Sms</a></li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if($deleg['a']==1)
                    <div class="col-lg-12">
                        <a href="/admin/sms/create" class="button btn btn-primary">Hasta Ekle</a>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="box">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs text-bold">
                                <li class="active"><a href="#secerek_gonder" data-toggle="tab" aria-expanded="true">Seçerek Gönder</a></li>
                                <li class=""><a href="#elle_gonder" data-toggle="tab" aria-expanded="false">Elle Gönder</a></li>
                                <li class=""><a href="#tum_borc" data-toggle="tab" aria-expanded="false">Tüm Borçlulara Gönder</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="secerek_gonder">
                                    <form class="form-horizontal" method="post" action="{{URL::to('/admin/sms/create')}}">
                                        {!! csrf_field() !!}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Kalan Sms :</label>
                                                <span class="label label-danger"> 5000 Adet</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3"></div>
                                                <div class="callout callout-danger col-sm-6 text-center">
                                                    <strong>Bu Alandan Seçtiğiniz Kişilere SMS Gönderebilirsiniz.</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Kalan Karakter :</label>
                                                <label class="control-label" id="kalan_karakter">160</label>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Mesajınız :</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" onkeyup="sms_gonder_elle()" id="sms_mesaj_secerek" name="sms_detail_secerek" rows="5" style="resize: none;">Hasta bezi tarihiniz sona ermiştir. Bez Reçetenizi yazdırıp eczaneye geliniz.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" id="btn_secerek_gonder" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Sms Gönder</button>
                                            </div>
                                        </div>
                                    <!-- Post -->
                                    <div class="post">
                                        <table id="hastalar_table" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>Sıra</th>
                                                <th>Hasta Seç</th>
                                                <th>Ad - Soyad</th>
                                                <th>Hasta Telefon</th>
                                                <th>Veli Seç</th>
                                                <th>Veli Adı</th>
                                                <th>Yakınlık Derecesi</th>
                                                <th>Veli Telefon</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1;?>
                                            @foreach($patients as $patient)
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" name="hasta_id[{{$patient->id}}]" class="minimal">
                                                        </label>
                                                    </td>
                                                    <td>{{$patient->name}}</td>
                                                    <td>{{$patient->phone}} <input type="hidden" name="hasta_tel[{{ $patient->id }}]" value="{{ $patient->phone }}"></td>
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" name="veli_id[{{$patient->id}}]" class="minimal">
                                                        </label>
                                                    </td>
                                                    <td>{{$patient->parent_name}}</td>
                                                    <td>{{$patient->parent_kinship}}</td>
                                                    <td>{{$patient->parent_phone}} <input type="hidden" name="veli_tel[{{ $patient->id }}]" value="{{ $patient->parent_phone }}"></td>
                                                </tr>
                                                <?php $no++;?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </form>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="elle_gonder">
                                    <form class="form-horizontal" method="post" action="{{URL::to('/admin/sms/elle')}}">
                                        {!! csrf_field() !!}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Kalan Sms :</label>
                                                <span class="label label-danger"> 5000 Adet</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3"></div>
                                                <div class="callout callout-danger col-sm-6 text-center">
                                                    <strong>Bu Alandan Numarasını Yazdığınız Kişiye Sms Gönderebilirsiniz !</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Kalan Karakter :</label>
                                                <label class="control-label" id="kalan_karakter_2">160</label>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Telefon Numarası :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="elle_phone" id="elle_phone" data-inputmask='"mask": "09999999999"' data-mask>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Mesajınız :</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" onkeyup="sms_gonder_elle_2()" id="sms_mesaj_elle" name="sms_detail_elle" rows="5" style="resize: none;">Hasta bezi tarihiniz sona ermiştir. Bez Reçetenizi yazdırıp eczaneye geliniz.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" id="btn_elle_gonder" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Sms Gönder</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tum_borc">
                                    <form class="form-horizontal" method="post" action="{{URL::to('/admin/sms/create')}}">
                                        {!! csrf_field() !!}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Kalan Sms :</label>
                                                <span class="label label-danger"> 5000 Adet</span>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3"></div>
                                                <div class="callout callout-danger col-sm-6 text-center">
                                                    <strong>Bu Alandan Sistemde Borcu Bulunan Herkese SMS Gönderebilirsiniz.</strong>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Kalan Karakter :</label>
                                                <label class="control-label" id="kalan_karakter_3">160</label>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Mesajınız :</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" onkeyup="sms_gonder_elle()" id="sms_tum_borc" name="sms_detail_tum_borc" rows="5" style="resize: none;">Hasta bezi tarihiniz sona ermiştir. Bez Reçetenizi yazdırıp eczaneye geliniz.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" id="btn_tum_borc" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Sms Gönder</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection