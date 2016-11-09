@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Müşteriler
    <small>Yeni Müşteri Ekle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/customers"><i class="fa fa-dashboard active"></i> Müşteriler</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">	
  <div class="row">
		<div class="col-lg-12">
      <div class="box box-primary" style="padding: 1%">
        <div class="box-header with-border" style="margin-bottom: 1%">
          <h3 class="box-title">Yeni Müşteri Ekle</h3>
        </div>
        <div class=box-body>
        <form class="form-inline form-horizontal" id="customers_create_form" method="POST">
        <table class="table table-bordered table-hover">
         
            <tr> <div class="form-group">
       <td><label>Adı:</label></td>
       <td><label><input type='text' class='form-control' name='name' /></label></td> </div></tr>
         

        <tr> <div class="form-group">
         <td><label>Soyadı:</label></td>
         <td><label><input type='text' class='form-control' name='surname' /></label></td> </div></tr>



        <tr> <div class="form-group">
         <td><label>Telefon Numarası:</label></td>
         <td><label><input type='text' class='form-control phone_mask' name='phone'  /></label></td> </div></tr>
        
        

        <tr> <div class="form-group">
         <td><label>Cep Telefonu:</label></td>
         <td><label><input type='text' class='form-control phone_mask' name='gsm'  /></label></td> </div></tr>

        <tr> <div class="form-group">
         <td><label>Email Adresi:</label></td>
         <td><label><input type='email' class='form-control' name='email' /></label></td> </div></tr>
            

        <tr> <div class="form-group">
         <td><label>Adres:</label></td>
          <td><label><textarea class="form-control adres" name="adres" id="adres"></textarea>           
        </label></td> </div></tr>
<tr><td colspan="2">
        <div class="box-header with-border" style="margin-bottom: 1%;margin-top: 1%;">
          <h3 class="box-title">Yeni Müşteri Ekle</h3>
        </div>
        </td></tr>
 
        <tr> <div class="form-group">
          <td><label>Şirketin Adı:</label></td>
          <td><label><input type='text' class='form-control' name='companyName'/></label></td> </div></tr>

        <tr> <div class="form-group">
          <td><label>Şirketin Numarası:</label></td>
          <td><label><input type='text' class='form-control phone_mask' name='companyPhone'  /></label></td> </div></tr>

        <div class='form-group'>
          <td colspan="2"><label>
            <button class='btn btn-primary' id='customers_create_Btn'><i class="fa fa-save"></i> Kaydet</button>
          </label></td> </div></tr>

         </table>
        </form>
      </div>
      </div>
      
		</div>
	</div>
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
@endsection