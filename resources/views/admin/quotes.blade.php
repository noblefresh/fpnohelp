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
                            <strong class="card-tite">Quotes</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach($quotes as $quote)
                                        <tr>
                                            <td>{{$quote->id}}</td>
                                            <td>{{$quote->name}}</td>
                                            <td>{{$quote->number}}</td>
                                            <td>{{$quote->email}}</td>
                                            <td>{{$quote->message}}</td>
                                            <td>{{ date('d M, Y', strtotime($quote->created_at))}}</td>
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