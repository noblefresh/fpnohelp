@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="card-title">
                                <strong>Faculty & Department</strong>
                            </div>
                            <div class="card-tools">
                                <span style="float:right">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#facultyModal">
                                    ADD FACULTY
                                </button>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{url('/savedepartment')}}">
                            @csrf
                                <div class="form-group">
                                    <label>Faculty *</label>
                                    <select class="form-control" name="faculty_id" required>
                                        <option value="">Select Faculty</option>
                                        <?php
                                            use App\Models\faculty;
                                            $getfaculty = faculty::orderBy('id','DESC')->get();
                                        ?>
                                        @foreach($getfaculty as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label>Department *</label>
                                    <input class="form-control" name="department" placeholder="Enter the Department" requred>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Save Department</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-tite">Faculties</strong>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @foreach($getfaculty as $faculty)
                                                <tr>
                                                    <td>{{$faculty->faculty}}</td>
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
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            <strong class="card-tite">Departments</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <?php
                                            use App\Models\department;
                                            $getdepartment = department::orderBy('id','DESC')->get();
                                        ?>
                                        @foreach($getdepartment as $department)
                                        <tr>
                                            <td>{{$department->department}}</td>
                                            <td><a href="{{url('/deletedepartment/'.$department->id)}}"><i class="fas fa-trash text-danger"></i></a></td>
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


<!-- Modal -->
<div class="modal fade mt-5 pt-6" id="facultyModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="facultyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="facultyModalLabel">ADD FACULTY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{url('/savefaculty')}}">
      @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label>Faculty</label>
                    <input class="form-control" name="faculty" placeholder="Enter Faculty Name" required>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save Faculty</button>
        </div>
      </form>
    </div>
  </div>
</div>

@include('layouts.footer')

@endsection