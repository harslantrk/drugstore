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
  <h1>Ayarlar</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/settings"><i class="fa fa-dashboard active"></i> Ayarlar</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- general form elements -->
	<div class="box box-primary">
		<!-- form start -->
		<form role="form" method="post" action="/admin/settings/save" enctype="multipart/form-data">
		{!! csrf_field() !!}
		  <div class="box-body">
		    <div class="form-group">
              <label for="exampleInputFile">Site İkonu</label>
              <input type="file" id="exampleInputFile" name="icon">
              <img src="{{isset($settings->icon) ? $settings->icon : '' }}">
            </div>
		    <div class="form-group">
              <label for="exampleInputFile">Site Logosu</label>
              <input type="file" id="exampleInputFile" name="logo">
              <img src="{{isset($settings->logo) ? $settings->logo : '' }}" class="img-responsive" width="250" height="100">
            </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Site İsmi</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Site İsmini Giriniz!" value="{{isset($settings->name) ? $settings->name : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Web Site</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="website" placeholder="Web Site İsmini Giriniz!" value="{{isset($settings->web_site) ? $settings->web_site : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">E-Posta</label>
		      <input type="mail" class="form-control" id="exampleInputName1" name="email" placeholder="E-Posta Giriniz!" value="{{isset($settings->email) ? $settings->email : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Telefon</label>
		      <input type="text" class="form-control phone_mask" id="exampleInputName1" name="phone" placeholder="Telefon Giriniz!" value="{{isset($settings->phone) ? $settings->phone : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Faks</label>
		      <input type="text" class="form-control phone_mask" id="exampleInputName1" name="fax" placeholder="Faks Giriniz!" value="{{isset($settings->fax) ? $settings->fax : '' }}">
		    </div>
		  	<div class="form-group">
		      <label>Adres</label>
		      <textarea name="address" class="form-control" rows="3" placeholder="Adres ...">{{isset($settings->address) ? $settings->address : '' }}</textarea>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Facebook</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="facebook" placeholder="Facebook Linkini Giriniz!" value="{{isset($settings->facebook) ? $settings->facebook : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Twitter</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="twitter" placeholder="Twitter Linkini Giriniz!" value="{{isset($settings->twitter) ? $settings->twitter : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">İnstagram</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="instagram" placeholder="İnstagram Linkini Giriniz!" value="{{isset($settings->instagram) ? $settings->instagram : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Google Plus</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="gplus" placeholder="Google Plus Linkini Giriniz!" value="{{isset($settings->google_plus) ? $settings->google_plus : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Youtube</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="youtube" placeholder="Youtube Linkini Giriniz!" value="{{isset($settings->youtube) ? $settings->youtube : '' }}">
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Enlem</label>
		      <input class="form-control" value="{{$settings->latitude}}" type="text" name="latitude" id="lat" readonly>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Boylam</label>
		      <input class="form-control" value="{{$settings->longitude}}" type="text" name ="longitude" id="lng" readonly>
		    </div>
		    <div id="my_map" style="height:320px;"></div>
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