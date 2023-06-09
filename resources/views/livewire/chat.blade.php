<div class="col-md-4  h-screen  border border-2 border-gray-100">
    <div class="chatbox">
        <div class="top-chat-header p-3 bg-blue-500 flex justify-evenly">
            <div class="img">
                @if(!Auth::user()->profile_photo_path)
                <img src="{{asset('user/profile/default_icon.png')}}" width="30px" heith="30px" />
                @else
                <img src="{{asset('user/user')}}/{{Auth::user()->profile_photo_path}}" width="30px" heith="30px" />
                @endif
            </div>
            <label class="block">
                <input type="search" placeholder="search users..." class=" px-4  py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" />
            </label>
            <i class="fa-thin fa-ellipsis-vertical"></i>
        </div>
            <div class="chat-body mt-4">
                @foreach(Auth::user()->friends as $user)
                 @if(Auth::user()->friends)
                 <a href={{route('chatbot',['receiver_id'=>$user->id])}}>
                  <div id='user' class="user-boot mt-2 shadow p-2 flex justify-evenly items-center shadow-sm">
                     @if($user->profile_photo_path)
                        <div class="img">
                            <img src="{{asset('user/user')}}/{{$user->profile_photo_path}}"  />
                        </div>
                        @else
                        <div class="img">
                            <img src="{{asset('user/profile/default_icon.png')}}"  />
                        </div>
                        @endif
                        <div class=" float-start w-3/4 flex flex-col ">
                            <h4 class="text-gray-600 ml-2 text-sm text-left font-bold font:san-serif"> {{$user->name}} </h4>
                            @if(Cache::has('is_online'. $user->id))
                            <span class="text-xs text-gray-500 ml-2"> online </span>
                            @else 
                            <span class="text-xs text-gray-500 ml-2"> {{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}} </span>
                            @endif
                        </div>
                        <span> ... </span>
                    </div>
                </a>
                @else
                    <p class="text-center text-gray-700 text-2xl"> You don't have any friends yet.</p>
                @endif
                @endforeach
            </div>
    </div>
    <div class="chat-footer">
</div>
</div>

@push('scripts')
<script type="text/javascript">
    $(function(){
    var htmlSTR = document.getElementById('input').value;
    var li = document.createElement('li');
    var text = li.innerHtml= htmlSTR;
    var $ul = $('#message');
    var $button = $('#button');

    $button.click(buttonClickHandler);

    function buttonClickHandler(){
        $ul.append(text);
    }})

    </script>

    @endpush