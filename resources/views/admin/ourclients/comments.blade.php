@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    YORUMLAR
    <small>Yorum Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Blog</a></li>
    <li><a href="/admin/blog-comment"><i class="fa fa-dashboard active"></i> Yorumlar</a></li>
  </ol>
</section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Sıra</th>
                        <th>Yorum</th>                  	
                      </tr>
                    </thead>
                    <tbody>                      
                        @foreach($comments as $key => $comment)
                          @if($comment->status == 1)
                            <tr>
                            <td>{{++$key}}</td>
                            <td class="col-md-9">{{$comment->comment}}</td>
                            <td>
                                <a href="/admin/blog-comment-edit/{{$comment->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>
                                <a href="/admin/blog-comment-delete/{{$comment->id}}" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>  
                            </td>
                            </tr>
                           @endif 
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sıra</th>
                        <th>Yorum</th>                     
                      </tr>
                    </tfoot>
                  </table>
                  <div class="col-lg-12" style="margin:20px;"></div>
                  <a href="/admin/blog" class="button btn btn-warning">Geri</a>
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