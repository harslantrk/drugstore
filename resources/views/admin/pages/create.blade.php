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
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Sayfa Ekle</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="inputSayfaAdi">Sayfa Adı</label>
							<input type="text" class="form-control" id="inputSayfaAdi" placeholder="Sayfa Adı Giriniz">
						</div>
						<div class="form-group">
							<label for="inputKategori">Kategori</label>
							<select class="form-control" id="inputKategori">
								<option value="0">Yok</option>
								@foreach($allCategories as $value)
									<option value="{{ $value->id }}">{{ $value->title }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="inputSayfaKeyword">Anahtar Kelime (Meta Keyword)</label>
							<textarea class="form-control" id="inputSayfaKeyword" placeholder="Örneğin: tatil, seyahat, gezi vb."></textarea>
						</div>
						<div class="form-group">
							<label for="inputSayfaAciklama">Sayfa Açıklama (Meta Description)</label>
							<textarea class="form-control" id="inputSayfaAciklama" placeholder="Sayfa Açıklaması Giriniz"></textarea>
						</div>
						<div class="form-group">
							<label for="inputUstSayfa">Üst Sayfa</label>
							<select class="form-control" id="inputUstSayfa">
								<option value="0">Yok</option>
								@foreach($allPage as $value)
								<option value="{{ $value->id }}">{{ $value->title }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="inputSayfaOnceligi">Sayfa Önceliği</label>
							<input type="number" class="form-control" id="inputSayfaOnceligi" placeholder="Boş Bırakırsanız otomatik atanacaktır." value="0">
						</div>
						<div class="form-group">
							<label for="inputSayfaGaleri">Galeri Resmi</label><br>
							Coming Soon...
						</div>
						<div class="form-group">
							<label for="inputSayfaGaleri">Sayfa İçeriği</label><br>
							<textarea class="form-control product-text" id="inputIcerik"></textarea>
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" onclick="addPages()">Ekle</button>
					</div>
				</div><!-- /.box -->
			</div>
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection