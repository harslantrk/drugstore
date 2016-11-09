@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Üyeler
    <small>Üye Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/users"><i class="fa fa-dashboard active"></i> Üyeler</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12 padding-temizle">
            @foreach($migrate as $key=>$value)
                <div class="col-lg-6">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">{{$value['name']}}</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                <th>Modül Adı</th>
                                <th>Konumu</th>
                                <th>Okuma</th>
                                <th>Ekleme</th>
                                <th>Silme</th>
                                <th>Güncelleme</th>
                                </thead>
                                <tbody>
                                @foreach($column as $ky=>$val)
                                    <tr>
                                        <td><b>{{$val->name}}</b></td>
                                        <td><?php if($value[$val->name]['p_id']==0){echo 'Üst Modül/';}else{echo 'Alt modül/';} ?></td>
                                        <td><?php if($value[$val->name]['r']==1){echo "<span style='color:green'><i class='fa fa-check'></i></span>";}else{echo "<span style='color:red'><i class='fa fa-times'></i></span>";} ?></td>
                                        <td><?php if($value[$val->name]['a']==1){echo "<span style='color:green'><i class='fa fa-check'></i></span>";}else{echo "<span style='color:red'><i class='fa fa-times'></i></span>";} ?></td>
                                        <td><?php if($value[$val->name]['u']==1){echo "<span style='color:green'><i class='fa fa-check'></i></span>";}else{echo "<span style='color:red'><i class='fa fa-times'></i></span>";} ?></td>
                                        <td><?php if($value[$val->name]['d']==1){echo "<span style='color:green'><i class='fa fa-check'></i></span>";}else{echo "<span style='color:red'><i class='fa fa-times'></i></span>";} ?></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-lg-6" style="float:right;">

                                @if($deleg['u']==1)
                                    <a href="/admin/delegations/edit/{{$value['id']}}" class="btn btn-success" title="Düzenle"><i class="fa fa-pencil-square-o"></i> Düzenle</a>@endif
                                @if($deleg['d']==1)<a href="/admin/delegations/delete/{{$value['id']}}" class="btn btn-danger" title="Sil"><i class="fa fa-trash"></i> Sil</a>@endif
                            </div>
                        </div>
                    </div>
                    @endforeach
      @if($deleg['a']==1)
			<div class="col-lg-12">
				<a href='/admin/delegations/create' class='btn btn-info'><i class='fa fa-plus'></i> Yeni Kullanıcı Tipi Ekle</a>
      </div>
			@endif
		</div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection