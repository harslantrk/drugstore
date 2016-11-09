@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tüm Öğrenciler
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li class="active">Öğrenci Listesi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box">
      <div class="box-header">
        <h3 class="box-title"></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        {{ $path }}
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!--/.col (left) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop()