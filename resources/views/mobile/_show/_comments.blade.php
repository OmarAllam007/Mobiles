@php
    $comments = $mobile->comments()->orderBy('created_at','DESC')->get()->each(function ($comment){
            $comment['username'] = $comment->user_id  ? $comment->user->name : $comment->name;
            $comment['created'] = $comment->created_at->diffForHumans();
    });

@endphp

<comments :comments="{{$comments}}" :mobile_id="{{$mobile->id}}"
          @if(Auth::check()) :auth="{{\Auth::id()}}" @else :auth="0" @endif
            :t="{{json_encode(\App\Translation::getCommentComponent())}}"

></comments>
@php

@endphp

