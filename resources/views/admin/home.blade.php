@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                @if (Auth::user()->level == 2)
                Base Admin Dashboard
                @elseif(Auth::user()->level > 2)
                Super Admin Dashboard 
                @endif
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mb-4">
            <a href="{{route('allusers')}}" class="quickLinkBtn shadow">Users</a>
            <a href="{{route('addfaculty')}}" class="quickLinkBtn shadow">Add Dept.</a>
            <a href="{{route('addpastquestion')}}" class="quickLinkBtn shadow">Add PQ</a>
            <a href="{{route('alldonation')}}" class="quickLinkBtn shadow">Donations</a>
            <a href="{{route('manageblog')}}" class="quickLinkBtn shadow">Blog</a>
            <a href="{{route('bottraining')}}" class="quickLinkBtn shadow">Smart Bot</a>
            <a href="{{route('imagebox')}}" class="quickLinkBtn shadow">Image Box</a>
            <a href="" class="quickLinkBtn shadow">Users</a>
            <a href="{{route('allpqsubscribed')}}" class="quickLinkBtn shadow">Subscription</a>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box activityDiv shadow" >
                <div class="inner">
                    <?php
                    use App\Models\blog;
                    use App\Models\user;
                    $getUsers = user::all();
                    $countTotal = count($getUsers);
                    ?>
                    <h3>{{$countTotal}}</h3>
    
                  <p>Total Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="{{route('allusers')}}" class="small-box-footer bg-primary">View User <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box activityDiv shadow">
                <div class="inner">
                  <?php
                  use App\Models\pastquestion;
                  $getPQ = pastquestion::all();
                  $countPQ = count($getPQ);
                  ?>
                  <h3>{{$countPQ}}</h3>
    
                  <p>Total Past Question</p>
                </div>
                <div class="icon">
                  <i class="fas fa-copy"></i>
                </div>
                <a href="{{route('addpastquestion')}}" class="small-box-footer bg-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box activityDiv shadow">
                <div class="inner">
                  <?php
                    use App\Models\department;
                    $getTotalDepartment = department::all();
                    $countdata = count($getTotalDepartment)
                  ?> 
                  <h3>{{$countdata}}</h3>
    
                  <p>Available Departments</p>
                </div>
                <div class="icon">
                  <i class="fas fa-building"></i>
                </div>
                <a href="{{route('addfaculty')}}" class="small-box-footer bg-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box activityDiv shadow">
                <div class="inner">
                  <?php
                  use App\Models\user_access;
                  $getSubscribed = user_access::all();
                  $countSubscribed = count($getSubscribed);
                  ?>
                  <h3>{{$countSubscribed}}</h3>
    
                  <p>Total P-Q Subscription</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <a href="{{route('allpqsubscribed')}}" class="small-box-footer bg-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="row">
            <div class="col-md-12">
                <?php
                $pastquestions = pastquestion::where('userid',Auth()->user()->id)->orderBy('id','DESC')->get();
                ?>
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="card-title">
                            <strong>Recent PQ I Added</strong>
                        </div>
                        <div class="card-tools">
                            <span style="float:right">
                                <a href="{{ route('addpastquestion') }}" class="btn btn-primary shadow">MORE</a>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- past question col -->
                            @foreach ($pastquestions as $pq)
                              <div class="col-12 col-sm-6 col-md-3">
                                  <div class="card shadow">
                                    <span class=" badge badge-primary">{{$pq->department->department}} ({{$pq->year}}) ({{$pq->level}} L)</span>
                                    <div class="card-body">
                                      <img src="{{asset('/storage/pastquestionImages/'.$pq->image)}}" style="width:100%">
                                      <span class="badge badge-dark">
                                        CC: {{$pq->coursecode}} 
                                        @if ($pq->page > 1)
                                            Page {{ $pq->page }}
                                        @endif
                                      </span>
                                      
                                      @if($pq->semester == '1')
                                      <span class=" badge badge-primary">1st Semester</span>
                                      @else
                                      <span class=" badge badge-primary">2nd Semester</span>
                                      @endif
                                    </div>
                                    <div class="card-foote">
                                      <a href="{{url('/storage/pastquestionImages/'.$pq->image)}}" download class="btn btn-primary shadow" style="width: 100%">Download</a>
                                    </div>
                                  </div>
                              </div> 
                            @endforeach
                        </div>
                    </div>
                    <div class="card-fooer">
                      <a href="{{ route('addpastquestion') }}" class="btn btn-primary w-100 shadow unlock">SEE MORE</a>
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-12">
              <?php
              $blog = blog::orderBy('id','DESC')->limit(4)->get();
              ?>
              <div class="card mt-4">
                  <div class="card-header">
                      <div class="card-title">
                          <strong>Recent Blog Post</strong>
                      </div>
                      <div class="card-tools">
                          <span style="float:right">
                              <a href="{{ route('manageblog') }}" class="btn btn-primary shadow">MORE</a>
                          </span>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <!-- past question col -->
                          @foreach ($blog as $post)
                          <div class="col-12 col-sm-6 col-md-3">
                              <div class="card shadow">
                                <img class="card-img-top" src="{{asset('/storage/postImages/'.$post->image)}}" style="width:100%">
                                <div class="card-boy p-1">
                                  <h6 class="text-center mt-1">{{$post->title}}</h6><br>
                                  <p class="card-text badge badge-dark">Author: {{$post->author}}</p>
                                </div>
                                <div class="card-foote">
                                  <a href="{{url('/viewpost/'.$post->id)}}" class="btn btn-primary shadow" style="width: 100%">View</a>
                                </div>
                              </div>
                          </div> 
                          @endforeach
                      </div>
                  </div>
                  <div class="card-fooer">
                    <a href="{{ route('manageblog') }}" class="btn btn-primary w-100 shadow unlock">SEE MORE</a>
                </div>
              </div>
          </div>
          </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
@endsection
