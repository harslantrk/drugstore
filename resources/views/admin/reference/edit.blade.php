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
    REFERANSLAR
    <small>Referans Ekle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
    <li><a href="/admin/reference"><i class="fa fa-dashboard"></i> Referanslar</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="/admin/reference/update" enctype="multipart/form-data">
              {!! csrf_field() !!}

              <input type="hidden" name="id" value="{{ $reference->id }}">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Referans Ekle</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-2">
                  <img src="{{ $reference->image }}" class="img-responsive">
                </div>
                <div class="col-md-10">
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Referans Resmi
                    </div>
                   <input class="form-control" type="file" name="image" value="{{ $reference->image }}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Referans Adı
                    </div>
                   <input class="form-control" type="text" name="name" value="{{ $reference->name }}">
                  </div>
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Referans Linki
                    </div>
                   <input class="form-control" type="text" name="link" value="{{ $reference->link }}">
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
                  <div class="input-group form-group">
                    <div class="input-group-addon">
                      Öncelik
                    </div>
                   <input class="form-control" type="number" name="priority" value="{{ $reference->priority }}">
                  </div>
                </div>
                  
                  
                  
                  <!--<div class="form-group">
                    <textarea placeholder="Lütfen Yorumu oluşturunuz..." name="comment" class="form-control product-text" style="height: 300px">
                        
                    </textarea>
                  </div>-->
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
                    <a href="/admin/reference" class="btn btn-default"><i class="fa fa-pencil"></i> İptal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Güncelle</button>
                  </div>
                </div><!-- /.box-footer -->

              </div><!-- /. box -->
              </form>
            </div><!-- /.col -->
    </div><!-- ./row -->  
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection