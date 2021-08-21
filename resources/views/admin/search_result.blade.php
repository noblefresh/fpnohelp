@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        @if (count($pastquestions) < 1)
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
              <div class="text-center" style="margin-top: 70px">
                <h5>No Record Found! <i class="fas fa-exclamation-circle"></i></h5>
              </div>
            </div>
          </div>
        @else
        <div class="row">
            @foreach ($pastquestions as $pq)
            <div class="col-12 col-sm-6 col-md-3 pt-4">
                <div class="card shadow">
                  <span class=" badge badge-primary">{{$pq->department->department}} ({{$pq->year}}) ({{$pq->level}} L)</span>
                  <div class="card-body">
                    <img src="{{asset('/storage/pastquestionImages/'.$pq->image)}}" style="width:100%">
                    <span class="badge badge-dark">Course Code: {{$pq->coursecode}}</span>
                    
                    @if($pq->semester == '1')
                    <span class=" badge badge-primary">1st Semester</span>
                    @else
                    <span class=" badge badge-primary">2nd Semester</span>
                    @endif
                  </div>
                  <div class="card-foote">
                    <a href="{{url('/storage/pastquestionImages/'.$pq->image)}}" download class="btn btn-primary shadow" style="width: 50%">Download</a>
                    <a href="{{url('/deletepastquestion/'.$pq->id)}}" class="btn btn-danger shadow" style="width: 50%; float:right">Delete</a>
                  </div>
                </div>
            </div> 
            @endforeach
          </div>
      </div>
        @endif
    </section>
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')
@endsection
