@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mt-4">
                        @foreach ($message as $item)
                        <form action="{{ url('/update_bot_unknown_message/'.$item->id) }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>Update Bot Message</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <input class="form-control" name="question" value="{{ $item->question }}" required>
                                                <input type="hidden" name="userid" value="{{ $item->userid }}">
                                                <input type="hidden" name="useremail" value="{{ $item->useremail }}">
                                                <input type="hidden" name="username" value="{{ $item->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Reply</label>
                                                <input class="form-control" name="answer" placeholder="Write a response" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="float: right">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

   
@endsection