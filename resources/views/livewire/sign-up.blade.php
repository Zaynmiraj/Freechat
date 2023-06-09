<div class="login">
    <div class=" h-screen grid items-center justify-center">
        <div class="form w-96 h-auto p-10 bg-transparent shadow-xl opacity-100 bg-blend-overlay shadow-blue-400">
          <h4 class="text-center text-4xl font-bold z-50 mb-10 text-pink-700"> FreeChat <br/><span class="text-sm leading-none text-white"> Connect with your friends </span></h4> 
          <form  method="POST" action="{{ route('register') }}">
                @csrf
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-amber-50">
                      Full name
                    </span>
                    <input name="name" :value="old('name')" type="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Write your name" />
                  </label>
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
                    <input type="password" required  name="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder='password' />
                  </label>
                  <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-amber-50">
                      Confirm Password
                    </span>
                    <input type="password" required  name="password_confirmation" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Confirm password" />
                  </label>
                  <label class="block mt-2"> 
                    @if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
                  </label>
                  <div class="block">
                    <button class="round-none w-full bg-orange-500 text-white font-bold mt-5 p-2 rounded">Sign Up</button>
                  </div>
                  <div class=" mt-3 w-full">
                        <a href="{{route('login')}}" class="decoration-none text-center text-cyan-500 w-full font-medium"> Already registered </a>
                  </div>
            </form>
        </div>
    </div>
        
</div>
