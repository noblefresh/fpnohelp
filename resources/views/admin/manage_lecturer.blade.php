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
                                <span class="info-box-text">Manage Lecturer</span>
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
                                    data-target="#addlecturerModal">ADD A LECTURER</button>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="container card shadow">
                            <div class="card-header">
                                Search Lecturer
                            </div>
                            <div class=" pt-3 pb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ url('/search_past_question') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <select class="form-control getDepartment" id="" name="faculty_id">
                                                            <option value="">Select Faculty</option>
                                                            <?php
                                                            use App\Models\faculty;
                                                            $getfaculty = faculty::orderBy('id', 'DESC')->get();
                                                            ?>
                                                            @foreach ($getfaculty as $faculty)
                                                                <option value="{{ $faculty->id }}">{{ $faculty->faculty }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <select class="form-control department" id="" name="deptid"
                                                            required>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary w-100">SEARCH</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-5">
                    @foreach ($lecturer as $item)
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile shadow activityiv">
                                <div class="text-center">

                                    <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('/storage/lecturerimages/'.$item->image)}}"
                                    alt="User profile picture" data-toggle="modal" data-target="#imageModal">
                                    
                                </div>

                                <h3 class="profile-username text-center">{{ $item->name }}</h3>

                                <p class="text-mute text-center text-dark">{{ $item->department->department }}</p>

                                <hr>
                                <div class="card-foote">
                                    <a href="{{ url('/edit-lecturer/'.$item->id) }}" class="btn btn-primary shadow" style="width: 50%">Edit</a>
                                    <a href="{{ url('/delete_lecturer/'.$item->id) }}" class="btn btn-danger shadow" style="width: 50%; float:right">Delete</a>
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
    <div class="modal fade" id="addlecturerModal" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="addlecturerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addpastquestionModalLabel">Add a Lecturer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('/save_lecturer') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Faculty</label>
                                    <select class="form-control getDepartment" id="" name="faculty_id">
                                        <option value="">Select Faculty</option>
                                        <?php
                                        // use App\Models\faculty;
                                        $getfaculty = faculty::orderBy('id', 'DESC')->get();
                                        ?>
                                        @foreach ($getfaculty as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->faculty }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control department" id="" name="deptid" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lecturer Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Eg. Mr. John Obi "
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lecturer Email</label>
                                    <input class="form-control" type="text" name="email" placeholder="Eg. john@gmail.com"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lecturer Image</label>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Education Qualification</label>
                                    <input class="form-control" type="text" name="education"
                                        placeholder="Eg, BsC in Computer Science ..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Office Location</label>
                                    <input class="form-control" type="text" name="location"
                                        placeholder="Eg. Oracle Lab, Complex Building" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Skills</label>
                                    <input class="form-control" type="text" name="skill"
                                        placeholder="Eg. Programming, Writting, Networking" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Note</label>
                                    <input class="form-control" type="text" name="note" max="200" placeholder="Optional">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Lecturer Description</label>
                                    <textarea class="form-control shadow" type="text" name="description" rows="5"
                                        id="summary-ckeditor" placeholder="Write a Brief info about the lecturer"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
