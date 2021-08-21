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
            <div class="info-box mt-4">
              {{-- <span class="info-box-icon bg-info elevation-1 p-2">
              <img src="{{asset('images/icon.png')}}" class="brand-image img-circle bg-light elevation-3" style="opacity: .8">
              </span> --}}

              <div class="info-box-content">
                <span class="info-box-text">
                  {{ Auth::user()->department->department}} 
                  Last Year Past Questions</span>
                <span class="info-box-number">
                  <?php
                  // $year = date('Y');
                  // $ans = $year - 1;
                  // echo $ans;
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->
        
        <div class="row">
          @foreach ($myPQ as $PQ)
          <div class="col-6 col-sm-6 col-md-3">
            <div class="card shadow">
              @if($PQ->semester == '1')
              <small class=" badge badge-primary">First Semester ({{ $PQ->program }})</small>
              @else
              <small class=" badge badge-primary">Second Semester ({{ $PQ->program }})</small>
              @endif
              <div class="card-bod crd" style="position: relative;">
                <img src="{{asset('/storage/pastquestionImages/'.$PQ->image)}}" style="width:100%">
                <p class="badge badge-dark crd-img" style="">
                  CC: {{$PQ->coursecode}} 
                  @if ($PQ->page > 1)
                      Page {{ $PQ->page }}
                  @endif
                </p>
              </div>
              <div class="card-foote">
                <a href="{{url('/storage/pastquestionImages/'.$PQ->image)}}" download class="btn btn-primary w-100 shadow"><i class="fas fa-download"></i> Download</a>
              </div>
            </div>
          </div>
          @endforeach
            
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
@endsection
