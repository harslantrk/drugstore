@extends('admin.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
        <small>{{ $count["newMessage"] }} okunmamış mesaj</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Gelen Kutusu</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          @if($deleg['a']==1)
          <a href="#" onclick="loadSupportPage('compose')" class="btn btn-primary btn-block margin-bottom">Yeni Mesaj</a>
          @endif
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#inbox" onclick="loadSupportPage('inbox')"><i class="fa fa-inbox"></i> Gelen Kutusu <span class="label label-primary pull-right">{{ $count["newMessage"] }}</span></a></li>
                <li><a href="#sents" onclick="loadSupportPage('sents')"><i class="fa fa-envelope-o"></i> Gönderilenler<span class="label label-primary pull-right">{{ $count["Sent"] }}</span></a></li>
                <li><a href="#drafts" onclick="loadSupportPage('drafts')"><i class="fa fa-file-text-o"></i> Taslaklar<span class="label label-primary pull-right">{{ $count["Draft"] }}</span></a></li>
                <li><a href="#junks" onclick="loadSupportPage('junks')"><i class="fa fa-filter"></i> Önemsiz<span class="label label-warning pull-right">{{ $count["Junk"] }}</span></a></li>
                <li><a href="#trashes" onclick="loadSupportPage('trashes')"><i class="fa fa-trash-o"></i> Çöp Kutusu<span class="label label-primary pull-right">{{ $count["Trash"] }}</span></a></li>
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labeller</h3>
              <div class="box-tools">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Önemli</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promosyonlar</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9" id="supportPage"></div>
      </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->
  <script type="text/javascript">
          loadSupportPage('inbox');

        </script>
@endsection

