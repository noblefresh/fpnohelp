@extends('template.layouts')
@section('content')

<div class="d-flex justify-content-center align-items-center bg-primary cover">
    <div class="card shadow-lg p-2">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card-body px-3 flex-column">
                <div class="text-center">
                    <img src="{{ asset('images/bot-pana.png') }}" class="w-50">
                    <div style="font-weight:700; font-size: 30px; color: rgb(143, 147, 150);">Get Started</div>
                    {{-- <p class="px-4" style="font-size: 13px;color: rgb(193, 196, 199);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus minus dolor</p> --}}
                </div>
                <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
                    <i class="fa fa-user position-absolute mt-2 ml-2"></i>
                    <input type="text" id="name" class="w-100 py-1 name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Fullname">
                    @error('name')
                        <small class="invalid-feedback pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
                    <i class="fa fa-user position-absolute mt-2 ml-2"></i>
                    <input type="text" id="email" class="w-100 py-1 name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">
                    @error('email')
                        <small class="invalid-feedback pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
                    <i class="fa fa-lock position-absolute mt-2 ml-2"></i>
                    <span class="far fa-eye position-absolute mt-2 shn eye d-none"></span>
                    <span class="far fa-eye-slash position-absolute shn1 mt-2 eye d-none"></span>
                    <input type="password" id="password" class="w-100 py-1 password show1 name @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                        <small class="invalid-feedback pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="input py-2 w-100 my-2 my-sm-3 position-relative shadow-sm">
                    <i class="fa fa-lock position-absolute mt-2 ml-2"></i>
                    <span class="far fa-eye shw position-absolute mt-2 eye d-none"></span>
                    <span class="far fa-eye-slash shw1 position-absolute mt-2 eye d-none"></span>
                    <input type="password" class="w-100 py-1 password show name" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <button class="nput bg-primary py-2 w-100 mt-4 text-center shadow" style="color: azure;border: none;">
                    REGISTER
                </button>
                <div class="text-center py-2" style="text-decoration: underline;">
                    Already have an account? <a href="{{ route('login') }}">Login here</a> 
                </div>
            </div>
        </form>
    </div>
</div>

{{-- <section class="hero-section pt-5 hero-default-bg bg-blue shadow color-white" style="height: 100vh">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header text-dark">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Fullname">
    
                                    @error('name')
                                        <span class="invalid-feedback pl-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-md-12">
                                    <input id="email" type="email" class="name @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">
    
                                    @error('email')
                                        <span class="invalid-feedback pl-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-md-12">
                                    <input id="password" type="password" class="name @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback pl-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
    
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="name" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="dtr-btn-round dtr-btn-blue w-100">
                                        {{ __('Register') }}
                                    </button>
                                    <span class="text-dark">Already a user? <a href="{{route('login')}}" class="text-primary">Login</a></span>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    
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
        $(this).siblings('span').toggleClass('d-none');
        $(this).toggleClass('d-none');
        if($(this).siblings('input').attr('type') == 'password'){
            $(this).siblings('input').attr('type','text')
        }else{
            $(this).siblings('input').attr('type','password')
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
    $('.show1').on('keyup',function () {
        if($(this).val() != ''){ 
            if($('.shn1').css('display') == 'none'){
                $('.shn').removeClass('d-none')
            }
        }else{
            $('.shn').addClass('d-none')
            $('.shn1').addClass('d-none')
            $(this).attr('type','password')
        }
    })
</script>
@endsection
