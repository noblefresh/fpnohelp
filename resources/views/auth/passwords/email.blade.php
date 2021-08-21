@extends('template.layouts')

@section('content')
<div class="d-flex justify-content-center align-items-center bg-primary cover">
    <div class="card shadow-lg p-2">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-body px-3 flex-column">
                <div class="text-center">
                    <img src="{{ asset('images/bot-pana.png') }}" class="w-50">
                    <div style="font-weight:700;font-size: 30px;color: rgb(143, 147, 150);">Reset Password <i class="fas fa-hand"></i></div>
                </div>
                <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
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
                </button>
            </div>
        </form>
    </div>
</div>


{{-- <section class="hero-section dtr-py-8 hero-default-bg bg-blue color-white" style="height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header text-dark">{{ __('Reset Password') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group row">
    
                                <div class="col-md-12">
                                    <input id="email" type="email" class="name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="dtr-btn-round dtr-btn-blue w-100">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
