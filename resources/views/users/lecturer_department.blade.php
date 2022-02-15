@extends('layouts.app')
@section('content')
    @include('layouts.topnav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-5">
                    @foreach ($department as $item)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box activityDiv shadow">
                            <div class="inner">
                                <?php
                                    // triming the fist and last character of the name
                                    $fword = $item->department;
                                    $f = $fword[0];
                                    $t = explode(' ', $fword);
                                    $lword = $t[1];
                                    $l = $lword[0];
                                ?>
                                <h3>
                                    {{ $f }}
                                    @if ($t != '' )
                                        {{ $l }}
                                    @endif
                                </h3>
                                <p>{{ $item->department }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <a href="{{url('/lecturers/'.$item->id)}}" class="small-box-footer bg-primary">View Lecturers <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('layouts.footer')
@endsection
