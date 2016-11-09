@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Üyeler
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/users"><i class="fa fa-dashboard active"></i> Üyeler</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Yeni Üye Ekleme</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="/admin/users/save">
		{!! csrf_field() !!}
		  <div class="box-body">
		    <div class="form-group">
              <label for="exampleInputFile">Profil Resmi</label>
              <input type="file" id="exampleInputFile" name="picture">
            </div>
		    <div class="form-group">
		      <label for="exampleInputName1">İsim Soyisim  <small style="color:red;">(Zorunlu)</small></label>
		      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="İsim soyisim giriniz!" required>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Kullanıcı Adı</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="username" placeholder="Kullanıcı adı giriniz!">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputEmail1">E-posta  <small style="color:red;">(Zorunlu)</small></label>
		      <input type="email" class="form-control" id="exampleInputEmail1" name="mail" placeholder="E-Posta adresi giriniz!" required>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputPassword1">Şifre <small style="color:red;">(Zorunlu)</small></label>
		      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Şifre giriniz!" required>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Telefon</label>
		      <input type="text" class="form-control phone_mask" id="exampleInputName1" name="phone" placeholder="Telefon giriniz!">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Web Sitesi</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="web_site" placeholder="Web sitesi giriniz!">
		    </div>
		  	<div class="form-group">
		      <label>Adres</label>
		      <textarea name="address" class="form-control" rows="3" placeholder="Adres ..."></textarea>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Facebook</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="facebook" placeholder="Facebook Linkini Giriniz!">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Twitter</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="twitter" placeholder="Twitter Linkini Giriniz!">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">İnstagram</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="instagram" placeholder="İnstagram Linkini Giriniz!">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Google Plus</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="google_plus" placeholder="Google Plus Linkini Giriniz!">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Youtube</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="youtube" placeholder="Youtube Linkini Giriniz!">
		    </div>
		  </div><!-- /.box-body -->

		  <div class="box-footer">
		    <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Kaydet</button>
			<a href="/admin/users" class="button btn btn-warning"><i class="fa fa-undo"></i> Geri</a> 
		  </div>
		</form>
	</div><!-- /.box -->

</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection