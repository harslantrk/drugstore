@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ürünler
    <small>Ürün Ekle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/users"><i class="fa fa-dashboard active"></i> Ürün Düzenle</a></li>
  </ol>
</section>
<!-- Main content -->

<section class="content">
<div class="row">
<div class="col-lg-8 col-md-8">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ürün Düzenle</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post" id="productForm">
  <input type="hidden" name="id" value="{{$product->id}}">
  {!! csrf_field() !!}
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Ürün Adı</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{$product->name}}">
      </div>
      <div class="form-group">
            <label for="exampleInputEmail1">Ürün İçeriği</label>
            <textarea name="content" class="textarea product-text" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
              {{$product->content}}
            </textarea>
          
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <label for="exampleInputEmail1">Ürün Fiyatı</label>
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->price}}" name="price">
          </div>
          <div class="col-lg-6 col-md-6">
            <label for="exampleInputEmail1">Ürün Stoğu</label>
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$product->stock}}" name="stock">
          </div>
        </div>  
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">SEO Açıklama</label>
        <textarea type="text" class="textarea" style="width:100%;height:250px;resize:none;" id="exampleInputEmail1" placeholder="" name="description">
          {{$product->description}}
        </textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Ürün Galerisi</label>
        
      </div>

      </div>
  
</div><!-- /.box -->
</div>
<div class="col-lg-4 col-md-4">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Yayınlama Araçları</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    
      <div class="box-body">
        <div class="form-group">
          <button type="submit" onclick ="return productFormSave();" class="btn btn-primary">Güncelle</button>
          <button type="submit" onclick ="return productFormDraft();" class="btn btn-warning">Taslağa Kaydet</button>
        </div>

        <div class="form-group">
          <h3 class="box-title">Sayfa Düzeni</h3>
          
          <label for="exampleInputEmail1">Kategori</label>
          <select class="form-control" name="">
            <option>Kategori 1</option>
            <option>Kategori 2</option>
            <option>Kategori 3</option>
            <option>Kategori 4</option>
            <option>Kategori 5</option>
          </select>
          <label for="exampleInputEmail1">Sıralama</label>
          <input type="number" value="{{$product->priority}}" class="form-control" id="exampleInputEmail1" placeholder="" name="priority">
        </div>
        <div class="form-group">
          <h3 class="box-title">Etiketler</h3>
          <p><small>Kelimeler Arasına Virgül Koyunuz</small></p>
          <textarea type="text" class="form-control" style="width:100%;height:150px;overflow: hidden; resize:none;"  id="exampleInputEmail1" placeholder="" name="tags">
            {{$product->tags}}
          </textarea>
        </div>
        <div class="form-group">
          <h3 class="box-title">Öne Çıkarılan Görsel</h3>
          <img src="{{$product->image}}" class="img-responsive">
          <input name="image" type="file" id="exampleInputFile">
          
        </div>
        

    </form>

  </div><!-- /.box -->
</div>
</div>
</section><!-- /.content -->

<script type="text/javascript">
  
function productFormSave (){
  $("#productForm").attr("action","/admin/update-product");
}

function productFormDraft (){
  $("#productForm").attr("action","/admin/update-draft");
}
</script>



</div><!-- /.content-wrapper -->
@endsection