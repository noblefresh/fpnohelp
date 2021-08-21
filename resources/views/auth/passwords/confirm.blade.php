@extends('template.layouts')

@section('content')
<section class="hero-section dtr-py-8 hero-default-bg bg-blue color-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header text-dark">{{ __('Confirm Password') }}</div>
    
                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}
    
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
    
                            <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
    
                                <div class="col-md-12">
                                    <input id="password" type="password" class="name @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="dtr-btn-round dtr-btn-blue">
                                        {{ __('Confirm Password') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
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
</section>
@endsection
