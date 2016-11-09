@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Üyeler
    <small>Üyelik Güncelleme</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/users"><i class="fa fa-dashboard active"></i> Üyeler</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="col-lg-12" style="margin:20px;"></div>
	<div class="row">
		<form method="post">
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>İsim Soyisim <small style="color:red;">(Zorunlu)</small></strong></div>
			<div class="col-lg-8"><input type="text" name="name" class="form-control" value="{{$users->name}}" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>E-Posta <small style="color:red;">(Zorunlu)</small></strong></div>
			<div class="col-lg-8"><input type="email" name="mail" class="form-control" value="{{$users->email}}" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>Şifre <small style="color:red;">(Zorunlu)</small></strong></div>
			<div class="col-lg-8"><input type="password" name="password" class="form-control" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-6">
				<input type="hidden" name="id" value="{{$users->id}}"/>
			</div>
			<div class="col-lg-6">
				<a href="/admin/user-update" class="button btn btn-primary">Güncelle</a>
				<a href="/admin/users" class="button btn btn-warning">Geri</a>
			</div>
		</div>
		</form>
                <div class="kv-main"></div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
<script>
    setTimeout(function(){galleryImport("users","{{$users->id}}");},1);
</script>
@endsection