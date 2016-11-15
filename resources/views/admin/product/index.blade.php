@extends('admin.master')

@section('content')
  @if($deleg['u'] != 1 && $deleg['d'] != 1)
    <script type="text/javascript">
      alert('Sadece Görüntüleme Yetkisine Sahipsiniz !');
    </script>
  @endif
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
                        <td>İşlemler</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <th><a href="/admin/product/edit-product/{{$product->id}}">{{$product->id}}</a></th>
                        <th><a href="/admin/product/edit-product/{{$product->id}}">{{$product->name}}</a></th>
                        <th><label class="label-danger">{{$product->price}} TL</label></th>
                        <th>{{$product->category_id}}</th>
                        <th>{{$product->username}}</th>
                        <th>{{$product->updated_at}}</th>
                        <th>
                          @if($deleg['u'] == 1)<a title="Güncelle" href="/admin/product/edit-product/{{$product->id}}" class="btn btn-success btn-xs"><i class="fa fa-upload"></i></a>@endif
                          @if($deleg['d'] == 1)<a title="Sil" href="/admin/product/delete-product/{{$product->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> @endif
                        </th>
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

  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
    });
  </script>
@endsection