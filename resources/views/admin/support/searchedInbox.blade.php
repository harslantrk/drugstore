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
      </tr>
    @endforeach
  </tbody>
</table>