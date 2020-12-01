@foreach ($chat as $row)
    <div @if($row->sender == Session::get('user-login')->id_user) class="bubble-chat right" style="float: right;" @else class="bubble-chat left" style="float: left;" @endif>
        {{ $row->pesan }}
    </div>
    <div style="clear: both;"></div>
@endforeach
