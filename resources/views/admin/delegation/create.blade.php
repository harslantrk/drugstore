@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Yetkilendirme
    <small>Yeni Yetkilendirme Tipi Düzenle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/delegations"><i class="fa fa-dashboard active"></i> Yetkilendirme</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">	
  <div class="row">
		<div class="col-lg-12"> 
      <div class="box box-primary" style="padding: 1%">
        <div class="box-header with-border" style="margin-bottom: 1%">
          <h3 class="box-title">Yeni Yetkilendirme Tipi Ekle</h3>
        </div>
        <form class="form-group" id="delegation_create_form" method="POST">
        <div class="form-group">
        <label>Yetkilendirme Tipi Adı</label>
        <label><input type='text' class='form-control' name='name' /></label>
        </div>
        <div class="box-header with-border" style="margin-bottom: 1%">
          <h3 class='box-title'>Yetkilendirilecek Tablolar</h3>
        </div>
        <table class='table table-bordered table-hover'>
          <thead>
            <th>#</th>
            <th>Kolon Adı</th>
            <th>Listeleme</th>
            <th>Ekleme</th>
            <th>Güncelleme</th>
            <th>Silme</th>
          </thead>
          <?php $sira=1;?>
          @foreach($column as $val)
            <tr>
              <td>{{$sira}}</td>
              <td>{{$val->name}}</td>
              <td><label>
                       <input type="hidden" name="{{$val->id}}_list" value="off"> 
                      <input type="checkbox" name="{{$val->id}}_list" class="minimal">
                    </label>
              </td><td><label>
                      <input type="hidden" name="{{$val->id}}_add" value="off">
                      <input type="checkbox" name="{{$val->id}}_add" class="minimal">
                    </label>
              </td><td><label>
                      <input type="hidden" name="{{$val->id}}_update" value="off">
                      <input type="checkbox" name="{{$val->id}}_update" class="minimal">
                    </label>
              </td><td><label>
                      <input type="hidden" name="{{$val->id}}_delete" value="off">
                      <input type="checkbox" name="{{$val->id}}_delete" class="minimal">
                    </label>
              </td>
            </tr>
            <?php $sira++; ?>
          @endforeach

            

        </table>
        <div class='form-group'>
          <label>
            <button class='btn btn-primary' id='delegations_create_Btn'><i class="fa fa-save"></i> Kaydet</button>
          </label>
        </div>
        </form>
      </div>
      
		</div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection