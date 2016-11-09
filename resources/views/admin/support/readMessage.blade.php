<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Mail Oku</h3>
      <div class="box-tools pull-right">
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
        <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
      </div>
    </div><!-- /.box-header -->
    @foreach($message as $val)
    <div class="box-body no-padding">
      <div class="mailbox-read-info">
        <h3>{{ $val->title }}</h3>
        <h5>Gönderen: {{ $val->userMail }} <span class="mailbox-read-time pull-right">{{ $val->created_at }}</span></h5>
      </div><!-- /.mailbox-read-info -->
      <div class="mailbox-controls with-border text-center">
        <div class="btn-group">
          <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
          <a href="#" onclick="replyMessage('{{ $val->id }}')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></a>
          <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
        </div><!-- /.btn-group -->
        <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
      </div><!-- /.mailbox-controls -->
      <div class="mailbox-read-message">
        {{ $val->description }}
      </div><!-- /.mailbox-read-message -->
    </div><!-- /.box-body -->

    
    @endforeach
    <div class="box-footer">
      <ul class="mailbox-attachments clearfix">
        <li>
        </li>
      </ul>
    </div><!-- /.box-footer -->
    <div class="box-footer">
      <div class="pull-right">
        <a href="#" class="btn btn-default"><i class="fa fa-reply"></i> Cevapla</a>
      </div>
      <a href="/admin/supports/deleteMessage" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</a>
      <button class="btn btn-default"><i class="fa fa-print"></i> Yazdır</button>
      <a href="/admin/supports/deleteMessage" onclick="replyMessage('{{ $val->id }}')" class="btn btn-default"><i class="fa fa-filter"></i> Önemsiz olarak işaretle</a>
    </div><!-- /.box-footer -->
  
  </div><!-- /. box -->
</div><!-- /.col -->