@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4 shadow">
                        <div class="card-header">
                            <strong class="card-tite">Subscribers Details</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Year</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            use App\Models\department;
                                        ?>
                                        @foreach($paidPQ as $paidPQs)
                                        <tr>
                                            <td>{{$paidPQs->year}}</td>
                                            <?php
                                                $getDept = department::where('id',$paidPQs->user2->deptid)->get();
                                            ?>
                                            @foreach ($getDept as $item)
                                            <td>{{ $item->department}}</td>
                                            @endforeach
                                            <td>{{$paidPQs->user2->userlevel}} level</td>
                                            <td>{{$paidPQs->user2->name}}</td>
                                            <td>{{$paidPQs->user2->email}}</td>
                                            <td>&#8358;200.00</td>
                                            <td>{{ date('d M, Y', strtotime($paidPQs->user2->created_at))}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>  
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
@endsection