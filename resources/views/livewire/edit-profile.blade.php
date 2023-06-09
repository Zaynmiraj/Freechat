<div class="container">
    <div class="header ">
        <div class="cover mb-6">
            <i class="fa-solid fa-camera text-gray-500" data-bs-toggle="modal" data-bs-target="#coverphoto"></i>
            <img src="{{asset('user/user/cover-photo')}}/{{Auth::user()->info->cover}}" />
        </div>
        <div class="profile-info flex justify-center flex-col border-bottom pb-3  divide-y divide-slate-700">
            <div class="profile-photos flex  justify-evenly ">
                <div class="profile-photo">
                    
                      <img src="{{asset('user/user')}}/{{Auth::user()->profile_photo_path}}" data-bs-toggle="modal" data-bs-target="#profilephoto" class="rounded-full ring ring-8 ring-orange-500"alt="">
                </div>
                <div class="profile-detail ml-4 w-2/4">
                    <p class="text-gray-600 mt-2 text-2xl font-bold"> {{Auth::user()->name}} </p>
                    <span class="text-sm text-gray-400" > {{$follower}} followers </span> | <span class="text-sm text-gray-400" > {{$follow}} following </span>
                    
                </div>
                <nav class="navbar navbar-expand-lg float-end">
                    <ul class=" navbar-nav">
                        <li class="nav-item m-2"><a href="nav-link font-bold"> Edit</a></li>
                        <li class="nav-item m-2"><a href="nav-link font-bold"> View tools</a></li>
                        <li class="nav-item m-2"><a href="nav-link font-bold"> Promote profile</a></li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>
    <div class="profile-content border-bottom">
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
    <div class="information">
        <div class="info">
            <table class="table ">
                <div class="flex  flex-row justify-between">
                    <div class="tables">
                        <tr class="">
                            <td>Name </td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td>Phone </td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td>Works at </td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td> Study at school </td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td>Study at Collage </td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                    </div>
                    <div class="">
                        <tr class="">
                            <td> What's your dagree </td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td><i class="fa-brands fa-linkedin mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i> linkedin@</td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td><i class="fa-brands fa-linkedin mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i> linkedin@</td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td><i class="fa-brands fa-linkedin mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i> linkedin@</td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td><i class="fa-brands fa-linkedin mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i> linkedin@</td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                        <tr class="">
                            <td><i class="fa-brands fa-linkedin mr-2 text-2xl ring ring-white rounded rounded-full  bg-blue-400 text-white"></i> linkedin@</td>
                            <td class="w-3/4"><input type="search" required  name="password_confirmation" class="mt-1 px-3 py-2 w-3/4 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md sm:text-sm focus:ring-1" placeholder="Full Name" /></td>
                        </tr>
                    </div>
                </div>
            </table>
        </div>
    </div>
</div>
