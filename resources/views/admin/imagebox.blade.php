@extends('layouts.app')

@section('content')
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
                <span class="info-box-text">Images Box</span>
                <span class="info-box-number">
                    AVAILABLE
                </span>
              </div>
              <div class="info-box-content">
                <button class="btn btn-warning shadow" type="button" data-toggle="modal" data-target="#addpostModal">ADD IMAGE</button>
              </div>
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->
        
        <div class="row">
            @foreach ($imagebox as $imageboxx)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card shadow">
                  <img class="card-img-top" src="{{asset('/storage/imageBox/'.$imageboxx->image)}}" style="width:100%">
                </div>
            </div> 
            @endforeach
          </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
<div class="modal fade" id="addpostModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="addpostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addpostModalLabel">Add Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{url('/save_image')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Image</label>
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
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Image</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  @include('layouts.footer')
@endsection
