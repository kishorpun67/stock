@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Catalogues</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if(Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
        {{ Session::get('error_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @error('url')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @enderror 
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">{{ $title}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <form
        @if(!empty($taskdata['id'])) action="{{route('admin.add.edit.task',$taskdata['id'])}}" @else action="{{route('admin.add.edit.task')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="started">Started Date</label>
                  <input type="date" class="form-control" name="started" id="started" placeholder="Enter table name"
                  @if(!empty($taskdata['started']))
                  value= "{{$taskdata['started']}}"
                  @else value="{{old('started')}}"
                  @endif>
                </div>
      
                <div class="form-group">
                  <label for="">Task</label><br>

                  <input type="radio" id="ongong" name="project" value="Ongong">
                 <label for="ongong">Ongoing</label><br>

                  <input type="radio" id="partiallycompleted" name="project" value="Partially Completed">
                 <label for="partiallycompleted">Partially Completed</label><br>

                 <input type="radio" id="completed" name="project" value="Completed">
                 <label for="completed">completed</label>
                  </div>

                  <div class="form-group">
                    <label for="meta_title">Status</label><br>
                    <input type="checkbox" name="status" value="checked">
                  </div>
                  {{-- <label for="meta_title">Checkbox</label><br>
                  <input type="checkbox" id="vehicle1" name="checkbox[]" value="Bike"> --}}

            </div>
          </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{$button}}</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

