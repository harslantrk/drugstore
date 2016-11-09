@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Modüller
    <small>Yeni Modül Düzenle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/modules"><i class="fa fa-dashboard active"></i> Modüller</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">	
  <div class="row">
		<div class="col-lg-12"> 
      <div class="box box-primary" style="padding: 1%">
        <div class="box-header with-border" style="margin-bottom: 1%">
          <h3 class="box-title">Yeni Modül Ekle</h3>
        </div>
        <div class="box-body">
        <form class="form-inline" id="modules_create_form" method="POST">
        
        
        <div class='col-lg-12'>
        <div class='col-lg-3'>
        <label>Modül Adı</label></div>
        <div class="col-lg-9"><label>
        <input type='text' class='form-control' name='name' />
        </label>
        </div>
        </div>
        <div class='col-lg-12'>
        <div class='col-lg-3'>
        
        <label>Modül URL</label></div>
        <div class='col-lg-9'><label>
        <input type='text' class='form-control' name='url' /></label>
        <input type="hidden" name="parent_id" value="0">
        </div></div>
        <div class='col-lg-12'>
        <div class='col-lg-3'>
        
        <label>Menüdeki Önceliği</label></div>
        <div class='col-lg-9'><label>
        <input type='text' class='form-control' name='priority' /></label>
        </div></div>
        
          <h3 class='box-title'>Alt Modül Eklemek İçin <button class="btn btn-primary" id="createParentModul"><i class="fa fa-hand-pointer-o"></i> Tıklayınız</button></h3>
        <div class="parentModulDiv">
          

        </div>
        
          <label>
            <button class='btn btn-primary' id='modules_create_Btn'><i class="fa fa-save"></i> Kaydet</button>
          </label>
        </form>
      </div>
      </div>
      
		</div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection