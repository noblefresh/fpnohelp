@extends('template.layouts')

@section('content')
<div class="d-flex justify-content-center align-items-center bg-primary cover">
    <div class="card shadow-lg p-2">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-body px-3 flex-column">
                <div class="text-center">
                    <img src="{{ asset('images/bot-pana.png') }}" class="w-50">
                    <div style="font-weight:700;font-size: 30px;color: rgb(143, 147, 150);">Welcome Back <i class="fas fa-hand"></i></div>
                    <p class="px-4" style="font-size: 13px;color: rgb(193, 196, 199);">Take another academic enlightenment journey</p>
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
                <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
                    <i class="fa fa-lock position-absolute mt-2 ml-2"></i>
                    <i class="far fa-eye position-absolute mt-2 eye d-none shw"></i>
                    <i class="far fa-eye-slash position-absolute mt-2 eye d-none shw1"></i>
                    <input type="password" id="password" class="w-100 py-1 password showname @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <small class="invalid-feedback pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="text-right mt-3">
                    <a href="{{ route('password.request') }}" style="font-weight: 700;">forgotten password?</a>
                </div>
                <button class="iput bg-primary py-2 w-100 mt-4 text-center shadow" style="color: azure;border: none;">
                    LOGIN
                </button>
                <div class="text-center py-2" style="text-decoration: underline;">
                    Not a member? <a href="{{ route('register') }}">signup here</a> 
                </div>
            </div>
        </form>
    </div>
</div>

{{-- <section class="hero-section dtr-py-8 hero-default-bg bg-blue color-white" style="height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header text-dark">{{ __('Login') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
    
                                <div class="col-md-12">
                                    <input id="email" type="email" class="name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
    
                                    @error('email')
                                        <small class="invalid-feedback pl-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-md-12">
                                    <input id="password" type="password" class="name @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    
                                    @error('password')
                                        <small class="invalid-feedback pl-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
    
                           
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="dtr-btn-round dtr-btn-blue">
                                        {{ __('Login') }}
                                    </button>
     
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<script>
    $('.eye').on('click',function () {
        $('.eye').toggleClass('d-none');
        if($('.password').attr('type') == 'password'){
            $('.password').attr('type','text')
        }else{
            $('.password').attr('type','password')
        }
    })
    $('.show').on('keyup',function () {
        if($(this).val() != ''){ 
            if($('.shw1').css('display') == 'none'){
                $('.shw').removeClass('d-none')
            }
        }else{
            $('.shw').addClass('d-none')
            $('.shw1').addClass('d-none')
            $(this).attr('type','password')
        }
    })
</script>
@endsection
