<div>
   <div class="header bg-gray-100 drop-shadow shadow-cyan-300">
        <nav class="container">
            <div class="nav navbar">
                <a href="{{route('newsfeed')}}" class="navbar-brand text-center text-cyan-600 font-bold text-2xl w-1/12" > FreeChat</a>
                <form class="w-3/12"> 
                    <label class="block">
                        <input type="search" required  name="password_confirmation" class=" px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Search" />
                      </label>
                </form>
                <div class="navbar-inner w-7/12">
                    <ul class="navbar sticky"> 
                        <div class=" flex w-2/3">
                            <li class='active text-center '><a href="" class="decoration-none text-primary nav-link"><i class="fa-solid text-3xl fa-house"></i> </a></li>
                            <li class='active text-center '><a href="" class="decoration-none text-primary nav-link"> <i class="fa-solid text-3xl fa-play"></i></a></li>
                            <li class='active text-center '><a href="" class="decoration-none text-primary nav-link"> <i class="fa-solid text-3xl fa-gamepad"></i></a></li>
                            <li class='active text-center '><a href="" class="decoration-none text-primary nav-link"> <i class="fa-regular text-3xl fa-bell"></i></a></li>
                        </div>
                            <li  class=' text-center items-center flex w-1/3 items-center dropdown text-cyan-600'>
                            <a  href="{{route('profile')}}"  >
                                @if(Auth::user()->profile_photo_path)
                                <div class="img"> <img class="rounded rounded-full" src="{{asset('user/user')}}/{{Auth::user()->profile_photo_path}}" /> </div>
                                @else
                                <div class="img"> <img class="rounded rounded-full" src="{{asset('user/profile/default_icon.png')}}" /> </div>
                                @endif
                            </a> 
                            <div id=" dropdown">
                                <p style="cursor: pointer" class="text-sm font-bold font-serif ml-2  dropdown-toggle" data-bs-toggle="dropdown" > {{Auth::user()->name}}</p>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Setting</a></li>
                                    <li><a class="dropdown-item" href="#">Update</a></li>
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit()">Log out</a></li>
                                    </form>
                                </ul>
                             </div>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
   </div> 
   <div class="main bg-gray-100  pt-3">
    <div class="">
        <div class="row ">
            @livewire('chat')
            <div class="col-md-5">
                <label class="block">
                    <input type="text" class="mt-1 mb-2 px-3 py-4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="What's on your mind"  data-bs-toggle="modal" data-bs-target="#postmodal"/>
                </label>
                @foreach( $posts as $post)
                <div class="block-post mt-2 border p-3 ">
                    <div class="user-header">
                        <div class="flex items-center ">
                            <a href="{{route('viewprofile',['profile_id'=>$post->user->id])}}">
                                <div class=" flex w-1/3 justify-start">
                                    @if($post->user->profile_photo_path)
                                    <img class="rounded img rounded-full" src="{{asset('user/user')}}/{{$post->user->profile_photo_path}}" /> 
                                    @else
                                    <img class="rounded img rounded-full" src="{{asset('user/profile/default_icon.png')}}" /> 
                                    @endif
                                    <div class="flex flex-col items-start  ml-3">
                                    <a href="{{route('viewprofile',['profile_id'=>$post->user->id])}}" class=" text-dark text-lg " > {{$post->user->name}}</a>
                                    <span class="text-xs text-gray-4">{{$post->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </a>
                                <span class="text-2xl w-2/3 text-right float-end text-gray-500"> ... </span>
                        </div>
                    </div>
                    <div class="user-post p-3 mt-4">
                        <div class="block">
                            <p class="text-left text-gray-500 text-sm mb-3"> {{$post->post_title}} </p>
                            @if($post->post_image)
                           <a href="{{route('photo',['photo_id'=>$post->id])}}"> <img src="{{asset('user/user/post')}}/{{$post->post_image}}" alt="" width="100%" height="auto" /> </a>
                            @endif
                        </div>
                    </div>
                    <div class="user-result mt-3 block-post  ">
                        <div class="block">
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
                            
                            <div class="block flex justify-evenly border-top mt-1 border-bottom p-2">
                                <span  class="text-{{$post->hasLike(Auth::user()->id, $post->id) ? 'primary' : 'dark' }} " >@if($post->like->count() > 1) {{$post->like->count()}} others like  @elseif($post->hasLike(Auth::user()->id, $post->id)) You liked {{$post->like->count()}} @else{{$post->like->count()}} like @endif </span>
                                <a href="{{route('viewpost',['post_id'=>$post->id])}}" > <span  style="cursor: pointer;" class="text-gray-500"><i  class="fa fa-comment"></i> {{$post->comments->count()}} </span> </a>
                                <span class="text-gray-500"> 5 shares</span>
                            </div>
                        </div>
                    </div>
                    {{-- <div wire:ignore  class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Comments</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body  ">
                                
                          </div>
                        </div>
                      </div>
                    </div> --}}
                </div>
                @endforeach
            </div>
            <div class="col-md-3 flex justify-center">
                @livewire('friend-list')
            </div>
        </div>
    </div>
   </div>
   <!-- Modal -->
<div wire:ignore class="modal fade" id="postmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">What's on your mind</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="AddStatus">
            <div class="modal-body">
            <form > 
                <label class="block">
                    <textarea wire:model="status" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Say something for your friends"> </textarea>
                </label>
                <label class="block mt-2">
                    <div class=" dz-default dz-message">
                        <span class="text-info">Photo </span>
                        <input type="file" style="visibility:collapse"  wire:model="image" id="input-file-now" class="file-upload" />
                    </div>
                </label>
            </div>
            <div class="modal-footer">
            {{-- <button type="button" class=" btn text-white  ring ring-color-white bg-red-400" data-bs-dismiss="modal">Cencel</button> --}}
            <button class=" btn text-white w-full  ring ring-color-white bg-cyan-700">Post</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script>


    function comment(id){
        $.get('/comment/'+id,function(comment){
            $('#postid').val(comment.id);
        });
    }


</script>
@endpush