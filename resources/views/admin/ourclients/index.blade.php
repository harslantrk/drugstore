@extends('admin.master')

@section('content')

<style type="text/css">
  .table td {
    line-height:80px !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    MÜŞTERİ YORUMLARI
    <small>Yorumlar Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/our-client"><i class="fa fa-dashboard active"></i> Müşteri Yorumları</a></li>
  </ol>
</section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          @if($deleg['a']==1)
          <div class="col-lg-12">
				<a href="/admin/our-client/create" class="button btn btn-primary">Yorum Ekle</a>
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
                        <th>Resmi</th>
                        <th>İsim</th>
                      	<th>Yorumu</th>
                      	<th>Ünvan</th>
                      	<th>Durumu</th>
                      	<th>Oluşturma Tarihi</th>
                      	<th>Güncelleme Tarihi</th> 
                        <th>İŞLEM</th>                      	
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($ourclients as $ourclient)
                          
                            <tr>
                            <td>
                              <div class="pull-left image">
                                <img width="80" height="80" src="{{$ourclient->image}}" class="img-circle" alt="Resmi Yok">
                              </div>
                            </td>
                            <td>{{$ourclient->name}}</td>
                            <td><?=substr($ourclient->comment,0,50)?></td>
                            <td>{{$ourclient->position}}</td>
                            <td>
                              <?php if ($ourclient->status==1){
                                echo '<div class="label label-success">Etkin</div>';
                                }
                                else {
                                 echo '<div class="label label-danger">Etkin Değil</div>';
                                }
                              ?>
                            </td>
                            <td>{{$ourclient->created_at}}</td>
                            <td>{{$ourclient->updated_at}}</td>
                            <td>
                                @if($deleg['u']==1)<a href="/admin/our-client/edit/{{$ourclient->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>@endif
                                @if($deleg['d']==1)<a onclick="deleteApprove('/admin/our-client/delete/{{$ourclient->id}}')" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>@endif

                            </td>
                            </tr>
                          
                        @endforeach
                      
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Resmi</th>
                        <th>İsim</th>
                        <th>Yorumu</th>
                        <th>Ünvan</th>
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