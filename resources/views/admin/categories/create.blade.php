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
			Kategoriler
			<small>Kategori Listesi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
			<li><a href="/admin/categories"><i class="fa fa-dashboard active"></i> Kategoriler</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Kategori Ekle</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="inputKategoriAdi">Kategori Adı</label>
							<input type="text" class="form-control" id="inputKategoriAdi" placeholder="Kategori Adı Giriniz">
						</div>
						<div class="form-group">
							<label for="inputKategoriTuru">Kategori Türü</label>
							<select class="form-control" id="inputKategoriTuru">
								<option value="page">Sayfa Kategori</option>
								<option value="blog">Blog Kategori</option>
								<option value="gallery">Galeri Kategori</option>
							</select>
						</div>
						<div class="form-group">
							<label for="inputKategoriAciklama">Kategori Açıklama</label>
								<textarea class="form-control" id="inputKategoriAciklama" placeholder="Kategori Açıklaması Giriniz"></textarea>
						</div>
						<div class="form-group">
							<label for="inputUstKategori">Üst Kategori</label>
							<select class="form-control" id="inputUstKategori">
								<option value="0">Yok</option>
								@foreach($allCategories as $value)
								<option value="{{ $value->id }}">{{ $value->title }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="inputKategoriOnceligi">Kategori Önceliği</label>
							<input type="text" class="form-control" id="inputKategoriOnceligi" placeholder="Boş Bırakırsanız otomatik atanacaktır.">
						</div>
						<div class="form-group">
							<label for="inputKategoriOnceligi">Galeri Resmi</label><br>
							Coming Soon...
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" onclick="addCategories()">Ekle</button>
					</div>
				</div><!-- /.box -->
			</div>
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection