@extends('admin.master')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tüm Ürünler
           <a href="/admin/product/urun-ekle" class="btn btn-primary btn-sm">Ürün Ekle</a>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="/admin/product/tum-urunler">Ürünler</a></li>
            <li class="active">Tüm Ürünler</li>

          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12 col-sm-12">
              
              <div class="box">
                <!--<div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div>< /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Ürün Adı</td>
                        <td>Fiyatı</td>
                        <td>Kategori</td>
                        <td>Ekleyen</td>
                        <td>Son Güncelleme</td>
                        <td rowspan="2">İşlemler</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      
                      <tr>
                        <th><a href="/admin/product/edit-product/{{$product->id}}">{{$product->id}}</a></th>
                        <th><a href="/admin/product/edit-product/{{$product->id}}">{{$product->name}}</a></th>
                        <th><button class="btn btn-danger btn-xs" style="border-radius: 25px; width:60px;">{{$product->price}} TL</button></th>
                        <th>{{$product->category_id}}</th>
                        <th>{{$product->username}}</th>
                        <th>{{$product->updated_at}}</th>
                        <th><a href="/admin/product/edit-product/{{$product->id}}" class="btn btn-success btn-xs">Güncelle</a></th>
                        <th><a href="/admin/product/delete-product/{{$product->id}}" class="btn btn-danger btn-xs" >Sil</a></th>
                      </tr>

                      @endforeach
                      <!-- Modal -->
                    
                    </tbody>

                    <!-- Trigger the modal with a button -->
                    
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
      
@endsection