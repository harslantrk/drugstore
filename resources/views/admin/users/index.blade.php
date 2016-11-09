@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- ALERT -->
      @if (Session::has('flash_notification.message'))
          <div class="alert alert-{{ Session::get('flash_notification.level') }}">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('flash_notification.message') }}
          </div>
      @endif
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Üyeler
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/users"><i class="fa fa-dashboard active"></i> Üyeler</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box">
		@if($deleg['a']==1)
		<div class="box-header">
			<a href="/admin/users/create" class="button btn-sm btn-primary"><i class="fa fa-plus"> Yeni Üye</i></a>
		</div>
		@endif
		<div class="box-header">
		  <h3 class="box-title">Üye Listesi</h3>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
		  <table id="users_table" class="table table-bordered table-striped table-hover">
		    <thead>
		    <tr>
		      <th style="width: 5%">#</th>
		      <th style="width: 45%">Üye İsmi</th>
		      <th style="width: 30%">E-posta</th>
		      <th style="width: 15%">İşlemler</th>
		    </tr>
		    </thead>
		    <tbody>
		    <?php 
		    	$count = 0;
		    ?>
		    @foreach($users as $user)
		    <?php 
		    	$count++;
		    ?>
		    <tr>
		      <td>{{$count}}.</td>
		      <td>{{$user->name}}</td>
		      <td>{{$user->email}}</td>
		      <td>
			  	@if($deleg['u']==1)
		      	<a href="/admin/users/edit/{{$user->id}}" class="button btn btn-success"><i class="fa fa-edit"> Düzenle</i></a>@endif
				@if($deleg['d']==1)
				<a class="button btn btn-danger" onclick="deleteApprove('/admin/users/delete/{{$user->id}}')"><i class="fa fa-trash"> Sil</i></a>@endif
		      </td>
		    </tr>
		    @endforeach
		    </tbody>
		  </table>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection