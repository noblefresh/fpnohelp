@extends('layouts.app')
@section('content')
@include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-4" >
                        <div class="info-box mt-4 shadow">
              
                            <div class="info-box-content">
                              <div class="form-group">
                                  <input type="text" name="searchBotBrain" class="form-control" id="searchBotBrain" placeholder="Search Bot Brain with a Question">
                              </div>
                            </div>
              
                            <div class="info-box-content">
                            <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#trainBotModal">Train Bot <i class="fas fa-robot"></i></button>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                        {{-- <div class="info-box align-right"> --}}
                            {{-- <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#trainBotModal">Train Bot <i class="fas fa-robot"></i></button> --}}
                        {{-- </div> --}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mt-4">
                        <ul class="list-group" id="botBrainMessage">
                            <li class="list-group-item active">Bot Brain Message</li>
                            @foreach ($botbrain as $item)
                            <li class="list-group-item ">
                                <span class="bg-secondary p-1  rounded">{{ $item->question }}</span><br>
                                <span class="bg-primary p-1 rounded mt-2" style="float: right">{{ $item->answer }}</span><br>
                                <p style="" class="mt-4 mb-0 text-center">
                                    <a href="{{url('/edit_bot_message/'.$item->id)}}" class="mr-2"> <i class="fas fa-edit text-dark"></i></a>
                                    <a href="{{url('/delete_bot_message/'.$item->id)}}" class="ml-2"> <i class="fas fa-trash text-danger"></i></a>
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-6 mt-4">
                        <ul class="list-group">
                            <li class="list-group-item active">Unknown Messages</li>
                            @foreach ($unknown as $item)
                            <li class="list-group-item ">
                                <span class="bg-secondary p-1  rounded">{{ $item->question }}</span>
                                <span style="float:right" class="mt-4 mb-0 text-ceter">
                                    <a href="{{url('/reply_bot_unknown_message/'.$item->id)}}" class="mr-2"> <i class="fas fa-reply text-dark"></i></a>
                                    {{-- <a href="{{url('/delete_bot_message/'.$item->id)}}" class="ml-2"> <i class="fas fa-trash text-danger"></i></a> --}}
                                </span>
                            </li>
                            @endforeach
                        </ul>
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