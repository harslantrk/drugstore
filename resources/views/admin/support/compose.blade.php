<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Yeni Mesaj Oluştur</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <form action="/admin/supports/send-message" method="post" >
      {!! csrf_field() !!}
      <div class="form-group">
        <select class="form-control" name="receiver_id" placeholder="Kime:">
        @foreach($users as $user)
        	<option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
      </div>
      <input type="hidden" name="sender_id" value="{{$user=Auth::user()->id}} ">
      <div class="form-group">
        <input class="form-control" name="title" placeholder="Konu:">
      </div>
      <div class="form-group">
        <textarea placeholder="Mesajınızı buraya giriniz" id="compose-textarea" name="description" class="form-control" style="height: 300px">
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
          <button class="btn btn-default"><i class="fa fa-pencil"></i> Taslak</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
        </div>
      </div><!-- /.box-footer -->
    </form>
    </div><!-- /.box-body -->
      <button class="btn btn-default"><i class="fa fa-times"></i> Çıkar</button>
  </div><!-- /. box -->
</div><!-- /.col -->