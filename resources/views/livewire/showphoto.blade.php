<div>
    @if($post)
    <img src="{{asset('user/user/post')}}/{{$post->post_image}}" width="100%" height="auto">
    @endif
    @if($message)
    <img src="{{asset('user/user/message')}}/{{$message->img}}" width="100%" height="auto">
    @endif
</div>
