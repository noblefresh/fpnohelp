@extends('layouts.app')
@section('content')
@include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-4">
                        @foreach ($lecturer as $item)
                        <form method="post" action="{{ url('/update_lecturer/'.$item->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lecturer Name</label>
                                                <input class="form-control" type="text" name="name" value="{{ $item->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lecturer Email</label>
                                                <input class="form-control" type="text" name="email" value="{{ $item->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lecturer Image</label>
                                                <input class="form-control" type="file" name="image" id="validatedCustomFile">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div style="">
                                                        <img class="d-block w-100" src="" id="img_preview">
                                                        <img class="profile-user-img img-fluid img-circle"
                                                        src="{{ asset('/storage/lecturerimages/'.$item->image)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Education Qualification</label>
                                                <input class="form-control" type="text" name="education"
                                                    value="{{ $item->education }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Office Location</label>
                                                <input class="form-control" type="text" name="location"
                                                    value="{{ $item->location }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Skills</label>
                                                <input class="form-control" type="text" name="skill"
                                                    value="{{ $item->skill }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Note</label>
                                                <input class="form-control" type="text" name="note" max="200" value="{{ $item->note }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Lecturer Description</label>
                                                <textarea class="form-control shadow" type="text" name="description" rows="5"
                                                    id="summary-ckeditor" required>{{ $item->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update Info</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection