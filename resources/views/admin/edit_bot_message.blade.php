@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mt-4">
                        @foreach ($message as $item)
                        <form action="{{ url('/update_bot_message/'.$item->id) }}" method="post">
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
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Answer</label>
                                                <input class="form-control" name="answer" value="{{ $item->answer }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="float: right">Update</button>
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

    <!-- Modal -->
    <div class="modal fade mt-5 pt-6" id="trainBotModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="trainBotModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="trainBotModalLabel">TRAIN BOT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="post" action="{{url('/save_bot_training')}}">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Question</label>
                            <input class="form-control" name="question" placeholder="Enter question" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Answer</label>
                            <input class="form-control" name="answer" placeholder="Your answer here" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection