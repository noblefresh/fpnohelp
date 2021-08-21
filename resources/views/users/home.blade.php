@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark" style="font-size: 1.3em">
              <?php
                  $year = date('Y');
                  $ans = $year - 1;
                  echo $ans;
                  ?>
                  Past Questions
            </h3>
            {{-- <hr class="w-20"> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

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
              <div class="card-bod crd">
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
