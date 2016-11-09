<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Gönderilen Mesajlar</h3>
      <div class="box-tools pull-right">
        <div class="has-feedback">
          <input type="text" class="form-control input-sm" placeholder="Search Mail">
          <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-controls">
        <!-- Check all button -->
        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
        <div class="btn-group">
          <button class="btn btn-default btn-sm" onclick="deleteCheckedSentMessages()"><i class="fa fa-trash-o"></i></button>
          <button class="btn btn-default btn-sm" onclick="draftCheckedMessages()"><i class="fa fa-file-text-o"></i></button>
        </div><!-- /.btn-group -->
        <button class="btn btn-default btn-sm" onclick="loadSupportPage('sent')"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
          1-50/200
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
          </div><!-- /.btn-group -->
        </div><!-- /.pull-right -->
      </div>
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <tbody>
            @foreach($messages as $message)
            <tr>
              <td><input name="items[]" type="checkbox" value="{{ $message->id }}"></td>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name"><a href="#" onclick="loadSentMessagePage('{{ $message->id }}')">{{ $message->userName }}</a></td>
                <td class="mailbox-subject">{{ $message->title }}</td>
              <td class="mailbox-attachment"></td>
              <td class="mailbox-date">{{ $message->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table><!-- /.table -->
      </div><!-- /.mail-box-messages -->
    </div><!-- /.box-body -->
    <div class="box-footer no-padding">
      <div class="mailbox-controls">
        <!-- Check all button -->
        <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
        <div class="btn-group">
          <button class="btn btn-default btn-sm" onclick="deleteCheckedSentMessages()"><i class="fa fa-trash-o"></i></button>
          <button class="btn btn-default btn-sm" onclick="junkCheckedMessages()"><i class="fa fa-file-text-o"></i></button>
        </div><!-- /.btn-group -->
        <button class="btn btn-default btn-sm" onclick="loadSupportPage('sent')"><i class="fa fa-refresh"></i></button>
        <div class="pull-right">
          1-50/200
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
          </div><!-- /.btn-group -->
        </div><!-- /.pull-right -->
      </div>
    </div>
  </div><!-- /. box -->
</div>

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
