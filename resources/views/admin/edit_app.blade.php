@extends('layouts.app')
@section('content')
@include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-4">
                        @foreach ($app as $item)
                        <form method="post" action="{{ url('/update_app/'.$item->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>App Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ $item->app_name }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>App Download Link</label>
                                            <input class="form-control" type="text" name="donwload_link" value="{{ $item->downloadlink }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>App Image</label>
                                            <input class="form-control" type="file" name="image" id="validatedCustomFile">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div style="">
                                                    <img class="d-block w-100" src="" id="img_preview">
                                                    <img class="card-img-top"
                                                        src="{{ asset('/storage/appimages/'.$item->image)}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update App</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection