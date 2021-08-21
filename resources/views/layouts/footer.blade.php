<footer class="footer-details mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="mt-2">
            <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 100px">
          </div>
          <div class="footIcon" style="">
            {{-- <span class="pt-1 d-bloc"><a href="tel:00000"><i class="fas fa-phone-alt pr-2"></i> +234 098 087 8372</a></span><br> --}}
            <span class="pt-1 d-block"><a href="mailto:info@fpnohelp.com"><i class="fas fa-envelope pr-2"></i> info@fpnohelp.com</a><span>
            <span class="pt-1 pb-2 d-block"><a href=""><i class="fas fa-map-marker-alt pr-2"></i> FFPNO NEKEDE, OWERRI, IMO STATE NIG.</a><span>
          </div>
        </div>
      </div>
    </div>
    <div class="developer-signature mb-0 bg-primary">
      <p class="pt-3 pb-5 mb-0 text-light">
        © Copyright FPNO HELP. All rights reserved. 
      </p>
    </div>
</footer>
  
<div class="footer-menu circular">
    <ul>
        <li>
            <a data-widget="pushmenu" href="#" role="button"> <i class="fas fa-align-left"></i>
                <span>More</span>
            </a>
        </li>
        <li>
            <a href="{{ route('userblog') }}"> <i class="far fa-newspaper"></i>
                <span>Article</span>
            </a>
        </li> 
        <li class="bg-drk rounde">
            <a href="{{ route('home') }}"> <i class="fas fa-house-damage"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{route('lastyearpq')}}"> <i class="fas fa-copy"></i>
                <span>Past-Q</span>
            </a>
        </li>
        <li>
            <a href="{{ route('smartbot') }}"> <i class="fas fa-robot"></i>
                <span>Smart Bot</span>
            </a>
        </li>
    </ul>
</div>