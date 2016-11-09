<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Gelen Kutusu</h3>
      <div class="box-tools pull-right">
        <div class="has-feedback">
          <input id="searchedKeyword" type="text" class="form-control input-sm" placeholder="Search Mail">
          <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-controls">
        <!-- Check all button -->
        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
        <div class="btn-group">
          @if($deleg['d']==1)<button onclick="deleteCheckedMessages()" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>@endif
          @if($deleg['u']==1)<button onclick="junkCheckedMessages()" class="btn btn-default btn-sm"><i class="fa fa-filter"></i></button>@endif
          <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
          <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
        </div><!-- /.btn-group -->
        <button onclick="loadSupportPage('inbox')" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
          1-{{$count["inbox"]}}/{{$count["inbox"]}}
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
          </div><!-- /.btn-group -->
        </div><!-- /.pull-right -->
      </div>
      <div class="table-responsive mailbox-messages">
        <div id="tableContent">
          <table class="table table-hover table-striped">
            <tbody>
              @foreach($messages as $message)
                <tr class="<?php if($message->read_option == 0) echo 'newMessage'; ?>">
                  <td><input type="checkbox" name="items[]" value="{{ $message->id }}"></td>
                  <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                  <td class="mailbox-name"><a href="#" onclick="loadMessagePage('{{ $message->id }}')">{{ $message->userName }}</a></td>
                  <td class="mailbox-subject">{{ $message->title }}</td>
                  <td class="mailbox-attachment"></td>
                  <td class="mailbox-date">{{ $message->created_at }}</td>
                  <td class="mailbox-name"><a href="#" onclick="replyMessage('{{ $message->id }}')" class="btn btn-xs bg-navy btn-flat">Konuşmayı Gör</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        <!-- /.table -->
      </div><!-- /.mail-box-messages -->
    </div><!-- /.box-body -->
    <div class="box-footer no-padding">
      <div class="mailbox-controls">
        <!-- Check all button -->
        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
        <div class="btn-group">
          <button onclick="deleteCheckedMessages()" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
          <button onclick="junkCheckedMessages()" class="btn btn-default btn-sm"><i class="fa fa-filter"></i></button>
          <button onclick="loadSupportPage('reply')" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
        </div><!-- /.btn-group -->
        <button onclick="loadSupportPage('inbox')" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
          1-{{$count["inbox"]}}/{{$count["inbox"]}}
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
          </div><!-- /.btn-group -->
        </div><!-- /.pull-right -->
      </div>
    </div>
  </div><!-- /. box -->
</div><!-- /.col -->
<!-- MAILBOX -->
<script type="text/javascript">
   
   $('#searchedKeyword').keyup(function () {
       keyword= $("#searchedKeyword").val();
       if(keyword=="")
          keyword="*";
      $('#tableContent').load("/admin/supports/searchedMail/"+keyword, 
        function() 
        {}
    );
   });
   $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");
      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }
      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });

   $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>