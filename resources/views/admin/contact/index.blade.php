@extends('admin.master')

@section('content')

<style type="text/css">
  .input-group-addon {
    min-width:150px;
    background: #fff;
    border-left: 1px solid #ccc !important;
    text-align: left;
    padding:13px;

  }
  .form-control {
    height: 100% !important;
    display: block !important;
  }
  .message-content {
    width: 100%;
    border: 1px solid #ccc;
    padding: 13px;
  }
  .form-control-custom {
    width:100%;
    border: 1px solid #ccc;
    padding:10px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    İletişim
    <small>Gelen Mesajlar Listesi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
    <li><a href="/admin/contacts/add"><i class="fa fa-dashboard active"></i> İletişim</a></li>
  </ol>
</section>


        <!-- Main content -->
        <section class="content">
          <div class="row">
          
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Mesajlar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                      	<th>Gönderen</th>
                      	<th>Konu</th>
                      	<th>Telefon</th>
                      	<th>Mail</th>
                      	<th>Gönderilme Tarihi</th> 
                        <th>İŞLEM</th>                      	
                      </tr>
                    </thead>
                    <tbody>
                      
                        
                      
                        @foreach($contacts as $contact)
                          <?php if ($contact->status==1): ?>
                            <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->subject}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->created_at}}</td>
                            <td>

                              @if($deleg['u']==1)<button type="button" onclick="readingChange({{$contact->id}})" class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$contact->id}}"><i class="fa fa-envelope"></i> Mesajı Gör</button>@endif

                              <!-- Modal -->
                              <div id="myModal-{{$contact->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4>Mesajlar</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>
                                        <table  style="width:100%;">
                                          <tr>
                                            <td>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <div class="input-group-addon">
                                                    Gönderen
                                                  </div>
                                                </div>
                                                <div class="col-sm-9">
                                                  <div class="form-control-custom">
                                                    {{$contact->name}}
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <div class="input-group-addon">
                                                    Konu
                                                  </div>
                                                </div>
                                                <div class="col-sm-9">
                                                  <div class="form-control-custom">
                                                    {{$contact->subject}}
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <div class="input-group-addon">
                                                    Email
                                                  </div>
                                                </div>
                                                <div class="col-sm-9">
                                                  <div class="form-control-custom">
                                                    {{$contact->email}}
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="row">
                                                <div class="col-sm-3">
                                                  <div class="input-group-addon">
                                                    Telefon
                                                  </div>
                                                </div>
                                                <div class="col-sm-9">
                                                  <div class="form-control-custom">
                                                    {{$contact->phone}}
                                                  </div>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="">
                                                <div class="message-content">
                                                  Mesaj İçeriği
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <div class="form-control">
                                                  {{$contact->message}}
                                              </div>
                                            </td>
                                          </tr>
                                        </table>
                                      </p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                    </div>
                                  </div>

                                </div>
                              </div>

                              @if($deleg['d']==1)<a onclick="deleteApprove('/admin/contacts/delete/{{$contact->id}}')" class="button btn btn-danger"><i class="fa fa-trash"> Sil</i></a>@endif
                            </td>
                            </tr>
                           <?php endif ?>
                        @endforeach
                      
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Gönderen</th>
                        <th>Konu</th>
                        <th>Telefon</th>
                        <th>Mail</th>
                        <th>Gönderilme Tarihi</th> 
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