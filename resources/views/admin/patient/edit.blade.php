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
                <small>Hasta Düzenle</small>
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
                <div class="col-md-12">
                    <form method="post" action="/admin/patient/update">
                        {!! csrf_field() !!}
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Hasta Bilgileri</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Adı - Soyadı
                                    </div>
                                    <input class="form-control" type="text" name="name" value="{{$patient->name}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        TC Kimlik No
                                    </div>
                                    <input class="form-control" type="text" name="tc_no" data-inputmask='"mask": "99999999999"' data-mask placeholder="Tc Kimlik No" value="{{$patient->tc_no}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Telefon
                                    </div>
                                    <input class="form-control" type="text" name="phone" data-inputmask='"mask": "09999999999"' data-mask value="{{$patient->phone}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Doğum Tarihi
                                    </div>
                                    <input class="form-control" type="text" name="birthdate" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Sosyal Güvence
                                    </div>
                                    <select class="form-control select2" name="social_insurance" style="width: 100%;">
                                        <option @if($patient->social_insurance == 'SSK Çalışan') selected="selected" @endif>SSK Çalışan</option>
                                        <option @if($patient->social_insurance == 'SSK Emekli') selected="selected" @endif>SSK Emekli</option>
                                        <option @if($patient->social_insurance == 'BAĞKUR Çalışan') selected="selected" @endif>BAĞKUR Çalışan</option>
                                        <option @if($patient->social_insurance == 'BAĞKUR Emekli') selected="selected" @endif>BAĞKUR Emekli</option>
                                        <option @if($patient->social_insurance == 'EMEKLİ SANDIĞI (657 4/A) Çalışan') selected="selected" @endif>EMEKLİ SANDIĞI (657 4/A) Çalışan</option>
                                        <option @if($patient->social_insurance == 'EMEKLİ SANDIĞI Emekli') selected="selected" @endif>EMEKLİ SANDIĞI Emekli</option>
                                        <option @if($patient->social_insurance == 'GSS (18 YAŞ ALTI, 1005 GAZİ (KIBRIS-KORE),İŞSİZLİK ÖD.60/G,60/D)') selected="selected" @endif>GSS (18 YAŞ ALTI, 1005 GAZİ (KIBRIS-KORE),İŞSİZLİK ÖD.60/G,60/D)</option>
                                    </select>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Rapor Türü
                                    </div>
                                    <?php $sayac=0; ?>
                                    @foreach($reports_type as $report_type)
                                        @foreach($this_report_type as $key=>$json)
                                            @if($report_type->id == $key)
                                                <?php $sayac++; ?>
                                                <input type="checkbox" name="report_type[{{$report_type->id}}]" class="minimal" checked> {{ $report_type->report_type }}
                                            @endif
                                        @endforeach
                                        @if($sayac==0)
                                            <input type="checkbox" name="report_type[{{$report_type->id}}]" class="minimal"> {{ $report_type->report_type }}
                                        @endif
                                            <?php $sayac=0; ?>
                                    @endforeach
                                </div>
                                <div class="box-header with-border">
                                    <h3 class="box-title text-danger">Adres Bilgileri</h3>
                                </div><!-- /.box-header -->
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Sokak / Cadde
                                    </div>
                                    <input class="form-control" type="text" name="street" value="{{$patient->street}}">
                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Mahalle
                                    </div>
                                    <input class="form-control" type="text" name="district" value="{{$patient->district}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Daire No
                                    </div>
                                    <input class="form-control" type="number" name="apartment" value="{{$patient->apartment}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Posta Kodu
                                    </div>
                                    <input class="form-control" type="number" name="post_code" value="{{$patient->post_code}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Şehir
                                    </div>
                                    <input class="form-control" type="text" name="city" value="{{$patient->city}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Okul Adı
                                    </div>
                                    <input class="form-control" type="text" name="school_name" value="{{$patient->school_name}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Sınıf
                                    </div>
                                    <input class="form-control" type="text" name="class" value="{{$patient->class}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Eğitim Şekli
                                    </div>
                                    <input class="form-control" type="text" name="educational" value="{{$patient->educational}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Detay
                                    </div>
                                    <textarea class="form-control" name="detail" rows="5" placeholder="Detay Bilgileri..." style="resize: none;">{{$patient->detail}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="kv-main"></div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-header with-border">
                                <h3 class="box-title text-danger">Veli Bilgileri</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Veli TC Kimlik No
                                    </div>
                                    <input class="form-control" type="text" name="parent_tc" data-inputmask='"mask": "99999999999"' data-mask placeholder="Veli Tc Kimlik No" value="{{$patient->parent_tc}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Veli Adı
                                    </div>
                                    <input class="form-control" type="text" name="parent_name" value="{{$patient->parent_name}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Veli Telefon
                                    </div>
                                    <input class="form-control" type="text" name="parent_phone" data-inputmask='"mask": "09999999999"' data-mask value="{{$patient->parent_phone}}">
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-addon">
                                        Yakınlık Derecesi
                                    </div>
                                    <select class="form-control select2" name="parent_kinship" style="width: 100%;">
                                        <option @if($patient->parent_kinship == 'Eşi') selected="selected" @endif>Eşi</option>
                                        <option @if($patient->parent_kinship == 'Anne') selected="selected" @endif>Anne</option>
                                        <option @if($patient->parent_kinship == 'Baba') selected="selected" @endif>Baba</option>
                                        <option @if($patient->parent_kinship == 'Çocuğu') selected="selected" @endif>Çocuğu</option>
                                        <option @if($patient->parent_kinship == 'Diğer') selected="selected" @endif>Diğer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="id" value="{{$patient->id}}">
                                <div class="pull-right">
                                    <a href="{{URL::previous()}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> İptal</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Güncelle</button>
                                </div>
                            </div><!-- /.box-footer -->

                        </div><!-- /. box -->
                    </form>
                </div><!-- /.col -->
            </div><!-- ./row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection