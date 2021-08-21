@extends('layouts.app')
@section('content')
@include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-4 text-center order-sm-1 mt-lg-5">
                        <img src="{{ asset('images/mobile-app.png') }}" style="width: 200px">
                    </div>
                    <div class="col-md-6 order-sm-2">
                        <div class="mobile-app-content p-3">
                            <h1><strong>You can grab it right now</strong></h1>
                            <p>Make it more easy for you</p>
                            <div class="text-center">
                                <a href="" class="d-inline pr-1">
                                    <img src="{{ asset('images/playstore.png') }}" style="width: 45%">
                                </a>
                                <a href="" class="d-inline pl-1">
                                    <img src="{{ asset('images/appstore.png') }}" style="width: 45%">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection