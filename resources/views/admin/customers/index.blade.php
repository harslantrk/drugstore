@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Müşteriler
    <small>Müşteri Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/users"><i class="fa fa-dashboard active"></i> Üyeler</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-12">
				<a href="/admin/customerCreate" class="button btn btn-primary">Yeni Müşteri</a>
			</div>
			<div class="col-lg-12" style="margin:20px;"></div>
			<div class="col-lg-12">
			<div class="box box-primary" style="padding: 1%;">
			<div class="box-header">
				<h3 class="box-title">Müşteriler</h3>
			</div>
				<table class="table table-hover" id="delegationtable">
					<thead>
						<th>#</th>
						<th>İsim Soyisim</th>
						<th>Email</th>
						<th>Telefon Numarası</th>
						<th>GSM</th>
						<th>Adres</th>
						<th>Şirket Adı</th>
						<th>Şirket Telefonu</th>
						<th>Sisteme Eklenme Tarihi</th>
						<th>İşlemler</th>
					</thead>
					<tbody>
					<?php $sira=1; ?>
					@foreach($data as $val)
						<tr>
							<td>{{$sira}}</td>
							<td>{{$val->name.' '.$val->surname}}</td>
							<td>{{$val->email}}</td>
							<td>{{$val->phone}}</td>
							<td>{{$val->gsm}}</td>
							<td>{{$val->adres}}</td>
							<td>{{$val->companyName}}</td>
							<td>{{$val->companyPhone}}</td>
							<td>{{$val->created_at}}</td>
							<td>
							 <a href="/admin/customer_edit/{{$val->id}}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                             <a href="/admin/customerDelete?id={{$val->id}}" class="btn btn-danger"><i class="fa fa-trash"></i>
                             </a></td>
						</tr>
						<?php $sira++; ?>
					@endforeach	
					</tbody>
				</table>
			</div>
			</div>
			
		</div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection