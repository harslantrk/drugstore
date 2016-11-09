@extends('admin.master')

@section('content')
<style type="text/css">
  .input-group-addon {
    min-width: 130px;
  }
</style>
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
    HİZMETLER
    <small>Hizmet Ekle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
    <li><a href="/admin/services"><i class="fa fa-dashboard"></i> Hizmetler</a></li>
    <li><a href="/admin/services/create"><i class="fa fa-dashboard active"></i> Yeni</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="/admin/services/update">
              {!! csrf_field() !!}
              <input type="hidden" name="id" value="{{$services->id}}">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Yeni Hizmet</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Başlık Ekle
                    </div>
                   <input class="form-control" type="text" name="title" value="{{$services->title}}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Kısa Açıklama
                    </div>
                   <input class="form-control" type="text" name="short_content" value="{{$services->short_content}}">
                  </div>

                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      İcon Seç
                    </div>
                   <input class="form-control" type="text" name="icons" value="{{$services->icons}}">
                  </div>

                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Açıklama
                    </div>
                   <input class="form-control" type="text" name="description" value="{{$services->description}}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Anahtar Kelimeler
                    </div>
                   <input class="form-control" type="text" name="keywords" placeholder="Aralara Virgül Koyunuz" value="{{$services->keywords}}">
                  </div>
                  
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Öncelik
                    </div>
                   <input class="form-control" type="text" name="priority" value="{{$services->priority}}">
                  </div>
                  
                  <div class="form-group">
                    <textarea placeholder="Lütfen Hizmetinizi oluşturunuz..." name="content" class="form-control product-text" style="height: 300px">
                         {{$services->content}}
                    </textarea>
                  </div>
                  <!--<div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>-->
                  <div class="form-group">
                      <div class="kv-main"></div>
                  </div>
                
                </div><!-- /.box-body -->
                
              
                <div class="box-footer">
                  <div class="pull-right">
                    <a href="/admin/services" class="btn btn-default"><i class="fa fa-pencil"></i> İptal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
                  </div>
                </div><!-- /.box-footer -->

              </div><!-- /. box -->
              </form>
            </div><!-- /.col -->
    </div><!-- ./row -->  
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection