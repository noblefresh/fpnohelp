<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#0089F3" />
<title>FPNOHELP - Exam Past Question, Support, Solution Article, Smart Bot</title>
<meta property="og:url"                content="https://fpnohelp.com" />
<meta property="og:type"               content="Educational Platform"/>
<meta property="og:title"              content="FPNOHELP - Exam Past Question, Support, Solution Artcile, Smart Bot"/>
<meta property="og:description"        content="Easy learning with quick response and helpful articles"/>
<meta property="og:image"              content="/images/icon.png" />

<!-- FAVICON FILES -->
<link href="{{ asset('images/icon.png') }}" rel="shortcut icon">

<!-- GOOGLE WEB FONT -->
<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700&display=swap" rel="stylesheet">

<link href="{{ asset('fontawesome-free-5/css/all.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('fontawesome-free-5/css/brands.css')}}" rel="stylesheet" type="text/css">

<!-- CSS FILES -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="dtr-wrapper" class="clearfix"> 

    
<main class="main">
    @yield('content')
</main>



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
@if(session('success'))
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
    // alert('Thanks for subscribing!');
</script>
@endif

<script type="text/javascript">
    $(document).ready(function(){
        // alert('ok');
    });
    
</script>

<style>
    .invalid-feedback{
        color: black !important;
    }
</style>
    
</div>

</body>
</html>