<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Görüşme</h3>
    </div>
    <div class="col-md-12" style="background-color:#CCC;border: 5px solid #ccc;">
    	@foreach($firstMessage as $message)
            <div class="col-md-12 padding-temizle">
                <div class="box box-primary" style="width: 100%; border-top: 10px solid #C43E27;">
                    <div class="box-header with-border">
                      <h3 class="box-title">İlk Mail</h3><br>
                      <h3 class="box-title">{{ $message->title }}</h3>
                    </div>
                    <div class="box-body no-padding">
                      <div class="mailbox-read-info">
         				<h5>From: {{ $message->userName }} <span class="mailbox-read-time pull-right">{{ $message->created_at }}</span></h5>
                      </div>
                      <div class="mailbox-read-message">
                        {{ $message->description }}
                      </div>
                    </div>
                </div>
            </div>
        @endforeach
        <?php if (!empty($conversations)) 
        {
        ?> 
        @foreach($conversations as $message)
            @if($message->sender_id == $user=Auth::user()->id )
                <div class="col-md-12 padding-temizle">
                  <div class="box box-primary" style="border-top: 10px solid #008d4c;">
                    <div class="box-header with-border">
                      <h3 class="box-title">Giden Mail</h3>
                    </div>
                    <div class="box-body no-padding">
                      <div class="mailbox-read-info">
         				<h5>From: {{ $user=Auth::user()->name }} <span class="mailbox-read-time pull-right">{{ $message->created_at }}</span></h5>
                      </div>
                      <div class="mailbox-read-message">
                        {{ $message->description }}
                      </div>
                    </div>
                  </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="box box-primary" style="border-top: 10px solid #3c8dbc;">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gelen Mail</h3>
                        </div>
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
            					<h5>From: {{ $message->userName }} <span class="mailbox-read-time pull-right">{{ $message->created_at }}</span></h5>
                            </div>
                            <div class="mailbox-read-message">
                                {{ $message->description }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <?php } ?>
    </div>

    <div class="box-body">
    <div class="box-header with-border">
      <h3 class="box-title">Cevap Mesajı Gönder</h3>
    </div><!-- /.box-header -->
    <form action="/admin/supports/send-reply" method="post" >
      {!! csrf_field() !!}
      <input type="hidden" name="sender_id"  value="{{$user=Auth::user()->id}} ">
      <input type="hidden" name="message_id"  value="{{$firstMessage[0]->id}} ">
      <input type="hidden" name="receiver_id"  value="{{$firstMessage[0]->userId}} ">
      <input type="hidden" name="title"  value="{{$firstMessage[0]->title}} ">

      <div class="form-group">
        <textarea placeholder="Mesajınızı buraya giriniz" id="compose-textarea" name="replyDescription" class="form-control" style="height: 300px">
        </textarea>
      </div>
      <div class="form-group">
        <div class="btn btn-default btn-file">
          <i class="fa fa-paperclip"></i> Ek
          <input type="file" name="attachment">
        </div>
        <p class="help-block">Max. 32MB</p>
      </div>
      <div class="box-footer">
        <div class="pull-right">
          <button class="btn btn-default"><i class="fa fa-pencil" onclick="doDraft('{{ $firstMessage[0]->id }}')"></i> Taslak</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
        </div>
      </div><!-- /.box-footer -->
    </form>
    </div><!-- /.box-body -->
      <button class="btn btn-default"><i class="fa fa-times"></i> Çıkar</button>
  </div><!-- /. box -->
</div><!-- /.col -->