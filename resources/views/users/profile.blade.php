@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0 text-dark text-bold">Account Profile</h6>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile shadow activityiv">
                  <div class="text-center">
                    <?php
                        use App\Models\profilepicture;
                        $getPicture = profilepicture::where('userid',Auth::user()->id)->orderBy('id','DESC')->limit(1)->get();
                        $countID = count($getPicture);
                        foreach($getPicture as $show);
                    ?>
                    @if($countID > 0)
                        <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('/userImage/'.$show->image)}}"
                         alt="User profile picture" data-toggle="modal" data-target="#imageModal">
                    @else
                        <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('userImage/default.png')}}"
                        alt="User profile picture" data-toggle="modal" data-target="#imageModal">
                    @endif 
                  </div>
  
                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
  
                  <p class="text-mute text-center text-dark">{{Auth::user()->email}}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item" style="background-color:  ">
                        <b>Dept.:</b> <a class="float-right"><i class="fas fa-building"></i> {{Auth::user()->department->department}}</a>
                    </li>
                    
                    <li class="list-group-item" style="background-color:  ">
                      <b>Level</b> <a class="float-right"><i class="fas fa-layer-group"></i> {{Auth::user()->userlevel}} level student</a>
                    </li>
                  </ul>
                  <button  class="btn btn-primary w-100"><b>Active</b></button>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card activiyDiv shadow">
                <div class="card-header p-2" style="background-color:  ">
                  Why This Website
                </div><!-- /.card-header -->
                <div class="card-body activiyDiv">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="post">
                        
                        <!-- /.user-block -->
                        <p class="activitDiv">
                            Past exams papers are an essential part of preparing for any exams. They provide a useful resource for preparing for your exams in that, you are able to familiarize yourself with the style, theme, depth and techniques used in the particular exams that you are writing.  
                        </p>

                        <p class="activityiv">
                            It's well understood in psychology that you are more likely to retain something if you learn it with practice. Practicing past questions will improve your retention rate and will help you to better understand what you have studied. 
                        </p>

                        <p class="activityDiv">
                            {{-- Account Number<br> --}}
                            {{-- {{$item->accountnumber}} --}}
                        </p>
                      <!-- /.post -->
                      
                      </div>
                      <!-- /.post -->
                    </div>
  
                    
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="mb-4">
                <button class="btn btn-primary shadow ml-2"  data-toggle="modal" data-target="#imageModal">
                    <i class="fa fa-camera text-dark"></i>
                </button>
            </div>
          </div>
          <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Logout Modal-->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body activityDiv">
            {{-- <div class="card">
                  <img src="{{ asset('images/default.png')}}" class="card-img-top rounded-circl rofileImg">
            </div> --}}
          <form method="POST" action="{{ url('/profile_picture') }}" enctype="multipart/form-data">
          @csrf
              <div class="form-group">
                  <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                  <input name="image" type="file" class="form-control" id="validatedCustomFile">
              </div>
              <div class="form-group">
                <img class="d-block w-100" src="" id="img_preview">
              </div>
              <div class="form-group pt-3" style="text-align:center;">
                  <button type="submit" class="btn btn-primary">Upload <i class="fa fa-upload"></i></button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footer')
@endsection
