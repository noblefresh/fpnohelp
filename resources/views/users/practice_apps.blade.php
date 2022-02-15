@extends('layouts.app')
@section('content')
    @include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-5">
                    @foreach ($practiceapp as $item)
                    <div class="col-lg-3 col-6">
                        <div class="card shadow">
                            <img class="card-img-top"
                                src="{{ asset('/storage/appimages/'.$item->image)}}"
                                style="width:100%">
                            <div class="card-body">
                                <a href="">
                                    <h5 class="text-center">{{ $item->app_name }}</h5>
                                </a>
                               
                                <span><a class="btn btn-primary w-100"
                                        href="{{ $item->downloadlink }}"
                                        style="color:rgb(255, 255, 255);">Download</a></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
