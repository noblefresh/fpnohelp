@extends('layouts.app')
@section('content')
    @include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-5">
                    @foreach ($faculty as $item)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box activityDiv shadow">
                            <div class="inner">
                                <h3>{{ $item->faculty }}</h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <a href="{{url('/lecturer-department/'.$item->id)}}" class="small-box-footer bg-primary">View Departments <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
