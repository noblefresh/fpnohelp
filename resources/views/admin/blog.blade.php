@extends('layouts.app')

@section('content')
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
              <img src="{{asset('images/icon.png')}}" class="brand-image img-circle bg-light elevation-3" style="opacity: .8">
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Past Questions</span>
                <span class="info-box-number">
                <?php
                // $totalPQ = count($pastquestions);
                // echo $totalPQ;
                ?>
                 AVAILABLE
                </span>
              </div>

              <div class="info-box-content">
                <button class="btn btn-warning shadow" type="button" data-toggle="modal" data-target="#addpostModal">ADD BLOG POST</button>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->
        
        <div class="row">
            @foreach ($blog as $post)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow">
                  <img class="card-img-top" src="{{asset('/storage/postImages/'.$post->image)}}" style="width:100%">
                  <div class="card-bdy ">
                    <h5 class="text-center">{{$post->title}}</h5><br>
                    <p class="card-text badge badge-dark">Author: {{$post->author}}</p>
                  </div>
                  <div class="card-foote">
                    <a href="{{url('/viewpost/'.$post->id)}}" class="btn btn-primary shadow" style="width: 50%">View</a>
                    <a href="{{url('/deletepost/'.$post->id)}}" class="btn btn-danger shadow" style="width: 50%; float:right">Delete</a>
                  </div>
                </div>
            </div> 
            @endforeach
          </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
@endsection
