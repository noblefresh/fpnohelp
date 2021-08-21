@extends('layouts.app')

@section('content')


    <div class="content-wrapper pt-4">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($post as $posts)
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('/storage/postImages/' . $posts->image) }}"
                                    alt="blog_post_image">
                                {{-- </div> --}}
                                <div class="card-body">
                                    <h4 class="text-center">{{ $posts->title }}</h4>
                                    <p>{!! $posts->content !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="col-md-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class=""><b>Related Post</b></h5>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                use App\Models\blog;
                                $blog = blog::inRandomOrder()->get();
                                ?>
                                @foreach ($blog as $post)
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="card shadow">
                                            <img class="card-img-top"
                                                src="{{ asset('/storage/postImages/' . $post->image) }}"
                                                style="width:100%">
                                            <div class="card-body">
                                                <a href="{{ url('/viewpost/' . $post->id) }}">
                                                    <h5 class="text-center">{{ $post->title }}</h5>
                                                </a>
                                                <?php
                                                $string = $post->content;
                                                if (strlen($string) > 150) {
                                                    $stringCut = substr($string, 0, 200);
                                                    $endPoint = strrpos($stringCut, '');
                                                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                }
                                                ?>
                                                <span>{!! $string !!}... <a
                                                        href="{{ url('/viewpost/' . $post->id) }}"
                                                        style="color:rgb(182, 178, 178)">read more</a></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')
@endsection
