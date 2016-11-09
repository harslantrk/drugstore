@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Reklamlar
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/popup"><i class="fa fa-dashboard active"></i> Popup</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Yeni Popup Reklamı Ekleme</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="/admin/popup-save">
		{!! csrf_field() !!}
		  <div class="box-body">
		    <div class="form-group">
		      <label for="exampleInputName1">Reklam İsmi <small style="color:red;">(Zorunlu)</small></label>
		      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Reklam İsmini giriniz!" required>
		    </div>
			<div class="form-group">
			  <label>Hangi Sayfada Gösterilecek</label>
			  <select name="page" class="form-control select2" style="width: 100%;">
				  <option value="0" selected="selected">Sayfa Seçiniz</option>
				  <option value="1">1. Sayfada</option>
				  <option value="2">2. Sayfada</option>
				  <option value="3">3. Sayfada</option>
				  <option value="4">4. Sayfada</option>
			  </select>
			</div>
		    <div class="form-group">
              <label for="exampleInputFile">Reklam Görseli</label>
              <input type="file" id="exampleInputFile" name="image">
            </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Reklam Başlığı</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Reklam Başlığını giriniz!" required>
		    </div>
		  	<div class="form-group">
		      <label>Reklam İçeriği</label>
		      <textarea name="content" class="form-control" rows="3" placeholder="Reklam İçeriği ..."></textarea>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Reklam Linki</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="slug" placeholder="Reklam Linkini giriniz!">
		    </div>
			<div class="form-group">
			  <label>Gösterim Durumu</label>
			  <select name="display" class="form-control select2" style="width: 100%;">
				  <option value="1" selected="selected">Göster</option>
				  <option value="0">Gösterme</option>
			  </select>
			</div>
		  </div><!-- /.box-body -->

		  <div class="box-footer">
		    <input type="hidden" name="type" value="2"/>
		    <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Kaydet</button>
			<a href="/admin/intro" class="button btn btn-warning"><i class="fa fa-undo"></i> Geri</a>
		  </div>
		</form>
	</div><!-- /.box -->

</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection