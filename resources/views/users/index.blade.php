@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Üyeler
    <small>Üye Listesi</small>
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
				<a href="/admin/user-create" class="button btn btn-primary">Yeni Üye</a>
			</div>
			<div class="col-lg-12" style="margin:20px;"></div>
			<div class="col-lg-12">
				<div class="col-lg-2">
					<strong>#</strong>
				</div>
				<div class="col-lg-3">
					<strong>üye ismi</strong>
				</div>
				<div class="col-lg-3">
					<strong>email</strong>
				</div>
				<div class="col-lg-4">
					<strong>işlemler</strong>
				</div>
			</div>
			@foreach($users as $user)
			<div class="col-lg-12">
				<div class="col-lg-2">
					{{$user->id}}
				</div>
				<div class="col-lg-3">
					{{$user->name}}
				</div>
				<div class="col-lg-3">
					{{$user->email}}
				</div>
				<div class="col-lg-4">
					<a href="/admin/user-edit/{{$user->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>
					<a href="/admin/user-delete/{{$user->id}}" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection