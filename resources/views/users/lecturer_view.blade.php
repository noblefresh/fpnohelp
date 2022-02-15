@extends('layouts.app')
@section('content')
    @include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @foreach ($lecturer as $item)
                <div class="row pt-4">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('/storage/lecturerimages/'.$item->image)}}"
                                        alt="User profile">
                                </div>

                                <h3 class="profile-username text-center">{{ $item->name }}</h3>

                                <p class="text-muted text-center">{{ $item->department->department }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">{{ $item->followers }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">0</a>
                                    </li>
                                </ul>
                                @foreach ($follower as $follow)
                                    @if (Auth()->user()->id.$item->id != $follow->join_id)
                                        <a href="{{ url('/follow/'.$item->id) }}" class="btn btn-primary btn-block"><b>Follow</b></a>
                                    @else
                                        <a href="{{ url('/unfollow/'.$item->id) }}" class="btn btn-primary btn-block"><b>Unfollow</b></a>
                                    @endif
                                @endforeach
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    {{ $item->education }}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Office Location</strong>

                                <p class="text-muted">{{ $item->location }}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">{{ $item->skill }}</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">{{ $item->note }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">About</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#timeline"
                                            data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                            data-toggle="tab">Settings</a></li> --}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('/storage/lecturerimages/'.$item->image)}}" alt="user image">
                                                <span class="username">
                                                    <a href="#">Brief Description</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Textbook published reference</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                {!! $item->description !!}
                                            </p>

                                            <p>
                                                {{-- <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                                    Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span> --}}
                                            </p>
                                        </div>
                                        <!-- /.post -->


                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('/images/logo.png')}}" alt="User Image">
                                                <span class="username">
                                                    <a href="#">FPNO HELP</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="{{ asset('images/pic1.jpg') }}" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="{{ asset('images/pic2.jpg') }}"
                                                                alt="Photo">
                                                            <img class="img-fluid" src="{{ asset('images/pic4.jpg') }}"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="{{ asset('images/pic7.jpg') }}"
                                                                alt="Photo">
                                                            <img class="img-fluid" src="{{ asset('images/slide-2.jpg') }}"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            {{-- <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                                    Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p> --}}
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                @endforeach
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
