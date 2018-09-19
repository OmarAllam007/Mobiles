<div class="form-group">
    <input class="form-control" name="name" placeholder="{{t('Name')}}">
</div>
<div class="form-group">
    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"
              placeholder="{{t('Enter your comment')}}"></textarea>
</div>
<button class="btn btn-success">{{t('Post')}}</button>

@php
    $ip = $_SERVER['REMOTE_ADDR'];
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
     dump($details);
@endphp