@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
				<form action="/admin/categories/update" method="POST">
				{!! csrf_field() !!}
				<input type="hidden" value="{{ $categories->id }}" name="categories_id">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Kategori Düzenle</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="inputKategoriAdi">Kategori Adı</label>
							<input type="text" class="form-control" id="inputKategoriAdi" name="title" placeholder="Kategori Adı Giriniz" value="{{$categories->title}}">
						</div>
						<div class="form-group">
							<label for="inputKategoriTuru">Kategori Türü</label>
							<select class="form-control" id="inputKategoriTuru" name="type">
								@if($categories->type == "page")
									<option value="page" selected>Sayfa Kategori</option>
								@else
									<option value="page">Sayfa Kategori</option>
								@endif
								@if($categories->type == "blog")
									<option value="blog" selected>Blog Kategori</option>
								@else
									<option value="blog">Blog Kategori</option>
								@endif
								@if($categories->type == "blog")
									<option value="gallery" selected>Galeri Kategori</option>
								@else
									<option value="gallery">Galeri Kategori</option>
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="inputKategoriAciklama">Kategori Açıklama</label>
								<textarea class="form-control" id="inputKategoriAciklama" name="description" placeholder="Kategori Açıklaması Giriniz">{{ $categories->description }}</textarea>
						</div>
						<div class="form-group">
							<label for="inputUstKategori">Üst Kategori</label>
							<select class="form-control" id="inputUstKategori" name="parent">
								<option value="0">Yok</option>
								@foreach($allCategories as $value)
								@if($categories->parent == $value->id)
								<option value="{{ $value->id }}" selected>{{ $value->title }}</option>
								@else
								<option value="{{ $value->id }}">{{ $value->title }}</option>
								@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="inputKategoriOnceligi">Kategori Önceliği</label>
							<input type="text" class="form-control" id="inputKategoriOnceligi" name="priority" placeholder="Boş Bırakırsanız otomatik atanacaktır." value="{{$categories->priority}}">
						</div>
						<div class="form-group">
							<label for="inputKategoriOnceligi">Galeri Resmi</label><br>
							Coming Soon...
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Kaydet</button>
					</div>
				</div><!-- /.box -->
				</form>
			</div>
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection