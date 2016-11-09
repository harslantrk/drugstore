@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    BLOGLAR
    <small>Blog Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/blog"><i class="fa fa-dashboard active"></i> Üyeler</a></li>
  </ol>
</section>
<!-- Main content 
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-12">
				<a href="/admin/blog-create" class="button btn btn-primary">Yeni Üye</a>
			</div>
			<div class="col-lg-12" style="margin:20px;"></div>
			<<div class="col-lg-12">
				<div class="col-lg-2">
					<strong>#</strong>
				</div>
				<div class="col-lg-3">
					<strong>üye ismi</strong>
				</div>
				<div class="col-lg-3">
					<strong>email</strong>
				</div>
				<div class="col-lg-4">
					<strong>işlemler</strong>
				</div>
			</div>
			@foreach($blogs as $blog)
			<div class="col-lg-12">
				<div class="col-lg-2">
					{{$blog->id}}
				</div>
				<div class="col-lg-3">
					{{$blog->categories_id}}
				</div>
				<div class="col-lg-3">
					{{$blog->gallery_id}}
				</div>
				<div class="col-lg-4">
					<a href="/admin/blog-edit/{{$blog->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>
					<a href="/admin/blog-delete/{{$blog->id}}" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>
				</div>
			</div>
			@endforeach
		</div>

	</div>
</section><!-- /.content -->


        <!-- Main content -->
        <section class="content">
          <div class="row">
          @if($deleg['a']==1)
          <div class="col-lg-12">
				<a href="/admin/blog/create" class="button btn btn-primary">Yeni Blog</a>
			</div>
          @endif
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Blog Yazıları</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Başlık</th>
                      	<th>Beğenme Sayısı</th>
                      	<th>Görünme Sayısı</th>
                      	<th>Yorum Sayısı</th>
                      	<th>Öncelik</th>
                      	<th>Yazan</th>
                      	<th>Oluşturma Tarihi</th>
                      	<th>Güncelleme Tarihi</th> 
                        <th>İŞLEM</th>                      	
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($blogs as $blog)
                          @if($blog->status == 1)
                            <tr>
                            <td>{{$blog->name}}</td>
                            <td>{{$blog->like_count}}</td>
                            <td>{{$blog->seen_count}}</td>
                            <td>{{$blog->comment_count}}</td>
                            <td>{{$blog->priority}}</td>
                            <td>{{$blog->author}}</td>
                            <td>{{$blog->created_at}}</td>
                            <td>{{$blog->updated_at}}</td>
                            <td>
                                <a href="/admin/blog/comment/{{$blog->id}}" class="button btn btn-info"><i class="fa fa-comment-o"> Yorumlar</i></a>
                                @if($deleg['u']==1)<a href="/admin/blog/edit/{{$blog->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>@endif
                                @if($deleg['d']==1)<a onclick="deleteApprove('/admin/blog/delete/{{$blog->id}}')" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>@endif

                            </td>
                            </tr>
                           @endif 
                        @endforeach
                      
                      
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Başlık</th>
                        <th>Beğenme Sayısı</th>
                        <th>Görünme Sayısı</th>
                        <th>Yorum Sayısı</th>
                        <th>Öncelik</th>
                        <th>Yazan</th>
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