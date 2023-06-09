<div>
    <div class="container">
        <div class="header ">
            <div class="cover mb-6">
                <i class="fa-solid fa-camera text-gray-500" data-bs-toggle="modal" data-bs-target="#coverphoto"></i>
                @if(Auth::user()->info->cover)
                <img src="{{asset('user/user/cover-photo')}}/{{Auth::user()->info->cover}}" />
                @else
                <img src="{{asset('user/profile/default_cover.jpg')}}" />
                @endif
            </div>
            <div class="profile-info p-3 flex justify-center flex-col border-bottom pb-3  divide-y divide-slate-700">
                <div class="profile-photos flex  justify-evenly ">
                    <div class="profile-photo">
                        @if(Auth::user()->profile_photo_path)
                          <img src="{{asset('user/user')}}/{{Auth::user()->profile_photo_path}}" data-bs-toggle="modal" data-bs-target="#profilephoto" class="rounded-full ring ring-8 ring-orange-500"alt="">
                          @else
                          <img src="{{asset('user/profile/default_icon.png')}}" data-bs-toggle="modal" data-bs-target="#profilephoto" class="rounded-full ring ring-8 ring-orange-500"alt="">
                        @endif
                    </div>
                    <div class="profile-detail ml-4 w-2/4">
                        <p class="text-gray-600 mt-2 text-2xl font-bold"> {{Auth::user()->name}} </p>
                        <span class="text-sm text-gray-400" > {{$follower}} followers </span> | <span class="text-sm text-gray-400" > {{$follow}} following </span>
                        
                    </div>
                    <nav class="navbar navbar-expand-lg float-end">
                        <ul class=" navbar-nav">
                            <li class="nav-item m-2"><a href="{{route('editprofile',['profiles_id'=>Auth::user()->id])}}" class="nav-link font-bold"> Edit</a></li>
                            <li class="nav-item m-2"><a href="" class="nav-link font-bold"> View tools</a></li>
                            <li class="nav-item m-2"><a href="" class="nav-link font-bold"> Promote profile</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
        </div>
        <div class="profile-content p-3 mt-3 mb-3 border-bottom">
            <nav class="navbar-expand-lg flex justify-between">
                <ul class=" navbar-nav ">
                    <li class="active nav-links mr-4"><a href="" class="nav-link">Post </a></li>
                    <li class="active nav-links mr-4"><a href="" class="nav-link">Photos </a></li>
                    <li class="active nav-links mr-4"><a href="" class="nav-link">Videos </a></li>
                    <li class="active nav-links mr-4"><a href="" class="nav-link">About </a></li>
                </ul>
                <span class="align-right text-2xl font-bold"> ... </span>
            </nav>
        </div>
        <div class="profile-body p-3 pb-8 mt-3">
            <div class="row">
                <div class="col-md-5">
                    <div class="line-group flex items-center mb-2">
                        <i class="fa-solid bg-blue-400 text-2xl ring ring-white rounded rounded-full mr-2 text-white fa-briefcase"></i>
                        <h4 class="font-bold mr-2">Works at :</h4>
                        <span class="text-sm"> Facebook developer </span>
                    </div>
                    <div class="line-group flex items-center mb-2">
                        <i class="fa-solid bg-blue-400 text-2xl ring ring-white rounded rounded-full mr-2 text-white fa-briefcase"></i>
                        <h4 class="font-bold mr-2"> Study at school :</h4>
                        <span class="text-sm"> Mendotory high school </span>
                    </div>
                    <div class="line-group flex items-center mb-2">
                        <i class="fa-solid bg-blue-400 text-2xl ring ring-white rounded rounded-full mr-2 text-white fa-briefcase"></i>
                        <h4 class="font-bold mr-2">Study at collage :</h4>
                        <span class="text-sm"> Athens school & collage </span>
                    </div>
                    <div class="line-group flex items-center mb-2">
                        <i class="fa-solid bg-blue-400 text-2xl ring ring-white rounded rounded-full mr-2 text-white fa-briefcase"></i>
                        <h4 class="font-bold mr-2">Dagree :</h4>
                        <span class="text-sm"> Computer science </span>
                    </div>
                    <div class="line-group flex items-center">
                        <i class="fa-brands fa-facebook mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i>
                        <span class="text-sm"> Facebook developer </span>
                    </div>
                    <div class="line-group flex items-center">
                        <i class="fa-brands fa-instagram mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i>
                        <span class="text-sm"> Facebook developer </span>
                    </div>
                    <div class="line-group flex items-center">
                        <i class="fa-brands fa-twitter mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i>
                        <span class="text-sm"> Facebook developer </span>
                    </div>
                    <div class="line-group flex items-center">
                        <i class="fa-brands fa-linkedin mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i>
                        <span class="text-sm"> Facebook developer </span>
                    </div>
                    <button class="btn bg-gray-300 text-blue-400 mt-3 w-full"> Edit details </button>
                    <div class="photos pt-3">
                        <h3 class="font-bold text-gray-700 text-2xl pb-2"> Photos</h3>
                        <div class="row">
                            @foreach(Auth::user()->posts as $photo)
                            @if($photo->post_image)
                            <div class="flex w-1/3">
                                <img src="{{asset('user/user/post')}}/{{$photo->post_image}}" width="100%" height="100%"/>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="friends mt-3">
                        <h3 class="font-bold text-gray-700 text-2xl pb-2"> Friends</h3>
                        <div class="friends-list row">
                            @foreach(Auth::user()->friends as $friend)
                            <a href="{{route('viewprofile',['profile_id'=>$friend->id])}}"> 
                                <div class="flex flex-column mb-2  m-2  p-3 shadow w-1/3">
                                    @if($friend->profile_photo_path)
                                    <img src="{{asset('user/user')}}/{{$friend->profile_photo_path}}" class="rounded rounded-full" width="100%" height="100" />
                                    @else
                                    <img src="{{asset('user/profile/default_icon.png')}}" class="rounded rounded-full" width="100%" height="100" />
                                    @endif
                                    <h5 class="text-gray-500 text-sm mt-2 text-center font-serif font-bold">{{$friend->name}}</h5>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7 ">
                    <div class="posts  border p-3">
                        @foreach($posts as $post)
                        @if($post)
                        <div class="block-post  mt-2 p-3">
                            <div class="user-header">
                                <div class="flex justify-between items-center ">
                                    <div class=" flex">
                                        <a href="/profile" class="decoration-none  mr-3 nav-link"> 
                                            @if($user->profile_photo_path)
                                            <img class="rounded rounded-full" src="{{asset('user/user')}}/{{Auth::user()->profile_photo_path}}" width="40px" height="40px" /> 
                                            @else 
                                            <img class="rounded rounded-full" src="{{asset('user/profile/default_icon.png')}}" width="40px" height="40px" /> 
                                            @endif
                                        </a>
                                        <div class="data flex flex-col items-center">
                                            <a href="" class=" text-dark text-lg " > {{Auth::user()->name}} </a>
                                            <span class="text-gray-400 text-xs"> {{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div id=" dropdown">
                                        <p style="cursor: pointer; margin-top:-20px" class="text-2xl font-bold font-serif  dropdown-toggle" data-bs-toggle="dropdown" ></p>
                                        <ul class="dropdown-menu">
                                            <li class="shadow"><a class="dropdown-item" href="">Edit post</a></li>
                                            <li class="shadow"><a class="dropdown-item" href="#">Hide post</a></li>
                                            <li class="shadow"  onclick="return confirm('Are you sure?')"><a class="dropdown-item" wire:click.prevent="deletepost({{$post->id}})" href="#">delete</a></li>

                                        </ul>
                                     </div>

                                </div>
                            </div>
                            <div class="user-post  mt-4">
                                <div class="block">
                                    <p class="text-left text-gray-500 text-sm mb-3"> {{$post->post_title}}</p>
                                    @if($post->post_image)
                                    <img class="rounded rounded-full" src="{{asset('user/user/post')}}/{{$post->post_image}}" width="100%" height="auto" /> 
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
                        </div>
                        @else 
                        <p class="text-danger">No posted yet </p>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <div wire:ignore class="modal  fade" id="profilephoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form  wire:submit.prevent="ProfilePhotoUpdate()">
          <div class="modal-content">
            <div class="modal-body">
                @if($errors->has('image'))
                <span> {{ $errors->first('image') }}</span>
                @endif
                <label class="block mt-2">
                    <div class="file-upload-wrapper">
                        <input type="file" wire:model="image" id="input-file-now" class="file-upload" />
                      </div>
                </label>
                {{-- <label class="block">
                    @if($image)
                            <img src="{{$image->temporaryUrl()}}" class="img" width="100px" height="100px">
                     @endif
                </label> --}}
                </div>
                <button class=" btn text-white  ring ring-color-white bg-cyan-700">Post</button>
             </form>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top:200px !important" wire:ignore class="modal  fade" id="coverphoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form  wire:submit.prevent="CoverPhotoUpdate()">
          <div class="modal-content">
            <div class="modal-body">
                @if($errors->has('image'))
                <span> {{ $errors->first('image') }}</span>
                @endif
                <label class="block mt-2">
                    <div class="file-upload-wrapper">
                        <input type="file" wire:model="cover" id="image" class="file-upload" />
                      </div>
                </label>
                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload" src=""
                        alt="Select an image" style="max-height: 250px;">
                </div>
                </div>
                <button class=" btn text-white  ring ring-color-white bg-cyan-700">Post</button>
             </form>
          </div>
        </div>
      </div>
    </div>
    
</div>

@push('scripts')
<script type="text/javascript">
      
    $(document).ready(function (e) {
     
       
       $('#image').change(function(){
                
        let reader = new FileReader();
     
        reader.onload = (e) => { 
     
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
     
        reader.readAsDataURL(this.files[0]); 
       
       });
       
    });
     
    </script>
    @endpush

