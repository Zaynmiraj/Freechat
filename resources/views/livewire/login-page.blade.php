<div class="login">
    <div class=" h-screen grid items-center justify-center">
        <div class="form w-96 h-auto p-10 bg-transparent shadow-xl opacity-100 bg-blend-overlay shadow-blue-400">
            <h4 class="text-center text-white text-2xl z-50 mb-10"> Please Login here</h4>
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-amber-50">
                      Email
                    </span>
                    <input name="email" required :value="old('email')" type="email" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com" />
                  </label>
                  <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-amber-50">
                      Password
                    </span>
                    <input type="password"  required name="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="*******" />
                  </label>
                  <label class="block mt-2"> 
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                  </label>
                  <div class="block">
                    <button class="round-none w-full bg-orange-500 text-white font-bold mt-5 p-2">Login</button>
                  </div>
                  <div class="flex justify-between mt-3">
                    <div class="flex-initial w-50 justify-start ">
                        <a href="{{route('signup')}}" class="decoration-none text-cyan-500 font-medium"> Create an account </a>
                    </div>
                    <div class="flex-initial w-50 justify-end">
                        <a href=""  class="decoration-none text-right text-red-400"> Forget Password </a>
                    </div>
                  </div>
            </form>
        </div>
    </div>
        
</div>
