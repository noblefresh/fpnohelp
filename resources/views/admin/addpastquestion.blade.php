@extends('layouts.app')

@section('content')
@include('layouts.topnav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="info-box mt-4 shadow">
              <span class="info-box-icon bg-info elevation-1 p-2">
              <img src="{{asset('images/icon.png')}}" class="brand-image img-circle bg-light elevation-3" style="opacity: .8">
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Past Questions</span>
                <span class="info-box-number">
                <?php
                $totalPQ = count($pastquestions);
                echo $totalPQ;
                ?>
                 AVAILABLE
                </span>
              </div>

              <div class="info-box-content">
                <button class="btn btn-warning shadow" type="button" data-toggle="modal" data-target="#addpastquestionModal">ADD PAST QUESTION</button>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->
        
        <div class="row">
         <div class="col-md-12" >
          <div class="container card shadow">
            <div class="card-header">
              Search Past Question
            </div>
            <div class=" pt-3 pb-3">              
             <div class="row">
               <div class="col-md-12">
                <form action="{{ url('/search_past_question') }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-2 mt-2">
                      <div class="form-group">
                        <select class="form-control getDepartment" id="" name="faculty_id">
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
                    </div>
                    <div class="col-md-2 mt-2">
                      <div class="form-group">
                        <select class="form-control department" id="" name="deptid" required>
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mt-2">
                      <select class="form-control" name="level" required>
                          <option value="">Select Level</option>
                          <option value="100">ND I</option>
                          <option value="200">ND II</option>
                          <option value="300">HND I</option>
                          <option value="400">HND II</option>
                      </select>
                    </div>
                    <div class="col-md-2 mt-2">
                      <select class="form-control" name="year" required>
                        <option value="">Select Year</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                      </select>
                    </div>
                    <div class="col-md-2 mt-2">
                      <select class="form-control" name="program" required>
                        <option value="">Select Program</option>
                        <option value="Morning">Morning</option>
                        <option value="Evening">Evening</option>
                        <option value="Weekend">Weekend</option>
                      </select>
                    </div>
                    <div class="col-md-2 mt-2">
                      <select class="form-control" name="semester" required>
                        <option value="">Select Semester</option>
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
                      </select>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary w-100">SEARCH</button>
                    </div>
                  </div>
                </form>
               </div>
             </div>
            </div>
          </div>
         </div>
        </div>

        <div class="row">
            @foreach ($pastquestions as $pq)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow">
                  <span class=" badge badge-primary">{{$pq->department->department}} ({{$pq->year}}) ({{$pq->level}} L)</span>
                  <div class="card-body">
                    <img src="{{asset('/storage/pastquestionImages/'.$pq->image)}}" style="width:100%">
                    <span class="badge badge-dark">
                      CC: {{$pq->coursecode}} 
                      @if ($pq->page > 1)
                          Page {{ $pq->page }}
                      @endif
                    </span>
                    
                    @if($pq->semester == '1')
                    <span class=" badge badge-primary">1st Semester</span>
                    @else
                    <span class=" badge badge-primary">2nd Semester</span>
                    @endif
                  </div>
                  <div class="card-foote">
                    <a href="{{url('/storage/pastquestionImages/'.$pq->image)}}" download class="btn btn-primary shadow" style="width: 50%">Download</a>
                    <a href="{{url('/deletepastquestion/'.$pq->id)}}" class="btn btn-danger shadow" style="width: 50%; float:right">Delete</a>
                  </div>
                </div>
            </div> 
            @endforeach
          </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
<div class="modal fade" id="addpastquestionModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="addpastquestionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addpastquestionModalLabel">Add Past Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{url('/save_pastquestion')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Faculty</label>
                  <select class="form-control getDepartment" id="" name="faculty_id">
                    <option value="">Select Faculty</option>
                    <?php
                        // use App\Models\faculty;
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
                      <label>Past Question Year</label>
                      <select class="form-control" name="year" required>
                          <option value="">Select Year</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Past Question Semester</label>
                    <select class="form-control" name="semester" required>
                        <option value="">Select Semester</option>
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
                    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Past Question Image</label>
                    <input class="form-control" type="file" name="image" id="validatedCustomFile" required>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div style="">
                            <img class="d-block w-100" src="" id="img_preview">
                          </div>
                      </div>
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
                      <label>Course Code</label>
                      <input class="form-control" type="text" name="coursecode" placeholder="Enter the Course Code" required>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Program</label>
                    <select class="form-control" name="program" required>
                        <option value="">Select Program</option>
                        <option value="Morning">Morning</option>
                        <option value="Evening">Evening</option>
                        <option value="Weekend">Weekend</option>
                    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>PQ Page</label>
                    <select class="form-control" name="page" required>
                        <option value="">Select Page Number</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Past Question</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  @include('layouts.footer')
@endsection
