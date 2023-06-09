{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <x-validation-errors class="mb-4" />
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="login">
        <div class=" h-screen flex flex-col items-center justify-center">
            <h4 class="text-center text-4xl font-bold z-50 mb-10 text-pink-700"> FreeChat <br/><span class="text-sm leading-none text-white"> Connect with your friends </span></h4> 

            <div class="form w-96 h-auto p-10 bg-transparent shadow-xl opacity-100 bg-blend-overlay shadow-blue-400">
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
                      <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span  class="ml-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
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
</x-guest-layout>
