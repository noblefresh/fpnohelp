@extends('layouts.app')
@section('content')
    @include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-5">
                    @foreach ($lecturers as $item)
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile shadow activityiv">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('/storage/lecturerimages/'.$item->image)}}">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $item->name }}</h3>

                                    <p class="text-mute text-center text-dark">{{ $item->department->department }}</p>

                                    <hr>
                                    <a class="btn btn-primary w-100" href="{{url('/lecturer-view/'.$item->id)}}"><b>View Info</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
