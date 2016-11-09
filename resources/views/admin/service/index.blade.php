@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    HİZMETLER
    <small>Hizmet Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/services"><i class="fa fa-dashboard active"></i> Hizmetler</a></li>
  </ol>
</section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          @if($deleg['a']==1)
          <div class="col-lg-12">
				<a href="/admin/services/create" class="button btn btn-primary">Hizmet Ekle</a>
			</div>
          @endif
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hizmetler</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Başlık</th>
                      	<th>Kısa Açıklama</th>
                      	<th>Öncelik</th>
                      	<th>Oluşturma Tarihi</th>
                      	<th>Güncelleme Tarihi</th> 
                        <th>İŞLEM</th>                      	
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($services as $service)
                          @if($service->status == 1)
                            <tr>
                            <td>{{$service->title}}</td>
                            <td>{{$service->short_content}}</td>
                            <td>{{$service->priority}}</td>
                            <td>{{$service->created_at}}</td>
                            <td>{{$service->updated_at}}</td>
                            <td>
                                @if($deleg['u']==1)<a href="/admin/services/edit/{{$service->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>@endif
                                @if($deleg['d']==1)<a onclick="deleteApprove('/admin/services/delete/{{$service->id}}')" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>@endif

                            </td>
                            </tr>
                           @endif 
                        @endforeach
                      
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Başlık</th>
                        <th>Kısa Açıklama</th>
                        <th>Öncelik</th>
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