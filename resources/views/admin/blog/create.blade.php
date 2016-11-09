@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    BLOG
    <small>Blog oluşturma</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Ana Sayfa</a></li>
    <li><a href="/admin/blog"><i class="fa fa-dashboard"></i> Blog</a></li>
    <li><a href="/admin/blog-create"><i class="fa fa-dashboard active"></i> Yeni</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Yeni Blog</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <input class="form-control" id="blog_name" placeholder="Başlık ekleyiniz...">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="blog_description" placeholder="Açıklama ekleyiniz...">
                  </div>
                  <div class="form-group">
                    <textarea placeholder="Lütfen blog'unuzu oluşturunuz..." id="blog_content" class="form-control product-text" style="height: 300px">
                         
                    </textarea>
                  </div>
                  <!--<div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>-->
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
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-default" onclick="addBlogContentDraft()"><i class="fa fa-pencil"></i> Taslak</button>
                    <button type="submit" class="btn btn-primary" onclick="addBlogContentLive()"><i class="fa fa-envelope-o"></i> Gönder</button>
                  </div>
                  <a href="/admin/blog" class="button btn btn-success"><i class="fa fa-fw fa-hand-o-left"> </i></a>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
    </div><!-- ./row -->  
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script> setTimeout(function(){galleryImport("blog",null);},1); </script>
@endsection