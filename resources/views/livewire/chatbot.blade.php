<div class="">
    <div class="chatbot border h-screen pt-10  ">
        <div class="chatbot-header flex items-center shadow shadow-sm">
            <i class="fa-solid fa-angle-left w-2/8"></i>
            <div class="w-full flex items-center">
                 <div class="w-15">
                    <div class="img">
                        @if($user->profile_photo_path)
                        <img src="{{asset('user/user')}}/{{$user->profile_photo_path}}" alt="" />
                        @else
                        <img src="{{asset('user/profile/default_icon.png')}}" alt="" />
                        @endif
                    </div>
                 </div>
                <div class=" w-3/5 flex flex-col ml-3  float-left">
                    <h4 class="text-gray-600 ml-2 text-sm font-bold font:san-serif"> {{$user->name}} </h4>
                    @if(Cache::has('is_online'. $user->id))
                    <span class="text-xs ml-2 text-gray-500"> online </span>
                    @else
                    <span class="text-xs ml-2 text-gray-500"> {{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}} </span>
                    @endif
                </div>
                <div class="callside w-1/5 float-end">
                    <i class="fa-solid fa-phone"></i>
                    <i class="fa-solid fa-video"></i>
                </div>
            </div>
        </div>
        <div class="chatbot-body   flex flex-col justify-center  items-center  mt-3 h-5/6">
                <div class="chatboard  w-2/3 h-4/5" wire:poll>
                        <ul>
                        @if($messages)
                        @foreach($messages as $message)
                        @if($message->sender_id ==  Auth::user()->id)
                        <li class="sender active text-right flex items-end flex-col text-lg">
                           <p> {{$message->message}}</p>
                            @if($message->img)
                            <a href="{{route('photo',['photo_id'=> $message->id])}}"><img class="float-end text-right" src="{{asset('user/user/message')}}/{{$message->img}}" width="100px" height="auto" /> </a>
                            @endif
                            <span class="text-xs mt-1"> {{$message->created_at->diffForHumans()}}
                        </li>
                        @elseif($message->receiver_id == Auth::user()->id)
                        <li class="receiver active text-lg">
                            {{$message->message}} <br/>
                            @if($message->img)
                            <img class="" src="{{asset('user/user/message')}}/{{$message->img}}" width="100px" height="auto" />
                            @endif
                            <span class="text-xs mt-1"> {{$message->created_at->diffForHumans()}}
                        </li>
                        @endif
                        @endforeach
                        @else
                        <span class="text-center text-sm text-gray-600"> No messages Your message will be apeare here </span>
                        @endif
                        </ul>
                        
                </div>
                <div class="chatbot-send w-2/3">
                    <form wire:submit.prevent="sendMessage()" class="flex justify-between">
                        <input type="hidden" wire:model="receiver_id" $user->
                        <div class="input"> 
                            <input type="text" id="input" wire:model.defer="message" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Type something">
                            <i class="fa-solid fa-upload">
                                <input type="file" style="opacity:0" wire:model="img" />
                            </i>
                        </div>

                    <button id="button" class="btn text-4xl"><i class="fa-solid fa-square-arrow-up-right"></i></button>
                    </form>
                </div>
                
        </div>
        
    </div>
</div>