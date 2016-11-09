@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    REFERANSLAR
    <small>Referans Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/reference"><i class="fa fa-dashboard active"></i> Referanslar</a></li>
  </ol>
</section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          @if($deleg['a']==1)
          <div class="col-lg-12">
				<a href="/admin/reference/create" class="button btn btn-primary">Referans Ekle  <i class="fa fa-plus"></i></a>
			</div>
          @endif
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Referanslar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Referans Adı</th>
                      	<th>Link</th>
                      	<th>Durumu</th>
                      	<th>Oluşturma Tarihi</th>
                      	<th>Güncelleme Tarihi</th> 
                        <th>İŞLEM</th>                      	
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($references as $reference)
                          
                            <tr>
                            <td>{{$reference->id}}</td>
                            <td>{{$reference->name}}</td>
                            <td>{{$reference->link}}</td>
                            <td>
                              <?php if ($reference->status==1){
                                echo '<div class="label label-success">Etkin</div>';
                                }
                                else {
                                 echo '<div class="label label-danger">Etkin Değil</div>';
                                }
                              ?>
                            </td>
                            <td>{{$reference->created_at}}</td>
                            <td>{{$reference->updated_at}}</td>
                            <td>
                                @if($deleg['u']==1)<a href="/admin/reference/edit/{{$reference->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>@endif
                                @if($deleg['d']==1)<a onclick="deleteApprove('/admin/reference/delete/{{$reference->id}}')" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>@endif

                            </td>
                            </tr>
                          
                        @endforeach
                      
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Referans Adı</th>
                        <th>Link</th>
                        <th>Durumu</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Güncelleme Tarihi</th> 
                        <th>İŞLEM</th>                        
                      </tr>
                    </tfoot>
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
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endsection