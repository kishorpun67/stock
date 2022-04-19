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
        @if(!empty($electricitydata['id'])) action="{{route('admin.add.edit.electricity',$electricitydata['id'])}}" @else action="{{route('admin.add.edit.electricity')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="electricity_uses">Electricity Consumption</label>
                  <input type="text" class="form-control" name="electricity_uses" id="electricity_uses" placeholder="Enter Electricity Uses"
                  @if(!empty($electricitydata['electricity_uses']))
                  value= "{{$electricitydata['electricity_uses']}}"
                  @else value="{{old('electricity_uses')}}"
                  @endif>
                </div>
                <div class="form-group">
                  <label for="electricity_unit">Electricity Unit</label>
                  <input type="text" class="form-control" name="electricity_unit" id="electricity_unit" placeholder="Enter Electricity Unit"
                  @if(!empty($electricitydata['electricity_unit']))
                  value= "{{$electricitydata['electricity_unit']}}"
                  @else value="{{old('electricity_unit')}}"
                  @endif>
                </div>    

                <div class="form-group">
                  <label for="electricity_month">Months</label>
                  <input type="date" class="form-control" name="electricity_month" id="electricity_month" placeholder=""
                  @if(!empty($electricitydata['electricity_month']))
                  value= "{{$electricitydata['electricity_month']}}"
                  @else value="{{old('electricity_month')}}"
                  @endif>
                </div> 

                <div class="form-group">
                  <label for="electricity_total">Electricity Total</label>
                  <input type="text" class="form-control" name="electricity_total" id="electricity_total" placeholder="Enter Electricity Total"
                  @if(!empty($electricitydata['electricity_total']))
                  value= "{{$electricitydata['electricity_total']}}"
                  @else value="{{old('electricity_total')}}"
                  @endif>
                </div> 
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

