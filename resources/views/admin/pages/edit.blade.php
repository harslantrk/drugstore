@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Sayfalar
			<small>Sayfalar Listesi</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
			<li><a href="/admin/pages"><i class="fa fa-dashboard active"></i> Sayfalar</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<form action="/admin/pages/update" method="POST">
				{!! csrf_field() !!}
				<input type="hidden" value="{{ $pages->id }}" name="pages_id">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Kategori Düzenle</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="inputKategoriAdi">Sayfa Adı</label>
							<input type="text" class="form-control" id="inputSayfaAdi" name="title" placeholder="Kategori Adı Giriniz" value="{{$pages->title}}">
						</div>
						<div class="form-group">
							<label for="inputKategoriTuru">Kategori</label>
							<select class="form-control" id="inputKategoriTuru" name="cat_id">
								<option value="0">Yok</option>
								@foreach($allCategories as $value)
									@if($value->id == $pages->cat_id)
									<option selected value="{{ $value->id }}">{{ $value->title }}</option>
									@else
									<option value="{{ $value->id }}">{{ $value->title }}</option>
									@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="inputSayfaKeyword">Anahtar Kelime (Meta Keyword)</label>
							<textarea class="form-control" id="inputSayfaKeyword" name="keyword" placeholder="Örneğin: tatil, seyahat, gezi vb.">{{ $pages->keyword }}</textarea>
						</div>
						<div class="form-group">
							<label for="inputSayfaAciklama">Sayfa Açıklama (Meta Description)</label>
							<textarea draggable="false" class="form-control" id="inputSayfaAciklama" name="description" placeholder="Sayfa Açıklaması Giriniz">{{ $pages->description }}</textarea>
						</div>
						<div class="form-group">
							<label for="inputUstKategori">Üst Sayfa</label>
							<select class="form-control" id="inputUstSayfa" name="parent">
								<option value="0">Yok</option>
								@foreach($allPages as $value)
								@if($pages->parent == $value->id)
								<option value="{{ $value->id }}" selected>{{ $value->title }}</option>
								@else
								<option value="{{ $value->id }}">{{ $value->title }}</option>
								@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="inputKategoriOnceligi">Sayfa Önceliği</label>
							<input type="text" class="form-control" id="inputSayfaOnceligi" name="priority" placeholder="Boş Bırakırsanız otomatik atanacaktır." value="{{ $pages->priority }}">
						</div>
						<div class="form-group">
							<label for="inputKategoriOnceligi">Galeri Resmi</label><br>
							Coming Soon...
						</div>
						<div class="form-group">
							<label for="inputSayfaGaleri">Sayfa İçeriği</label><br>
							<textarea class="form-control product-text" id="inputIcerik" name="content"> {{ $pages->content }}</textarea>
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