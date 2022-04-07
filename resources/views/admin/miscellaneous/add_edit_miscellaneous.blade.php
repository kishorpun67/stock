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
        @if(!empty($miscellaneousdata['id'])) action="{{route('admin.add.edit.miscellaneous',$miscellaneousdata['id'])}}" @else action="{{route('admin.add.edit.miscellaneous')}}" @endif
        method="post" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="electricity_uses">Electricity Uses Bill</label>
                  <input type="text" class="form-control" name="electricity_uses" id="electricity_uses" placeholder="Enter Electricity Uses"
                  @if(!empty($miscellaneousdata['electricity_uses']))
                  value= "{{$miscellaneousdata['electricity_uses']}}"
                  @else value="{{old('electricity_uses')}}"
                  @endif>
                </div>
                <div class="form-group">
                  <label for="interuses">Interuses</label>
                  <input type="text" class="form-control" name="interuses" id="interuses" placeholder="Enter Interuses"
                  @if(!empty($miscellaneousdata['interuses']))
                  value= "{{$miscellaneousdata['interuses']}}"
                  @else value="{{old('interuses')}}"
                  @endif>
                </div>
                <div class="form-group">
                  <label for="water_amount">Water Amount</label>
                  <input type="text" class="form-control" name="water_amount" id="water_amount" placeholder="Enter Water Amount"
                  @if(!empty($miscellaneousdata['water_amount']))
                  value= "{{$miscellaneousdata['water_amount']}}"
                  @else value="{{old('water_amount')}}"
                  @endif>
                </div>
                <div class="form-group">
                  <label for="water_uses">Water Uses</label>
                  <input type="text" class="form-control" name="water_uses" id="water_uses" placeholder="Enter Water Uses"
                  @if(!empty($miscellaneousdata['water_uses']))
                  value= "{{$miscellaneousdata['water_uses']}}"
                  @else value="{{old('water_uses')}}"
                  @endif>
                </div>
                <div class="form-group">
                  <label for="consumption_bill">Consumption Bill</label>
                  <input type="text" class="form-control" name="consumption_bill" id="consumption_bill" placeholder="Enter Consumption Bill"
                  @if(!empty($miscellaneousdata['consumption_bill']))
                  value= "{{$miscellaneousdata['consumption_bill']}}"
                  @else value="{{old('consumption_bill')}}"
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

