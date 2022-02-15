@extends('layouts.app')

@section('content')
    @include('layouts.topnav')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="info-box mt-4 shadow">
                            <span class="info-box-icon bg-info elevation-1 p-2">
                                <img src="{{ asset('images/icon.png') }}" class="brand-image img-circle bg-light elevation-3"
                                    style="opacity: .8">
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Manage Apps</span>
                                <span class="info-box-number">
                                    <?php
                                    // $totalPQ = count($pastquestions);
                                    // echo $totalPQ;
                                    ?>
                                    AVAILABLE
                                </span>
                            </div>

                            <div class="info-box-content">
                                <button class="btn btn-warning shadow" type="button" data-toggle="modal"
                                    data-target="#addappModal">ADD APP</button>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row pt-5">
                    @foreach ($practiceapp as $item)
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile shadow activityiv">
                                <div class="text-center">

                                    <img class="card-img-top"
                                    src="{{ asset('/storage/appimages/'.$item->image)}}"
                                    alt="User profile picture" data-toggle="modal" data-target="#imageModal">
                                    
                                </div>

                                <h3 class="profile-username text-center">{{ $item->app_name }}</h3>

                                {{-- <p class="text-mute text-center text-dark">{{ $item->}}</p> --}}

                                <hr>
                                <div class="card-foote">
                                    <a href="{{ url('/edit_app/'.$item->id) }}" class="btn btn-primary shadow" style="width: 50%">Edit</a>
                                    <a href="{{ url('/delete_app/'.$item->id) }}" class="btn btn-danger shadow" style="width: 50%; float:right">Delete</a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="addappModal" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="addappModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addpastquestionModalLabel">Add App</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('/save_app') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>App Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Eg. Visual Basic 6.0"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>App Download Link</label>
                                    <input class="form-control" type="text" name="donwload_link" placeholder="Eg. https://example.com/hsjkaauidks"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>App Image</label>
                                    <input class="form-control" type="file" name="image" id="validatedCustomFile"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="">
                                            <img class="d-block w-100" src="" id="img_preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save App</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
