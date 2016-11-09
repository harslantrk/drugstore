@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Reklamlar</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/intro"><i class="fa fa-dashboard active"></i> İntro</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">İntro Reklamı Güncelleme</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="/admin/intro-update">
		{!! csrf_field() !!}
		  <div class="box-body">
		    <div class="form-group">
		      <label for="exampleInputName1">Reklam İsmi <small style="color:red;">(Zorunlu)</small></label>
		      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Reklam İsmini giriniz!" value="{{$advertise->name}}" required>
		    </div>
		    <div class="form-group">
              <label for="exampleInputFile">Reklam Görseli</label>
              <input type="file" id="exampleInputFile" name="image">
              <img src="{{$advertise->image}}">
            </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Reklam Başlığı</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="title" placeholder="Reklam Başlığını giriniz!" value="{{$advertise->title}}" required>
		    </div>
		  	<div class="form-group">
		      <label>Reklam İçeriği</label>
		      <textarea name="content" class="form-control" rows="3" placeholder="Reklam İçeriği ...">{{$advertise->content}}</textarea>
		    </div>
		    <div class="form-group">
		      <label for="exampleInputName1">Reklam Linki</label>
		      <input type="text" class="form-control" id="exampleInputName1" name="slug" placeholder="Reklam Linkini giriniz!" value="{{$advertise->slug}}">
		    </div>
			<div class="form-group">
			  <label>Gösterim Durumu</label>
			  <select name="display" class="form-control select2" style="width: 100%;">
				  <option {{($advertise->display == 1) ? "selected" : "" }} value="1">Göster</option>
				  <option {{($advertise->display == 0) ? "selected" : "" }} value="0">Gösterme</option>
			  </select>
			</div>
		  </div><!-- /.box-body -->

		  <div class="box-footer">
		    <input type="hidden" name="id" value="{{$advertise->id}}"/>
		    <input type="hidden" name="type" value="{{$advertise->type}}"/>
		    <button type="submit" class="btn btn-primary"><i class="fa fa-wrench"></i> Güncelle</button>
			<a href="/admin/intro" class="button btn btn-warning"><i class="fa fa-undo"></i> Geri</a>
		  </div>
		</form>
	</div><!-- /.box -->
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection