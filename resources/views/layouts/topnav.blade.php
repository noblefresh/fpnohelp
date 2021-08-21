  <nav class="main-header navbar navbar-expand navbar-pimary nabar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark" data-widget="" href="{{ route('home') }}" role="button"><i class="fas fa-chevron-left"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link text-dark">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('userblog') }}" class="nav-link text-dark">Info</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <li class="nav-item">
        <a class="nav-link text-dark" data-widget="fullscreen" href="#" role="button">
          <i class="far fa-far fa-bell"></i>
        </a>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link text-dark" data-toggle="dropdown" id="profile" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="showprofile" >
          <span class="dropdown-item dropdown-header">Account</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('userprofile')}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> Sign out
          </a>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>