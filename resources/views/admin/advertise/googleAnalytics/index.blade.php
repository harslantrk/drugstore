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
    Reklam
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/google-analytics"><i class="fa fa-dashboard active"></i> Google Analytics</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- general form elements -->
	<div class="box box-primary">
		<!-- form start -->
		<form role="form" method="post" action="/admin/advertise-analytics">
		{!! csrf_field() !!}
		  <div class="box-body">
		  	<div class="form-group">
		      <label>Google Analytics Kodu</label>
		      <textarea name="analytics_code" class="form-control" rows="3" placeholder="Google Analytics Kodu ...">{{isset($settings->analytics_code) ? $settings->analytics_code : '' }}</textarea>
		    </div>
		  </div><!-- /.box-body -->
		  <div class="box-footer">
		    <input type="hidden" name="id" value="{{isset($settings->id) ? $settings->id : 'null' }}"/>
		    <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Kaydet</button>
		  </div>
		</form>
	</div><!-- /.box -->

</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection