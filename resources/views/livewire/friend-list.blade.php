<div class="w-full">
    <div class="w-full  shadow-sm shadow p-2">
        @foreach($addfriend as $friend)
        <div class="chat-body mt-4">
            <div class="user-boot mt-2  flex justify-evenly items-center">
                <div class="img">
                    @if($friend->profile_photo_path)
                 <img src="{{asset('user/user')}}/{{$friend->profile_photo_path}}" />
                 @else
                 <img src="{{asset('user/profile/default_icon.png')}}" />
                    @endif
                </div>
                <h6 class="text-gray-700 text-sm w-2/3 font-bold"> {{$friend->name}} </h6>
            </div>
            <div class="btn-group flex justify-between mt-3">
                <a href="{{route('viewprofile',['profile_id'=>$friend->id])}}" class="btn m-2 btn-primary btn-sm"> View profile </a>
                <a href="#"  wire:click.prevent="getAddFriend({{$friend->id}})" class="btn m-2 btn-primary btn-sm"> follow </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

