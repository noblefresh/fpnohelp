@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row pt-3 justify-content-end">
          <div class="col-md-12">
            {{-- <button class="btn btn-primary shadow" style="float: right" data-toggle="modal" data-target="#addpostModal">Write a Post</button> --}}
          </div>
        </div>
        <div class="row pt-3">
            @if (count($blog) < 1)
              <div class="col-12 col-sm-12 col-md-12">
                <div class="text-center" style="margin-top: 70px">
                <h5>Comming soon! <i class="fas fa-exclamation-circle"></i></h5>
                </div>
              </div>
            @else
            @foreach ($blog as $post)
              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card shadow">
                    <img class="card-img-top" src="{{asset('/storage/postImages/'.$post->image)}}" style="width:100%">
                    <div class="card-body text-centr">
                      <a href="{{url('/viewpost/'.$post->id)}}">
                        <h5 class="text-center">{{$post->title}}</h5>
                      </a>
                      <?php
                          $string = $post->content;
                          if (strlen($string) > 150) {
                              $stringCut = substr($string, 0, 200);
                              $endPoint = strrpos($stringCut,'');
                              $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                          }
                      ?>
                      <span>{!!$string!!}... <a href="{{url('/viewpost/'.$post->id)}}" style="color:rgb(182, 178, 178)">read more</a></span>
                    </div>
                  </div>
              </div> 
            @endforeach
            @endif
          </div>
      </div>
    </section>
  </div>

  @include('layouts.footer')
@endsection
