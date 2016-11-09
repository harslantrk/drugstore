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
    Slider Yönetimi
    <small>Slider Düzenle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
    <li><a href="/admin/slider"><i class="fa fa-dashboard"></i> Slider Yönetimi</a></li>

  </ol>
</section>
<!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="/admin/slider/update" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Slider Düzenle</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <img src="{{$slider->image}}" class="img-responsive">
                <br>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Slider Resmi
                    </div>
                   <input class="form-control" type="file" name="image" value="{{$slider->image}}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Slider Başlık
                    </div>
                   <input class="form-control" type="text" name="title" value="{{$slider->title}}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Slider Alt Başlık
                    </div>
                   <input class="form-control" type="text" name="subtitle"  value="{{$slider->subtitle}}">
                  </div>

                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Slider Link
                    </div>
                   <input class="form-control" type="text" name="link"  value="{{$slider->link}}">
                  </div>

                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Öncelik
                    </div>
                   <input class="form-control" type="number" name="priority"  value="{{$slider->priority}}">
                  </div>

                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Durumu
                    </div>
                   <select name="status" class="form-control">
                     <option value="1" class="btn btn-success">Etkin</option>
                     <option value="0" class="btn btn-danger">Etkin Değil</option>
                   </select>
                  </div>
                  <div class="form-group">
                      <div class="kv-main"></div>
                  </div>
                
                </div><!-- /.box-body -->
                
              
                <div class="box-footer">
                  <div class="pull-right">
                    <a href="/admin/slider" class="btn btn-default"><i class="fa fa-pencil"></i> İptal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Oluştur</button>
                  </div>
                </div><!-- /.box-footer -->

              </div><!-- /. box -->
              </form>
            </div><!-- /.col -->
    </div><!-- ./row -->  
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection