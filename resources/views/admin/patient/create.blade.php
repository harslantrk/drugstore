@extends('admin.master')

@section('content')
    <style type="text/css">
        .input-group-addon {
            min-width: 130px;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                HASTALAR
                <small>Hasta Ekle</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
                <li><a href="/admin/patient"><i class="fa fa-dashboard"></i> Hastalar</a></li>
                <li><i class="fa fa-dashboard active"></i> Yeni Hasta</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form method="post" action="/admin/patient/save">
                    {!! csrf_field() !!}
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Hasta Bilgileri</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">

                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Adı - Soyadı
                                    </div>
                                    <input class="form-control" type="text" name="name" placeholder="Hasta Adı Soyadı">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        TC Kimlik No
                                    </div>
                                    <input class="form-control" type="text" name="tc_no" data-inputmask='"mask": "99999999999"' data-mask placeholder="Tc Kimlik No">
                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Telefon
                                    </div>
                                    <input class="form-control" type="text" name="phone" data-inputmask='"mask": "09999999999"' data-mask placeholder="Telefon Numarası">
                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Doğum Tarihi
                                    </div>
                                    <input class="form-control" type="text" name="birthdate" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask placeholder="Doğum Tarihi">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Sosyal Güvence
                                    </div>
                                    <select class="form-control select2" name="social_insurance" style="width: 100%;">
                                        <option selected="selected">SSK Çalışan</option>
                                        <option>SSK Emekli</option>
                                        <option>BAĞKUR Çalışan</option>
                                        <option>BAĞKUR Emekli</option>
                                        <option>EMEKLİ SANDIĞI (657 4/A) Çalışan</option>
                                        <option>EMEKLİ SANDIĞI Emekli</option>
                                        <option>GSS (18 YAŞ ALTI, 1005 GAZİ (KIBRIS-KORE),İŞSİZLİK ÖD.60/G,60/D)</option>
                                    </select>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Okul Adı
                                    </div>
                                    <input class="form-control" type="text" name="school_name" placeholder="">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Sınıf
                                    </div>
                                    <input class="form-control" type="text" name="class">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Eğitim Şekli
                                    </div>
                                    <input class="form-control" type="text" name="educational">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Rapor Türü
                                    </div>
                                    @if($reports_type)
                                        @foreach($reports_type as $report)
                                            <input type="checkbox" name="report_type[{{$report->id}}]" class="minimal"> {{$report->report_type}}
                                            @endforeach
                                    @endif
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /. box -->
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title text-danger">Adres Bilgileri</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Sokak / Cadde
                                    </div>
                                    <input class="form-control" type="text" name="street" placeholder="Sokak/Cadde Adı">
                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Mahalle
                                    </div>
                                    <input class="form-control" type="text" name="district" placeholder="Mahalle">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Daire No
                                    </div>
                                    <input class="form-control" type="number" name="apartment" placeholder="Daire No">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Posta Kodu
                                    </div>
                                    <input class="form-control" type="number" name="post_code" placeholder="Posta Kodu">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Şehir
                                    </div>
                                    <input class="form-control" type="text" name="city" placeholder="Şehir">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Detay
                                    </div>
                                    <textarea class="form-control" name="detail" rows="5" placeholder="Detay Bilgileri..." style="resize: none;"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="kv-main"></div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /. box -->
                    </div><!-- /.col -->
                    <div class="col-sm-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title text-danger">Veli Bilgileri</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Veli TC Kimlik No
                                    </div>
                                    <input class="form-control" type="text" name="parent_tc" data-inputmask='"mask": "99999999999"' data-mask placeholder="Veli Tc Kimlik No">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Veli Adı
                                    </div>
                                    <input class="form-control" type="text" name="parent_name">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Veli Telefon
                                    </div>
                                    <input class="form-control" type="text" name="parent_phone" data-inputmask='"mask": "09999999999"' data-mask>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Yakınlık Derecesi
                                    </div>
                                    <select class="form-control select2" name="parent_kinship" style="width: 100%;">
                                        <option selected="selected">Eşi</option>
                                        <option>Anne</option>
                                        <option>Baba</option>
                                        <option>Çocuğu</option>
                                        <option>Diğer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="col-md-12">
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="/admin/patient/" class="btn btn-default"><i class="fa fa-pencil"></i> İptal</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-envelope-o"></i> Kayıt Et</button>
                            </div>
                        </div><!-- /.box-footer -->
                    </div>
                </form>
            </div><!-- ./row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection