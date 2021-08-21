@extends('template.layouts')
@section('content')
    <section id="home" class="hero-section dtr-py-8 hero-default-bg bg-blue color-white">
        <div class="container">
            <div class="row align-items-center"> 
                @foreach ($post as $item)
                <div class="col-12 col-md-6 text-right wow fadeInRight" data-wow-delay="0.4s" > 
                    
                    <!-- Image --> 
                    {{-- <img src="assets/images/video-bg-img.png" alt="video-bg">  --}}
                    <img src="{{asset('/storage/postImages/'.$item->image)}}" alt="video-bg" style="border-radius: 10px">
                    
                </div>

                <div class="col-12 col-md-6 dtr-sm-mb-30px"> 
                    
                    <!-- Heading -->
                    <h1 class="dtr-mb-4 wow fadeInUp" data-wow-delay="0.4s">
                       {{$item->title}}</h1>
                    
                    <!-- Text -->
                    <p class="dtr-mb-5 color-white-muted wow fadeInUp w-75" data-wow-delay="0.6s"> 
                       By: {{$item->author}}</p>
                        
                    <!-- button -->
                    <div class="dtr-btn wow
                     fadeInUp" data-wow-delay="0.8s"> <a href="#readmore">Read More<span><i class="fas fa-arrow-down" aria-hidden="true"></i></span> </a> </div>
                </div> 
                @endforeach
            </div>
        </div>
    </section>
    <section id="readmore" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach ($post as $item)
                    <p>{!!$item->content!!}</p>
                    @endforeach
                </div>

                <div class="col-md-4">
                    <?php
                    use App\Models\blog;
                    $blog= blog::orderBy('id','ASC')->limit(2)->get();
                    ?>
                    <!-- slide 1 starts -->
                    <div class="row">
                        @foreach ($blog as $post)
                        <div class="col-md-12">
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
                        </div>
                        @endforeach
                    </div>
                    <!-- slide 1 ends --> 
                </div>
            </div>
        </div>
    </section>

    @include('template.footer')
@endsection