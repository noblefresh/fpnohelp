@extends('template.layouts')
@section('content')

@include('template.header')
<!-- hero section starts
================================================== -->
<section id="home" class="hero-section dtr-py-8 hero-default-bg bg-blue color-white">
    <div class="container">
        <div class="row align-items-center"> 
            
            <!-- column 1 starts -->
            <div class="col-12 col-md-6 dtr-sm-mb-30px"> 
                
                <!-- Heading -->
                <h1 class="dtr-mb-4 wow fadeInUp" data-wow-delay="0.4s">
                    Get Access to FUNAI<br>
                    Past Questions Here!! </h1>
                
                <!-- Text -->
                <p class="dtr-mb-5 color-white-muted wow fadeInUp w-75" data-wow-delay="0.6s"> 
                    We have various courses from different faculties and departments
                including years back starting from 2015 till date.</p>
                    
                <!-- button -->
                <div class="dtr-btn wow fadeInUp" data-wow-delay="0.8s"> <a href="{{route('register')}}">Get Started<span><i class="fas fa-arrow-right" aria-hidden="true"></i></span> </a> </div>
            </div>
            <!-- column 1 ends --> 
            
            <!-- column 2 starts -->
            <div class="col-12 col-md-6 text-right wow fadeInRight" data-wow-delay="0.4s"> 
                
                <!-- Image --> 
                <img src="{{ asset('images/hd.png') }}" alt="video-bg"> 
                
                <!-- video button starts -->
                <div class="dtr-video-wrapper dtr-video-button-lg">
                    {{-- <div class="dtr-video-wrapper-inner"> <a class="dtr-video-popup dtr-video-button" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=kuceVNBTJio"><span class="dtr-video-button-wrap-inner"></span> <span class="dtr-border-animation dtr-border-1"></span> <span class="dtr-border-animation dtr-border-2"></span> </a> </div> --}}
                </div>
                <!-- video button ends --> 
                
            </div>
            <!-- column 2 ends --> 
            
        </div>
    </div>
</section>
<!-- hero section starts
================================================== --> 

<!-- quickfeature section starts
================================================== -->
<section id="quickfeatures" class="dtr-py-6">
    <div class="container">
        <div class="row text-center"> 
            
            <!-- column 1 starts -->
            <div class="col-12 col-md-4 dtr-sm-mb-30px wow fadeInUp" data-wow-delay="0.4s"> 
                
                <!-- Icon --> 
                <img class="dtr-mb-4" src="assets/images/icon-multicolor-1.png" alt="icon"> 
                
                <!-- Heading -->
                <h5 class="mb-3"> Reliable coverage </h5>
                
                <!-- Text -->
                <p>This platform content is coming from a well authorized source</p>
            </div>
            <!-- column 1 ends --> 
            
            <!-- column 2 starts -->
            <div class="col-12 col-md-4 dtr-sm-mb-30px wow fadeInUp" data-wow-delay="0.4s"> 
                
                <!-- Icon --> 
                <img class="dtr-mb-4" src="assets/images/icon-multicolor-2.png" alt="icon"> 
                
                <!-- Heading -->
                <h5 class="mb-3"> Tailored Plans</h5>
                
                <!-- Text -->
                <p>We provide you with past questions that are based on your details </p>
            </div>
            <!-- column 2 ends --> 
            
            <!-- column 3 starts -->
            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="0.4s"> 
                
                <!-- Icon --> 
                <img class="dtr-mb-4" src="assets/images/icon-multicolor-3.png" alt="icon"> 
                
                <!-- Heading -->
                <h5 class="mb-3"> Best-in-class services </h5>
                
                <!-- Text -->
                <p>Our services can always be extended if you place request for any</p>
            </div>
            <!-- column 3 ends --> 
            
        </div>
    </div>
</section>
<!-- quickfeature section ends
================================================== --> 

<!-- sticky tabs starts
================================================== -->
<section id="products" class="dtr-sticky-tabs-wrapper dtr-border-top"> 
    
    <!-- tabs nav start -->
    <div class="dtr-sticky-tabs-nav">
        <nav class="dtr-scrollspy-tabs">
            <ul class="dtr-scrollspy nav justify-content-center dtr-sticky-tabs">
                <li class="nav-item"> <a class="nav-link" href="#tab1"><i class="fas fa-book" style="font-size: 1.5em"></i> Past Question</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#tab2"><i class="fas fa-paste" style="font-size: 1.5em"></i> Logbook</a> </li>
                {{-- <li class="nav-item"> <a class="nav-link" href="#tab3"><img src="assets/images/icon-pet-tab.png" alt="tab3">Logbook</a> </li> --}}
            </ul>
        </nav>
    </div>
    <!-- tabs nav ends -->
    
    <div data-target=".dtr-scrollspy-tabs"> 
        
        <!-- tab 1 starts -->
        <section id="tab1" class="dtr-sticky-tabs-section">
            <div class="dtr-sticky-tabs-content">
                <div class="container">
                    <div class="row align-items-center"> 
                        
                        <!-- column 1 starts -->
                        <div class="col-12 col-md-7 dtr-sm-mb-30px wow fadeInLeft" data-wow-delay="0.4s"> <img src="{{ asset('images/phd.png') }}" alt="logo"> </div>
                        <!-- column 1 ends --> 
                        
                        <!-- column 2 starts -->
                        <div class="col-12 col-md-5 wow fadeInRight" data-wow-delay="0.4s"> 
                            
                            <!-- Icon Image --> 
                            <i class="fas fa-book dtr-mb-4 text-primary" style="font-size: 4.0em"></i>
                            
                            <!-- Heading -->
                            <h2 class="dtr-mb-4">Past Question</h2>
                            
                            <!-- Text -->
                            <p class="dtr-mb-5">It's well understood in psychology that you are more likely to retain something if you learn it with practice. Practicing past questions will improve your retention rate. </p>
                            
                            <!-- button here -->
                            <div class="dtr-btn"> <a href="{{route('register')}}">Get Started<span><i class="fas fa-arrow-right" aria-hidden="true"></i></span> </a> </div>
                        </div>
                        <!-- column 2 ends --> 
                    </div>
                </div>
            </div>
        </section>
        <!-- tab 1 ends --> 
        
        <!-- tab 2 starts -->
        <section id="tab2" class="dtr-sticky-tabs-section">
            <div class="dtr-sticky-tabs-content">
                <div class="container">
                    <div class="row align-items-center"> 
                        
                        <!-- column 1 starts -->
                        <div class="col-12 col-md-5 dtr-sm-mb-30px wow fadeInRight" data-wow-delay="0.4s"> 
                            
                            <!-- Icon Image --> 
                            {{-- <img src="assets/images/icon-plane.png" alt="logo" class="dtr-mb-4">  --}}
                            <i class="fas fa-paste dtr-mb-4 text-primary" style="font-size: 4.0em"></i>
                            <!-- Heading -->
                            <h2 class="dtr-mb-4">Logbook</h2>
                            
                            <!-- Text -->
                            <p class="dtr-mb-5">This might come as a challenge to many students. As an I.T student in various fields of study you’ll learn how to correctly fill in your own logbook today. </p>
                            
                            <!-- button here -->
                            <div class="dtr-btn"> <a href="#">Get a quote<span><i class="fas fa-arrow-right" aria-hidden="true"></i></span> </a> </div>
                        </div>
                        <!-- column 1 ends --> 
                        
                        <!-- column 2 starts -->
                        <div class="col-12 col-md-7 text-right wow fadeInLeft" data-wow-delay="0.4s"> <img src="{{ asset('images/lhd.png') }}" alt="logo"> </div>
                        <!-- column 2 ends --> 
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- tab 2 ends --> 
        
        <!-- tab 3 starts -->
        {{-- <section id="tab3" class="dtr-sticky-tabs-section">
            <div class="dtr-sticky-tabs-content">
                <div class="container">
                    <div class="row align-items-center"> 
                        
                        
                        <div class="col-12 col-md-7 dtr-sm-mb-30px wow fadeInLeft" data-wow-delay="0.4s"> <img src="assets/images/img-petins.png" alt="logo"> </div>
                        
                        
                        <div class="col-12 col-md-5 wow fadeInRight" data-wow-delay="0.4s"> 
                            
                         
                            <img src="assets/images/icon-pet.png" alt="logo" class="dtr-mb-4"> 
                            
                            
                            <h2 class="dtr-mb-4">Logbook</h2>
                            
                            
                            <p class="dtr-mb-5">Lorem ipsum dolor sit amet consectetur adipiscing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim ad minim veniam, quis nostrud exercitation commodo consequat. </p>
                            
                            
                            <div class="dtr-btn"> <a href="#">Get a quote<span><i class="fas fa-arrow-right" aria-hidden="true"></i></span> </a> </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- tab 3 ends --> 
        
    </div>
</section>
<!-- sticky tabs starts
================================================== --> 

<!-- about starts
================================================== -->
<section id="about" class="bg-light-blue dtr-py-7">
    <div class="container">
        <div class="row"> 
            
            <!-- column 1 starts -->
            <div class="col-12 col-md-6"> 
                
                <!-- text here -->
                <p class="text-size-xl dtr-mb-4">Why its is important practicing Past Question why studing</p>
                <p class="dtr-mb-5">Past exams papers are an essential part of preparing for any exams. They provide a useful resource for preparing for your exams in that, you are able to familiarize yourself with the style, theme, depth and techniques used in the particular exams that you are writing.  </p>
                <p class="dtr-mb-5">It's well understood in psychology that you are more likely to retain something if you learn it with practice. Practicing past questions will improve your retention rate and will help you to better understand what you have studied.   </p>
                
                <!-- info starts -->
                {{-- <div class="d-flex flex-column flex-md-row align-items-center dtr-about"> <img src="assets/images/user-6.jpg" width="80" height="80" alt="image" class="rounded-circle">
                    <div>
                        <h6 class="dtr-mb-0">Annie Cooper</h6>
                        <p class="dtr-mb-0">CEO, Insurance Company</p>
                    </div>
                    <img src="assets/images/sig.png" alt="image"> 
                </div> --}}
                <!-- info ends -->
                
                <!-- image here--> 
                <img src="assets/images/img-abt2.jpg" alt="image" class="dtr-rounded mt-5 dtr-sm-mb-30px wow fadeInLeft" data-wow-delay="0.4s"> </div>
            <!-- column 1 ends --> 
            
            <!-- column 2 starts -->
            <div class="col-12 col-md-6 wow fadeInRight" data-wow-delay="0.4s"> <img src="assets/images/img-abt1.jpg" alt="image" class="dtr-rounded dtr-mb-5">
                <p class="text-size-xl dtr-mb-4">We are here to help you build standard in exam preparation</p>
                
                <!-- accordion starts -->
                <div class="dtr-accordion accordion" id="home-accordion"> 
                    
                    <!-- accordion tab 1 starts -->
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="dtr-mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Who we are? </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#home-accordion">
                            <div class="card-body"> We are CaPhils Enterprise, a global world class Informative platform. We prepare you for the future! </div>
                        </div>
                    </div>
                    <!-- accordion tab 1 ends --> 
                    
                    <!-- accordion tab 2 starts -->
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="dtr-mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What is our mission? </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#home-accordion">
                            <div class="card-body"> Bringing to your doorstep the best reliable approach to proffer solution to educational challenges. </div>
                        </div>
                    </div>
                    <!-- accordion tab 2 ends --> 
                    
                    <!-- accordion tab 3 starts -->
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="dtr-mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> What we believe? </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#home-accordion">
                            <div class="card-body"> We are a team of professionals that believe in efficiency, hardwork and commitment. We give out the best services and we seek to contribute to the development of our users at all levels. </div>
                        </div>
                    </div>
                    <!-- accordion tab 3 ends --> 
                    
                </div>
                <!-- accordion ends --> 
                
            </div>
            <!-- column 2 ends --> 
            
        </div>
    </div>
</section>

<!-- about ends
================================================== --> 

<!-- cta section starts
================================================== -->
<section id="cta" class="dtr-pt-7 dtr-pb-5 dtr-sm-mb-30px bg-dark-blue color-white">
    <div class="container">
        <div class="row"> 
            
            <!-- column 1 starts -->
            <div class="col-12 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                <h2>We have got you <span class="color-blue">covered</span></h2>
            </div>
            <!-- column 1 ends --> 
            
            <!-- column 2 starts -->
            <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                <p>Get rid of your worries and move straight with a one to one chat conversation with our support team member with just a click of the contact us button.</p>
                <p class="text-size-xl dtr-mb-4">Everybody Deserves!</p>
            </div>
            <!-- column 2 ends --> 
            
            <!-- column 3 starts -->
            <div class="col-12 col-lg-3 text-right wow fadeInUp" data-wow-delay="0.4s">
                <div class="dtr-btn"> <a href="#">Contact us<span><i class="fas fa-comment" aria-hidden="true"></i></span> </a> </div>
            </div>
            <!-- column 3 ends --> 
            
        </div>
    </div>
</section>

<!-- cta section ends
================================================== --> 

<!-- features section starts
================================================== -->
<section id="features" class="dtr-pt-7 dtr-pb-5 bg-white">
    <div class="container">
        <h2 class="text-center">Core Features</h2>
        <p class="text-center">Spend little of your time exploring of features</p>
        <div class="row mt-5"> 
            
            <!-- box 1 starts -->
            <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="dtr-feature-box"> <span class="dtr-feature-box-icon"><i class="fas fa-glass-whiskey"></i></span>
                    <h5>Better Coverage</h5>
                    <p>We made only useful educational contents available for students to work and practice with them till they graduate from the institution.</p>
                    <a href="#more">Know More &raquo;</a> </div>
            </div>
            <!-- box 1 ends --> 
            
            <!-- box 2 starts -->
            <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="dtr-feature-box"> <span class="dtr-feature-box-icon"><i class="fas fa-dollar-sign"></i></span>
                    <h5>Cost Effective</h5>
                    <p>Our services are available for free. But student who is passionatly will to support the maintenance of the system can always donate.</p>
                    <a href="{{route('register')}}">Donate &raquo;</a> </div>
            </div>
            <!-- box 2 ends --> 
            
            <!-- box 3 starts -->
            <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="dtr-feature-box"> <span class="dtr-feature-box-icon"><i class="fas fa-cubes"></i></span>
                    <h5>Best Practices</h5>
                    <p>We ensure we give students the best services that will guide them througout their staying in the above institution.</p>
                    <a href="#more">Know More &raquo;</a> </div>
            </div>
            <!-- box 3 ends --> 
            
            <!-- box 4 starts -->
            {{-- <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="dtr-feature-box"> <span class="dtr-feature-box-icon"><i class="icon-user-check1"></i></span>
                    <h5>Customer First</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid labore dolore magna.</p>
                    <a href="#more">Know More &raquo;</a> </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="dtr-feature-box"> <span class="dtr-feature-box-icon"><i class="icon-sliders"></i></span>
                    <h5>Flexible Plans</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid labore dolore magna.</p>
                    <a href="#more">Know More &raquo;</a> </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="dtr-feature-box"> <span class="dtr-feature-box-icon"><i class="icon-briefcase1"></i></span>
                    <h5>Premium Service</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid labore dolore magna.</p>
                    <a href="#more">Know More &raquo;</a> </div>
            </div> --}}
            <!-- box 6 ends --> 
            
        </div>
    </div>
</section>

<!-- features section ends
================================================== --> 

<!-- quote section starts
================================================== -->
<section id="quote" class="dtr-py-7 quote-section">
    <div class="container">
        <div class="row">
            <!-- column 1 starts -->
            <div class="col-12 col-lg-6 bg-trans-dark-blue color-white dtr-py-7 dtr-px-5 dtr-rounded-left text-size-md">
                <p class="text-size-xl dtr-mb-4">100% Satisfaction Guaranteed</p>
                <p class="dtr-mb-5"> For academic support, advise and solutions; we are always here to watch and guild you through. </p>
                <p class="text-size-xl dtr-mb-4">What will be the next step?</p>
                
                <!-- list starts -->
                <ul class="dtr-list-checkmark dtr-mb-5">
                    <li>
                        <h6>Inform use about your challenge</h6>
                    </li>
                    <li>
                        <h6>Together we discuss it</h6>
                    </li>
                    <li>
                        <h6>Solution available</h6>
                    </li>
                </ul>
                <!-- list ends -->
                
                <p class="text-size-xl dtr-mb-4">Talk to an expert:</p>
                <div class="d-flex">
                    <div><i class=" dtr-left-icon dtr-icon-scale"></i><span class="color-blue">0333 567 8900</span></div>
                    <div class="ml-5"><i class="fab fa-whatsapp dtr-left-icon dtr-icon-scale"></i><a href="#chat"><span class="color-blue">Live Chat</span></a></div>
                </div>
            </div>
            <!-- column 1 ends --> 
            
            <!-- column 2 starts -->
            <div class="col-12 col-lg-6 bg-white dtr-py-7 dtr-px-5 dtr-rounded-right">
                <div class="d-flex dtr-mb-4">
                    <div class="dtr-mr-5">
                        <h2>Get a free quote</h2>
                        <p>Let's know what you want</p>
                    </div>
                    <!-- icon starts --> 
                    <span class="dtr-icon-with-bg dtr-icon-blue ml-auto"><i class="fas fa-envelope"></i></span> 
                    <!-- icon ends --> 
                </div>
                
                <!-- form starts -->
                <div class="dtr-form dtr-submit-full">
                    <form id="contatform" method="post" action="{{url('/savequote')}}">
                        @csrf
                        <fieldset>
                            <div class="dtr-form-row-2col">
                                <p class="dtr-form-column">
                                    <input name="name"  type="text" placeholder="Name" required>
                                </p>
                                <p class="dtr-form-column">
                                    <input name="number" class="number" type="text" placeholder="Phone" required>
                                </p>
                            </div>
                            <p>
                                <input name="email"  class="required email" type="text" placeholder="Email" required>
                            </p>
                            <p>
                                <textarea rows="6" name="message" id="message" class="required"  placeholder="Message" required></textarea>
                            </p>
                            <button type="submit" class="dtr-btn-round dtr-btn-blue"> Get a quote</button>
                            <div id="result"></div>
                        </fieldset>
                    </form>
                </div>
                <!-- form ends --> 
                
            </div>
            <!-- column 2 ends --> 
            
        </div>
    </div>
</section>

<!-- quote section ends
================================================== --> 

<!-- blog section starts
================================================== -->
<section id="blog" class="dtr-py-7 bg-white">
    <div class="container">
        <h2 class="text-center">News and Articles</h2>
        <p class="text-center">The most interesting part to review educational updates</p>
        
        <!-- blog swiper starts -->
        <div class="swiper-container dtr-swiper-has-arrows dtr-blog-carousel mt-5">
            <div class="swiper-wrapper"> 
                <?php
                    use App\Models\blog;
                    $blog= blog::orderBy('id','DESC')->get();
                ?>
                <!-- slide 1 starts -->
                @foreach ($blog as $post)
                <div class="swiper-slide">
                    <div class="dtr-post-carousel-item">
                        <div class="dtr-post-carousel-content"> <img src="{{asset('/storage/postImages/'.$post->image)}}" alt="image">
                            <div class="dtr-post-carousel-entry-content"> 
                                {{-- <span class="dtr-category">Travel</span> --}}
                                <h5><a href="{{url('/blog/'.$post->id)}}">{{$post->title}}</a></h5>
                            </div>
                            <div class="dtr-post-carousel-meta">
                                <ul class="dtr-meta">
                                    <li class="dtr-meta-author">{{$post->author}}</li>
                                    <li class="dtr-meta-date">{{date('d/m/y', strtotime($post->created_at))}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- slide 1 ends --> 
                
            </div>
            <!-- Arrows -->
            <div class="swiper-button-next dtr-swiper-next"></div>
            <div class="swiper-button-prev dtr-swiper-prev"></div>
        </div>
        <!-- Swiper ends --> 
        
    </div>
</section>

<!-- blog section ends
================================================== --> 

@include('template.footer')

@endsection