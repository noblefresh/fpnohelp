@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-4 card">
                        <form method="post" action="{{url('/saveaccountsetup')}}">
                            @csrf
                          <div class="modal-body">
                              <H4 class="mb-3">Account Setup</H4>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Faculty</label>
                                    <select class="form-control getDepartment" id="">
                                      <option value="">Select Your Faculty</option>
                                      <?php
                                          use App\Models\faculty;
                                          $getfaculty = faculty::orderBy('id','DESC')->get();
                                      ?>
                                      @foreach($getfaculty as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control department" id="" name="deptid" required>
                                      
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Level</label>
                                      <select class="form-control" name="level" required>
                                          <option value="">Select Level</option>
                                          <option value="100">ND I</option>
                                          <option value="200">ND II</option>
                                          <option value="300">HND I</option>
                                          <option value="400">HND II</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Level</label>
                                      <select class="form-control" name="program" required>
                                        <option value="">Select Program</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Evening">Evening</option>
                                        <option value="Weekend">Weekend</option>
                                      </select>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save setup</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- @include('layouts.footer') --}}
@endsection