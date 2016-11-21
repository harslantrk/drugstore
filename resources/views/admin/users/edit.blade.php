@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Üyeler</h1>
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
		  <h3 class="box-title">Üyelik Güncelleme</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" action="/admin/users/resizeImagePost" method="post" enctype="multipart/form-data">
			{!! csrf_field() !!}
				<div class="box-body">
					<div class="col-sm-3 col-xs-6">
						<div class="form-group">
							<input class="btn" type="file" name="image" id="image">
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-success">Resim Yükle</button>
							</div>
						</div>
					</div>
					<div class="col-sm-9 col-xs-6">
						@if(Auth::user()->picture)
							<img style="margin: 0px;" class="profile-user-img img-responsive" src="{{URL::to(Auth::user()->picture)}}" alt="User profile picture">
						@endif
					</div>
				</div>
			<input type="hidden" name="id" value="{{$users->id}}"/>
		</form>
			  <form role="form" method="post" action="/admin/users/update">
				  {!! csrf_field() !!}
				  <div class="box-body">
		    <div class="form-group">
		      <label for="exampleInputName1">İsim Soyisim  <small style="color:red;">(Zorunlu)</small></label>
		      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="İsim soyisim giriniz!" value="{{$users->name}}" required>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Kullanıcı Adı</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="username" placeholder="Kullanıcı adı giriniz!" value="{{$users->username}}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputEmail1">E-posta  <small style="color:red;">(Zorunlu)</small></label>
		      <input type="email" class="form-control" id="exampleInputEmail1" name="mail" placeholder="E-Posta adresi giriniz!" value="{{$users->email}}" required>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputPassword1">Şifre <small style="color:red;">(Zorunlu)</small></label>
		      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Şifre giriniz!" required>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Telefon</label>
		      <input type="text" class="form-control phone_mask" id="exampleInputName1" name="phone" placeholder="Telefon giriniz!" value="{{$users->phone}}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Web Sitesi</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="web_site" placeholder="Web sitesi giriniz!" value="{{$users->web_site}}">
		    </div>
		  	<div class="form-group">
		      <label>Adres</label>
		      <textarea name="address" class="form-control" rows="3" placeholder="Adres ...">{{$users->address}}</textarea>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Facebook</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="facebook" placeholder="Facebook Linkini Giriniz!" value="{{$social->facebook}}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Twitter</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="twitter" placeholder="Twitter Linkini Giriniz!" value="{{$social->twitter}}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">İnstagram</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="instagram" placeholder="İnstagram Linkini Giriniz!" value="{{$social->instagram}}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Google Plus</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="google_plus" placeholder="Google Plus Linkini Giriniz!" value="{{$social->google_plus}}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Youtube</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="youtube" placeholder="Youtube Linkini Giriniz!" value="{{$social->youtube}}">
		    </div>
		  </div><!-- /.box-body -->

		  <div class="box-footer">
		    <input type="hidden" name="id" value="{{$users->id}}"/>
		    <button type="submit" class="btn btn-primary"><i class="fa fa-wrench"></i> Güncelle</button>
			<a href="/admin/users" class="button btn btn-warning"><i class="fa fa-undo"></i> Geri</a>
		  </div>
		</form>
	</div><!-- /.box -->
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection