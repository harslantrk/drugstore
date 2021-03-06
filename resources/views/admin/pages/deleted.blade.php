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
			<div class="col-md-3">
				<a href="/admin/pages-create" class="btn btn-primary btn-block margin-bottom">Sayfa Ekle</a>
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Sayfa Türleri</h3>
						<div class="box-tools">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body no-padding">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="/admin/pages"><i class="fa fa-folder-o"></i> Aktif Sayfalar</a></li>
							<li><a href="/admin/pages/drafts"><i class="fa fa-folder-o"></i> Taslak Sayfalar</a></li>
							<li class="active"><a href="/admin/pages/deleted"><i class="fa fa-folder-o"></i> Silinen Sayfalar</a></li>
						</ul>
					</div><!-- /.box-body -->
				</div><!-- /. box -->
			</div><!-- /.col -->
			<div class="col-md-9">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Silinen Sayfalar</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive no-padding padding-temizle-data-table">
							<table id="datatablo" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Sayfa Adı</th>
									<th>Link</th>
									<th>Kategori</th>
									<th>Üst Sayfa</th>
									<th>Öncelik</th>
									<th>İşlem</th>
								</tr>
								</thead>
								<tbody>
								<?php $sayac=1; ?>
								@foreach($pages as $value)
									<tr>
										<td>{{$sayac}}</td>
										<td>{{ $value->title }}</td>
										<td>{{ $value->slug }}</td>
										<td>{{ $value->cat_id }}</td>
										<td>{{ $value->parent }}</td>
										<td>{{ $value->priority }}</td>
										<td>
											<a href="/admin/pages-edit/{{$value->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>
											<a href="/admin/pages-active/{{$value->id}}" class="button btn btn-danger"><i class="fa fa-trash"> Aktif Et</i></a>
										</td>
									</tr>
									<?php $sayac++; ?>
								@endforeach
								</tbody>
								<tfoot>

								</tfoot>
							</table>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="modal modal-success fade" id="modalIlkMesaj" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<form role="form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Kategori Ekle</h4>
				</div>
				<div class="modal-body">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Kategori Ekle</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form role="form">
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
									<textarea type="text" class="form-control" id="inputKategoriAcklama" placeholder="Kategori Adı Giriniz">
									</textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="exampleInputFile">File input</label>
									<input type="file" id="exampleInputFile">
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox"> Check me out
									</label>
								</div>
							</div><!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div><!-- /.box -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection