@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Üyeler
    <small>Blog Güncelleme</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/blog"><i class="fa fa-dashboard active"></i> Blog</a></li>
  </ol>
</section>

<section class="content">
        <div class="row">
        <form method="post" action="/admin/blog/update">
		{!! csrf_field() !!}
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Düzenleme</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="col-lg-12">
					<div class="col-lg-4"><strong>Başlık :<small style="color:red;"></small></strong></div>
					<div class="col-lg-8"><input type="text" name="name" class="form-control" value="{{$blogs->name}}" required /></div>
				</div>
				<div class="col-lg-12">
					<div class="col-lg-4"><strong>Açıklama : <small style="color:red;"></small></strong></div>
					<div class="col-lg-8"><input type="text" name="description" class="form-control" value="{{$blogs->description}}" required /></div>
				</div>
                  <div class="form-group">
                    <textarea id="blog_content" name="content" class="form-control product-text" style="height: 300px">
                         {{$blogs->content}}
                    </textarea>
                  </div>
                  <div class="form-group">
                      <div class="kv-main"></div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Format</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Standart
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Galeri
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                            Link
                        </label>
                      </div>
                    </div>
                  </form>
                </div><!-- /.box-body -->

              </div><!-- /.box -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Kategoriler</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">
                   <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">
                            Genel 
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Spor 
                        </label>
                      </div>

                      <div class="checkbox">
                        <label>
                          <input type="checkbox" disabled>
                           Eğlence 
                        </label>
                      </div>
                    </div>
                  </form>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
               <div class="col-lg-12">
			<div class="col-lg-6">
				<input type="hidden" name="id" value="{{$blogs->id}}"/>
			</div>
			<div class="col-lg-6">
				<button type="submit" class="button btn btn-primary">Güncelle</button>
				<a href="/admin/blog" class="button btn btn-warning">Geri</a>
			</div>
		</div>
              </div><!-- /. box -->
            </div><!-- /.col -->
            </form>
    </div><!-- ./row -->  
</section><!-- /.content -->

<!-- Main content 
<section class="content">
	<div class="col-lg-12" style="margin:20px;"></div>
	<div class="row">
		<form method="post" action="/admin/blog-update">
		{!! csrf_field() !!}
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>Başlık <small style="color:red;">(Zorunlu)</small></strong></div>
			<div class="col-lg-8"><input type="text" name="name" class="form-control" value="{{$blogs->name}}" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>Öncelik <small style="color:red;">(Zorunlu)</small></strong></div>
			<div class="col-lg-8"><input type="text" name="priority" class="form-control" value="{{$blogs->priority}}" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-4"><strong>Yazan <small style="color:red;">(Zorunlu)</small></strong></div>
			<div class="col-lg-8"><input type="text" name="author" class="form-control" value="{{$blogs->author}}" required /></div>
		</div>
		<div class="col-lg-12" style="margin:10px;"></div>
		<div class="col-lg-12">
			<div class="col-lg-6">
				<input type="hidden" name="id" value="{{$blogs->id}}"/>
			</div>
			<div class="col-lg-6">
				<button type="submit" class="button btn btn-primary">Güncelle</button>
				<a href="/admin/blog" class="button btn btn-warning">Geri</a>
			</div>
		</div>
		</form>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection