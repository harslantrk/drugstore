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
    Reklamlar
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/page-in"><i class="fa fa-dashboard active"></i> Sayfa İçi</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<a href="/admin/page-in-create" class="button btn-sm btn-primary"><i class="fa fa-plus"> Yeni Sayfa İçi Reklamı</i></a>
		</div>
		<div class="box-header">
		  <h3 class="box-title">Sayfa İçi Reklam Listesi</h3>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
		  <table id="pagein_table" class="table table-bordered table-striped table-hover">
		    <thead>
		    <tr>
		      <th style="width: 5%">#</th>
		      <th style="width: 15%">Reklam İsmi</th>
		      <th style="width: 10%">Sayfa</th>
		      <th style="width: 10%">Reklam Başlığı</th>
		      <th style="width: 30%">Reklam İçeriği</th>
		      <th style="width: 10%">Durumu</th>
		      <th style="width: 15%">İşlemler</th>
		    </tr>
		    </thead>
		    <tbody>
		    <?php 
		    	$count = 0;
		    ?>
		    @foreach($advertise as $row)
		    <?php 
		    	$count++;
		    ?>
		    <tr>
		      <td>{{$count}}.</td>
		      <td>{{$row->name}}</td>
		      <td>{{$row->page_id}}</td>
		      <td>{{$row->title}}</td>
		      <td>{{$row->content}}</td>
		      <td>{{($row->display == 1) ? "Göster" : "Gösterme"}}</td>
		      <td>
		      	<a href="/admin/page-in-edit/{{$row->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>
				<a class="button btn btn-danger" onclick="deleteApprove('/admin/page-in-delete/{{$row->id}}')"><i class="fa fa-trash"> Sil</i></a>
		      </td>
		    </tr>
		    @endforeach
		    </tbody>
		  </table>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection