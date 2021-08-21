@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<!-- Content Wrapper. Contains page content -->
<?php
use App\Models\pastquestion;
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (count($years) < 1)
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="text-center" style="margin-top: 70px">
                        <h5>Comming soon! <i class="fas fa-exclamation-circle"></i></h5>
                        </div>
                    </div>
                @else
                    @foreach ($years as $year)
                    <div class="col-md-12">
                        <?php
                        $getMyPQ = pastquestion::where('deptid',Auth::user()->deptid)
                        ->where('level',Auth::user()->userlevel)
                        ->where('year',$year->year)->get();
                        
                        $subscribed = false;
                        foreach (Auth::user()->QuestionAccess as $subscription) {
                            if ($subscription->year == $year->year) {
                                $subscribed = true;
                            }
                        }
                        ?>
                        <div class="card mt-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <strong>{{ $year->year }} Past Questions</strong>
                                </div>
                                @foreach ($getMyPQ as $key => $actionshow)
                                    @if($key == 0 )
                                    <?php
                                        $action = $actionshow->action;
                                    ?>
                                    @endif
                                @endforeach
                                <div class="card-tools">
                                    <span style="float:right">
                                        @if($subscribed == false)
                                        <a href="#" class="btn btn-primary shadow unlock" id="{{$year->year}}" title="{{$year->year}}">LOCKED</a>
                                        @else
                                        <a href="" class="btn btn-primary shadow">ACTIVE</a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- past question col -->
                                    @foreach ($getMyPQ as $pq)
                                        @if ($subscribed == false)
                                        <div class="col-6 col-sm-6 col-md-3">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="{{asset('passquestions/lock.jpg')}}" style="width:100%">
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-6 col-sm-6 col-md-3">
                                            <div class="card shadow">
                                                @if($pq->semester == '1')
                                                <small class=" badge badge-primary">First Semester ({{ $pq->program }})</small>
                                                @else
                                                <small class=" badge badge-primary">Second Semester ({{ $pq->program }})</small>
                                                @endif
                                                <div class="card-bod crd" style="position: relative;">
                                                    <img src="{{asset('/storage/pastquestionImages/'.$pq->image)}}" style="width:100%">
                                                    <p class="badge badge-dark crd-img" style="">
                                                    CC: {{$pq->coursecode}} 
                                                    @if ($pq->page > 1)
                                                        Page {{ $pq->page }}
                                                    @endif
                                                    </p>
                                                </div>
                                                <div class="card-foote">
                                                    <a href="{{url('/storage/pastquestionImages/'.$pq->image)}}" download class="btn btn-primary w-100 shadow"><i class="fas fa-download"></i> Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @if($subscribed == false)
                            <div class="card-fooer">
                                <a href="#" class="btn btn-primary w-100 shadow unlock" id="{{$year->year}}" title="{{$year->year}}">SUBSCRIBE TO UNLOCK</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>  
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- PQ Subscription  Modal -->
<div class="modal fade" id="unlockModal" tabindex="-1" role="dialog" aria-labelledby="unlockModal" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <i class="fas fa-user-lock text-dark" style="font-size:3.0em;"></i>
                    <h6 class="text-bold mt-2">PAY TO UNLOCK YOUR <span id="modalMsg" class="text-primary"></span> PAST QUESTIONS</h6>
                    <p id="modalMsg"></p>
    
                    <div class="amtDiv">
                        <h5 class="text-bold">&#8358;200.00</h5>
                    </div>
    
                    <div class="mt-4">
                        <input type="hidden" id="userid" value="{{Auth::user()->id}}">
                        <input type="hidden" id="email" value="{{Auth::user()->email}}">
                        <input type="hidden" id="yearval" value="" style="display:none">
                        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                        <button  class="btn btn-primary shadow" id="pay">PAY NOW</button>
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
@include('layouts.footer')
@endsection