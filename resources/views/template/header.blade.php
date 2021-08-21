    <!-- Header
============================================= -->
<header id="dtr-header-global" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark dtr-menu">
        <div class="container"> 
            
            <!-- light logo --> 
            <a class="navbar-brand logo-light" href="#home"><img src="{{ asset('images/logo-light.png') }}" style="width: 100px" alt="logo"></a> 
            <!-- dark logo --> 
            <a class="navbar-brand logo-dark" href="#home"><img src="{{ asset('images/logo.png') }}" style="width: 100px" alt="logo"></a> 
            
            <!-- nav menu toggler-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> 
                {{-- <i class="fas fa-th"></i> --}}
            </button>
            
            <!-- menu starts-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="dtr-scrollspy navbar-nav ml-auto">
                    <li class="nav-item"> <a class="nav-link" href="#home">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#products">Coverage</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#about">About</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#quote">Quote</a> </li>
                    
                    <!-- dropdown starts-->
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Resources </a>
                        <div class="dropdown-menu dropdown-animate" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="#features">Features</a> <a class="dropdown-item" href="#cta">Contact</a> </div>
                    </li>
                    <!-- dropdown ends-->
                    
                    <li class="nav-item"> <a class="nav-link" href="#blog">Blog</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a> </li>
                </ul>
            </div>
            <!-- menu ends--> 
            
            <!-- button here -->
            <div class="dtr-btn ml-4 d-none d-lg-block"> <a href="#">0333 567 8900 <span><i class="fas fa-phone" aria-hidden="true"></i></span> </a> </div>
            <!-- button ends --> 
        </div>
    </nav>
</header>
<!-- header ends
================================================== --> 