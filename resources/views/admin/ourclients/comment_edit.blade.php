@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Yorumlar
    <small>Blog Yorum Güncelleme</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/blog-comment"><i class="fa fa-dashboard active"></i> Blog</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="col-lg-12" style="margin:20px;"></div>
	<div class="row">
		<form method="post" action="/admin/blog-comment-update">
		{!! csrf_field() !!}
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>Yorum </strong></div>
			<div class="col-lg-8"><input type="text" name="comment" class="form-control" value="{{$comments->comment}}" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-6">
				<input type="hidden" name="id" value="{{$comments->id}}"/>
			</div>
			<div class="col-lg-6">
				<button type="submit" class="button btn btn-primary">Güncelle</button>
				<a href="/admin/blog-comment/{{$comments->user_id}}" class="button btn btn-warning">Geri</a>
			</div>
		</div>
		</form>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection