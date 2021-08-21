@extends('template.layouts')

@section('content')
<div class="d-flex justify-content-center align-items-center bg-primary cover">
    <div class="card shadow-lg p-2">
        <div class="m-2">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-body px-3 flex-column">
                <div class="text-center">
                    <img src="{{ asset('images/bot-pana.png') }}" class="w-50">
                    <div style="font-weight:700;font-size: 20px;color: rgb(143, 147, 150);">Verify Your Email Address <i class="fas fa-hand"></i></div>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }} 
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <br> <button type="submit" class="nput bg-primary py-2 w-100 mt-4 text-center shadow" style="color: azure;border: none;">{{ __('Click here to request another') }}</button>
                    </form>
                </div>
                {{-- <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
                    <i class="fa fa-user position-absolute mt-2 ml-2"></i>
                    <input type="email" id="email" class="w-100 py-1 name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">

                    @error('email')
                        <small class="invalid-feedback pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <button class="iput bg-primary py-2 w-100 mt-4 text-center shadow" style="color: azure;border: none;">
                   {{ __('Send Password Reset Link') }}
                </button> --}}
            </div>
        </form>
    </div>
</div>
{{-- 
<section class="hero-section dtr-py-8 hero-default-bg bg-blue color-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-light">
                    <div class="card-header text-dark">{{ __('Verify Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
