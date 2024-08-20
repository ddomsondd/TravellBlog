@extends('layouts.app')

@section('content')
<div class="flex justify-center container">
            <div class="card">
                <div class="p-4 card-header flex justify-center text-5xl" style="font-family: Sacramento, sans-serif;">{{ __('register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                        @csrf

                        <div class="w-full flex flex-col">
                            <label for="name" class="w-full text-center">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="accent-[#e8a2a2] form-control @error('name') width-auto is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="email" class="w-full text-center">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="accent-[#e8a2a2] form-control @error('email') width-auto is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="password" class="w-full text-center">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="accent-[#e8a2a2] form-control width-auto @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <br>
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="password-confirm" class="w-full text-center">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="accent-[#e8a2a2] form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="w-full flex flex-col">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="w-full text-center btn btn-primary border rounded border-black p-1 hover:border-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white transition-all duration-300">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
