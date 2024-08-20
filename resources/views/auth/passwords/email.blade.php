@extends('layouts.app')

@section('content')
<div class="flex justify-center container">
            <div class="card">
                <div class="p-4 card-header flex justify-center text-5xl" style="font-family: Sacramento, sans-serif;">{{ __('reset password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}"  class="flex flex-col gap-4">
                        @csrf

                        <div class="w-full flex flex-col">
                            <label for="email" class="w-full text-center">{{ __('Email Address') }}</label>

                            
                                <input id="email" type="email" class="accent-[#e8a2a2] form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="w-full">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="w-full border rounded border-black p-1 hover:border-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white transition-all duration-300">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
