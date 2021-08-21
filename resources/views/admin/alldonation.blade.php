@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-4 shadow">
                        <div class="card-header">
                            <strong class="card-tite">Donation Details</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach($donations as $donation)
                                        <tr>
                                            <td>{{$donation->userid}}</td>
                                            <td>{{$donation->name}}</td>
                                            <td>{{$donation->email}}</td>
                                            <td>&#8358;{{number_format($donation->amount,2)}}</td>
                                            <td>{{ date('d M, Y', strtotime($donation->created_at))}}</td>
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