@extends('layouts.app')

@section('content')

<div class="flex justify-center container">
    <div class="card">
        <div class="p-4 card-header flex justify-center text-5xl" style="font-family: Sacramento, sans-serif;">{{ __('login') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                @csrf
                <div class="w-full flex flex-col">
                    <label for="email" class="w-full text-center">{{ __('Email Address')}}</label>
                    <input id="email" type="email" class="accent-[#e8a2a2] form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <!-- pokombinowac z errorami bo sa dziwne ale to na potem  -->
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="password" class="w-full text-center">{{ __('Password')}}</label>
                    <input id="password" type="password" class="accent-[#e8a2a2] form-control @error('email') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                    @error('password')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="w-full flex justify-center gap-2">
                    <input type="checkbox" class="accent-[#e8a2a2]" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="w-full">
                    <button type="submit"class="w-full border rounded border-black p-1 hover:border-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white transition-all duration-300">{{ __('Login') }}</button>
                    <br>
                    <br>
                    @if (Route::has('password.request'))
                    <a class="border rounded border-black p-2 hover:border-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white transition-all duration-300"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
