<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <meta name="theme-color" content="#0089F3" />
    <title>FPNOHELP - Exam Past Question, Support, Solution Article, Smart Bot</title>
    <meta property="og:url"                content="https://fpnohelp.com" />
    <meta property="og:type"               content="Educational Platform"/>
    <meta property="og:title"              content="FPNOHELP - Exam Past Question, Support, Solution Artcile, Smart Bot"/>
    <meta property="og:description"        content="Easy learning with quick response and helpful articles"/>
    <meta property="og:image"              content="/images/icon.png" />
    <link href="{{ asset('images/icon.png') }}" rel="shortcut icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<na class="navba navbar-exand-md navbar-lght bg-wite shado-sm">
  <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>

<div class="wrapper">

  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{asset('images/icon.png')}}" alt="logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">FPNOHELP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
              use App\Models\profilepicture;
              $getPicture = profilepicture::where('userid',Auth::user()->id)->orderBy('id','DESC')->limit(1)->get();
              $countID = count($getPicture);
              foreach($getPicture as $show);
          ?>
          @if($countID > 0)
              <img src="{{asset('/userImage/'.$show->image)}}" class="img-circle elevation-2" alt="User Image">
          @else
              <img src="{{asset('userImage/default.png')}}" class="img-circle elevation-2" alt="User Image">
          @endif 
         
        </div>
        <div class="info">
          <a href="{{route('userprofile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('home')}}" class="nav-link actve">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('lastyearpq')}}" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
                <?php
                  $year = date('Y');
                  $ans = $year - 1;
                  $ans2 = $year - 2;
                ?>
                Last Year PQs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('morepastquestion')}}" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                {{$ans2}} - 2015 PQ
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-copy"></i>
              <p>
                {{$ans}} 1<sup>st</sup> Semester PQ
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('firstsemester') }}" class="nav-link">
              <i class="nav-icon far fa-copy"></i>
              <p>
                {{$ans}} 1<sup>st</sup> Semester PQ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('firstsemester') }}" class="nav-link">
              <i class="nav-icon far fa-copy"></i>
              <p>
                {{$ans}} 1<sup>st</sup> Semester PQ
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('secondsemester') }}" class="nav-link">
              <i class="nav-icon far fa-copy"></i>
              <p>
                {{$ans}} 2<sup>nd</sup> Semester PQ
              </p>
            </a>
          </li> --}}


          <li class="nav-item">
            <a href="{{route('userblog')}}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
              Article
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-whatsapp"></i>
              <p>
              Direct Support
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('smartbot') }}" class="nav-link">
              <i class="nav-icon fas fa-robot"></i>
              <p>
              Smart Bot
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('appdownload') }}" class="nav-link">
              <i class="nav-icon fas fa-mobile-alt"></i>
              <p>
              Get Mobile App
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-copy"></i>
              <p>
                Coming soon...
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Coming soon...
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Coming soon...
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li> --}}
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          <!-- Button trigger modal -->
          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <main class="main">
        @yield('content')
    </main>
        

    

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Account Setup Modal -->
<!-- Modal -->
<div class="modal fade mt-5 pt-6" id="setupModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="setupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="setupModalLabel">Account Setup</h5>
      </div>
      <form method="post" action="{{url('/saveaccountsetup')}}">
        @csrf
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Faculty</label>
                <select class="form-control getDepartment" id="">
                  <option value="">Select Your Faculty</option>
                  <?php
                      use App\Models\faculty;
                      $getfaculty = faculty::orderBy('id','DESC')->get();
                  ?>
                  @foreach($getfaculty as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Department</label>
                <select class="form-control department" id="" name="deptid" required>
                  
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level" required>
                      <option value="">Select Level</option>
                      <option value="100">ND I</option>
                      <option value="200">ND II</option>
                      <option value="300">HND I</option>
                      <option value="400">HND II</option>
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="program" required>
                    <option value="">Select Program</option>
                    <option value="Morning">Morning</option>
                    <option value="Evening">Evening</option>
                    <option value="Weekend">Weekend</option>
                  </select>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save setup</button>
      </div>
    </form>
    </div>
  </div>
</div>

@if(session('popModalSetup'))
  <script>
      $('#setupModal').on('show.bs.modal', function(){
          $('#modalMsg').text("{{ session('popModalSetup') }}");
      });
      $('#setupModal').modal('show');
  </script>
@endif

  <!-- PQ Subscription  Modal -->
  <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModal" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <i class="fas fa-user-lock text-dark" style="font-size:3.0em;"></i>
                    <h6 class="text-bold mt-2">THANKS FOR TRYING TO SUPPORT THE MAINTAINANCE OF THIS SOFTWARE</h6>
                    <p id="modalMsg"></p>
    
                    <div class="amtDiv">
                      
                      <span>Donation Amount</span>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          
                          <span class="input-group-text" id="basic-addon1">&#8358;</span>
                        </div>
                        <input type="number" class="form-control" id="amount" placeholder="Enter Amount" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
    
                    <div class="mt-4">
                        {{-- <input type="hidden" id="userid" value="{{Auth::user()->id}}">
                        <input type="hidden" id="email" value="{{Auth::user()->email}}"> --}}
                        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                        <button  class="btn btn-primary shadow" id="payDonation">PAY NOW</button>
                    </div>
                </div>
            </div>
            {{-- <div class="cad-footer"> --}}
                <img src="{{asset('images/payment.jpg')}}" class="w-100">
            {{-- </div> --}}
        </div>
    </div>
    </div>
  </div>

<!-- Blog Post Modal -->
<div class="modal fade" id="addpostModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="addpostModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addpostModalLabel"> <i class="fas fa-edit"></i> Write Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{url('/save_post')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="formgroup">
                {{-- <label>Title</label> --}}
                <input class="form-control  shadow-lg" type="text" name="title" placeholder="Write the post title" style="font-size: 0.8rem;
                border-radius: 10rem;
                padding: 1.5rem 1rem;" required>
              </div>
            </div>
            {{-- <div class="col-md-4">
              <div class="form-group">
                <label>Author</label> --}}
                <input class="form-control" type="hidden" name="author" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" required readonly>
              {{-- </div>
            </div> --}}
            <div class="col-md-12 mt-3">
              <div class="form-group">
                  {{-- <label>Post Full Content</label> --}}
                  <textarea class="form-control shadow" type="text" name="content" rows="5" id="summary-ckeditor" placeholder="Post content" required></textarea>
                  {{-- tyle="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" --}}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Faculty</label>
                <select class="form-control getDepartment" id="" name="faculty_id">
                  <option value="">Select Faculty</option>
                  <?php
                      // use App\Models\faculty;
                      $getfaculty = faculty::orderBy('id','DESC')->get();
                  ?>
                  @foreach($getfaculty as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Department</label>
                <select class="form-control department" id="" name="deptid" required>
                  
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Post Image</label>
                  <input class="form-control" type="file" name="image" id="validatedCustomFile" required>
              </div>
            </div>
            <div class="col-md-6">
                <div class="">
                    <div class="">
                        <div style="">
                          <img class="d-block w-100" src="" id="img_preview">
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Blog Post</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
  $(function () {
  // Summernote
  $('.textarea').summernote()
})
</script>
<!-- CKEDITO SCRIPT -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script> 


  <!-- Success Modal -->
  <div class="modal fade" id="sucessModal" tabindex="-1" role="dialog" aria-labelledby="sucessModal" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-body">
              <div class="text-center">
                  <i class="fas fa-check-circle text-success" style="font-size:3.0em;"></i>
                  <p class="modalMsg"></p>
              </div>
          </div>
      </div>
      </div>
  </div>

  <!-- Error Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-body">
              <div class="text-center">
                  <i class="fas fa-times text-danger" style="font-size:3.0em;"></i>
                  <p class="errorModalMsg"></p>
              </div>
          </div>
      </div>
      </div>
  </div>
  <!-- Success Modal End -->
  {{-- @if(session('success'))
  <script>
      $('#sucessModal').on('show.bs.modal', function(){
          $('.modalMsg').text("{{ session('success') }}");
      });
      $('#sucessModal').modal('show');
  </script>
  @endif

  @if(session('error'))
  <script>
      $('#errorModal').on('show.bs.modal', function(){
          $('.errorModalMsg').text("{{ session('error') }}");
      });
      $('#errorModal').modal('show');
  </script>
  @endif --}}

  @if(session('success'))
  <script>
      swal({
        title: "Bravo",
        text: "{{ session('success') }}",
        icon: "success",
        button: "Ok!",
      });
  </script>
  @endif

  @if(session('error'))
  <script>
      swal({
        title: "Error",
        text: "{{ session('error') }}",
        icon: "error",
        button: "Ok!",
      });
  </script>
  @endif

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

</body>

</html>
