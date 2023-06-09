<div>
    @if($post->post_image)
    <div class="row ">
        <div class="col-9 h-screen">
            <img class="h-screen" src="{{asset('user/user/post')}}/{{$post->post_image}}" alt="" width="100%" height="100%" />
        </div>
        <div class="col-3 pt-2">
            <div class="user-info flex items-center">
                <div class="img">
                    @if($post->user->profile_photo_path)
                    <img src="{{asset('user/user')}}/{{$post->user->profile_photo_path}}" alt=""  />
                    @else 
                    <img src="{{asset('user/profile/default_icon.png')}}" alt="" />
                    @endif
                </div>
                <p class="text-dark text-sm font-bold ml-3">{{$post->user->name}}</p>
            </div>
            <div class="post-body w-full p-4 border-bottom">
                <p class="text-left text-gray-600">{{$post->post_title}}</p>
            </div>
            <div class="flex w-full justify-content-evenly border-top border-bottom p-2">
                @if($post->hasLike(Auth::user()->id, $post->id))
                <i  class="fa-solid btn text-primary fa-thumbs-up" wire:click.prevent="dislike({{$post->id}},{{Auth::user()->id}})"></i>
                @else
                <i class="fa-solid btn text-dark fa-thumbs-up" wire:click.prevent="like({{$post->id}})"></i>
                @endif
               
            <div class="flex flex-col justify-center items-center"  x-data="{ open: false }">
                <i style="cursor:pointer"  @click="open = true" onclick="comment({{$post->id}})"  class="fa-regular fa-comment"></i>
                <form  wire:submit.prevent="MakeComment({{$post->id}})"   x-show="open" @click.outside="open = false" class="commentForm"> 
                    <label class="block w-full">
                        @csrf
                        <input wire:model="post_id" type="hidden"  name="postid"  id="postid" />
                        <input type="text" name="usercomment" wire:model="comment" id="usercomment" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Leave a comment" />
                    </label>
                    {{-- <label class="block mt-2">
                        <div class="file-upload-wrapper">
                            <input type="file" wire:model="image" id="input-file-now" class="file-upload" />
                        </div>
                        <div class="file-upload-wrapper">
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" width="100px" height="100px" alt="" />
                            @endif
                        </div>
                    </label> --}}
                    <div class="modal-footer">
                        {{-- <button type="button" class=" btn text-white  ring ring-color-white bg-red-400" data-bs-dismiss="modal">Cencel</button> --}}
                        <button class=" mt-2 btn text-white w-full  ring ring-color-white bg-cyan-700">POST COMMENT</button>
                    </div>
                </form>
            </div>
            <i class="fa-solid fa-share"></i>
        </div>
        <div class="block flex justify-evenly mt-1 border-bottom p-2">
            <span  class="text-{{$post->hasLike(Auth::user()->id, $post->id) ? 'primary' : 'dark' }} " >@if($post->hasLike(Auth::user()->id, $post->id) && $post->like->count() === 1) You liked @elseif($post->hasLike(Auth::user()->id, $post->id) && $post->like->count() >1) You {{$post->like->count()}} others @elseif($post->like->count() <2) {{$post->like->count()}} like  @endif </span>
            <span  style="cursor: pointer;" class="text-gray-500"><i  class="fa fa-comment"></i> {{$post->comments->count()}} </span>
            <span class="text-gray-500"> 5 shares</span>
        </div>
        @foreach($post->comments as $comment)
        <div class="user-info border-bottom p-3">
            <div class="user-profile flex items-center">
                <div class="img">
                    @if($comment->user->profile_photo_path)
                    <img src="{{asset('user/user')}}/{{$comment->user->profile_photo_path}}" alt=""  />
                    @else 
                    <img src="{{asset('user/profile/default_icon.png')}}" alt="" />
                    @endif
                </div>
                <div class=" ml-3 flex items-start flex-col">
                    <p class=" text-sm text-left"> {{$comment->user->name}}</p>
                    <span class="text-xs"> {{$comment->created_at->diffForHumans()}}</span>
                </div>
            </div>
            <div class="comments p-2 ml-3">
                <p class="text-sm text-gray-500"> {{$comment->comment}} </p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="container p-4 shadow h-screen ">
        <div class="info  flex items-center">
            <div class="img">
                @if(!$post->user->profile_photo_path)
                <img src="{{asset('user/profile/default_icon.png')}}" alt/>
                @else
                <img src="{{asset('user/user')}}/{{$post->user->profile_photo_path}}" />
                @endif
            </div>
            <div class="user-profile ml-3 flex flex-col items-center">
                <p class="text-sm font-bold text-gray-700 "> {{$post->user->name}}</p>
                <span class="text-xs text-gray-400">{{$post->created_at->diffForHumans()}}</span>
            </div>
        </div>
        <div class="post-area ">
            <div class="post p-3 h-2/4 ">
                <p class="text-sm text-gray-600"> {{$post->post_title}}</p>
            </div>
            <div class="flex w-full justify-content-evenly border-top border-bottom p-2">
                @if($post->hasLike(Auth::user()->id, $post->id))
                <i  class="fa-solid btn text-primary fa-thumbs-up" wire:click.prevent="dislike({{$post->id}},{{Auth::user()->id}})"></i>
                @else
                <i class="fa-solid btn text-dark fa-thumbs-up" wire:click.prevent="like({{$post->id}})"></i>
                @endif
               
            <div class="flex flex-col justify-center items-center"  x-data="{ open: false }">
                <i style="cursor:pointer"  @click="open = true" onclick="comment({{$post->id}})"  class="fa-regular fa-comment"></i>
                <form  wire:submit.prevent="MakeComment({{$post->id}})"   x-show="open" @click.outside="open = false" class="commentForm"> 
                    <label class="block w-full">
                        @csrf
                        <input wire:model="post_id" type="hidden"  name="postid"  id="postid" />
                        <input type="text" name="usercomment" wire:model="comment" id="usercomment" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Leave a comment" />
                    </label>
                    {{-- <label class="block mt-2">
                        <div class="file-upload-wrapper">
                            <input type="file" wire:model="image" id="input-file-now" class="file-upload" />
                        </div>
                        <div class="file-upload-wrapper">
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" width="100px" height="100px" alt="" />
                            @endif
                        </div>
                    </label> --}}
                    <div class="modal-footer">
                        {{-- <button type="button" class=" btn text-white  ring ring-color-white bg-red-400" data-bs-dismiss="modal">Cencel</button> --}}
                        <button class=" mt-2 btn text-white w-full  ring ring-color-white bg-cyan-700">POST COMMENT</button>
                    </div>
                </form>
            </div>
            <i class="fa-solid fa-share"></i>
        </div>
        <div class="block flex justify-evenly mt-1 border-bottom p-2">
            <span  class="text-{{$post->hasLike(Auth::user()->id, $post->id) ? 'primary' : 'dark' }} " >@if($post->hasLike(Auth::user()->id, $post->id) && $post->like->count() === 1) You liked @elseif($post->hasLike(Auth::user()->id, $post->id) && $post->like->count() >1) You {{$post->like->count()}} others @elseif($post->like->count() <2) {{$post->like->count()}} like  @endif </span>
            <span  style="cursor: pointer;" class="text-gray-500"><i  class="fa fa-comment"></i> {{$post->comments->count()}} </span>
            <span class="text-gray-500"> 5 shares</span>
        </div>
        @foreach($post->comments as $comment)
        <div class="user-info border-bottom p-3">
            <div class="user-profile flex items-center">
                <div class="img">
                    <img src="{{asset('user/user')}}/{{$comment->user->profile_photo_path}}" alt/>
                </div>
                <p class="ml-3"> {{$comment->user->name}}</p>
            </div>
            <div class="comments p-4">
                <p> {{$comment->comment}} </p>
            </div>
        </div>
        @endforeach
        </div>
    @endif

</div>
