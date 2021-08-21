<!-- footer starts
================================================== -->
    
<footer id="dtr-footer-global" class="bg-blue color-white">
    <div class="container"> 
        
        <!-- footer columns row starts -->
        <div class="row"> 
            
            <!-- column 1 starts -->
            <div class="col-12 col-sm-6 col-lg-6 dtr-sm-mb-30px">
                <p><a href="{{ route('welcome') }}"><img src="{{ asset('images/logo-light.png') }}" alt="image" class="wow pulse" data-wow-delay="0.4s" style="width:150px"></a></p>
                <p class="dtr-rounded-alert wow fadeInUp" data-wow-delay="0.6s">4.5 out of 5 based on <span class="color-theme">6740 reviews</span></p>
            </div>
            <!-- column 1 ends --> 
            
            <!-- column 2 starts -->
            <div class="col-12 col-sm-6 col-lg-2 dtr-sm-mb-30px wow fadeInRight" data-wow-delay="0.4s">
                <h6>Guidelines</h6>
                <ul class="dtr-list">
                    <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                    <li>Resources</li>
                    <li><a href="{{ route('terms') }}">Terms of Use</a></li>
                </ul>
            </div>
            <!-- column 2 ends --> 
            
            <!-- column 3 starts -->
            <div class="col-12 col-sm-6 col-lg-2 dtr-sm-mb-30px wow fadeInRight" data-wow-delay="0.6s">
                <h6>Company</h6>
                <ul class="dtr-list">
                    <li>Services</li>
                    <li>Blog</li>
                    <li>Contact</li>
                </ul>
            </div>
            <!-- column 3 ends --> 
            
            <!-- column 4 starts -->
            <div class="col-12 col-sm-6 col-lg-2 wow fadeInRight" data-wow-delay="0.8s">
                <h6>Coverage</h6>
                <ul class="dtr-list">
                    <li>Past Questions</li>
                    <li>Technical Report</li>
                    <li>Logbook</li>
                </ul>
            </div>
            <!-- column 4 ends --> 
            
        </div>
        <!-- footer columns row ends --> 
        
        <!-- copyright row starts -->
        <div class="row dtr-mt-7">
            <div class="col-12 col-md-6"> &copy; CaPhils Enterprise {{date('Y')}}. Developed by <a href="https://www.literesults.net">Literesults Services</a></div>
            <div class="col-12 col-md-6">
                <ul class="dtr-social-list text-right color-muted-white">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- copyright row ends --> 
        
    </div>
</footer>
<!-- footer ends
================================================== --> 