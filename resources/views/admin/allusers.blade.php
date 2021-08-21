@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0 text-dark text-bold">All Users</h6>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            @foreach ($allusers as $show)
            @if($show->level < 3)
            <div class="col-md-3">
              <!-- Profile Image -->
                <div class="card card-primary card-outline shadow">
                    <div class="card-body box-profile activityDi">
                    <div class="text-center">
                        @if(count($profilepicture) > 0)
                            @foreach ($profilepicture as $picture)
                            @if($show->id == $picture->userid)
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('/userImage/'.$picture->image)}}"
                            alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('/userImage/default.png')}}"
                            alt="User profile picture">
                            @endif
                            @endforeach
                        @endif
                    </div>
    
                    <h3 class="profile-username text-center">{{$show->name}}</h3>
    
                    <p class="text-mute text-center">{{$show->email}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item" style="background-color:  ">
                            <b>User ID</b> <a class="float-right">{{$show->id}}</a>
                        </li>
                        <li class="list-group-item" style="background-color:  ">
                            <b>Dept.</b> <a class="float-right">{{isset($show->department->department) ? $show->department->department : 'null'}}</a>
                        </li>
                        <li class="list-group-item" style="background-color:  ">
                            <b>Level</b> <a class="float-right">{{$show->userlevel}} Student</a>
                        </li>
                        <li class="list-group-item" style="background-color:  ">
                            <b>Registered On</b> <a class="float-right">{{ date('d M, Y', strtotime($show->created_at))}}</a>
                        </li>
                    </ul>
                    @if(Auth::user()->level == 2)
                    
                    @else
                        @if(Auth::user()->level > 2)
                            @if ($show->level == 2)
                            <a href="#"  class="btn btn-dark" style="width: 45%"><small>Base Admin</small></a>
                            <a href="{{url('/remove_as_admin/'.$show->id)}}"  class="btn btn-danger"><small>Remove Admin</small></a>
                            @else
                            <a href="{{url('/make_user_admin/'.$show->id)}}"  class="btn btn-primary w-100"><b>Make this User Admin</b></a>
                            @endif
                        @endif
                    @endif
                    </div>
              </div>
            </div>
            @endif
            @endforeach
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
@endsection
