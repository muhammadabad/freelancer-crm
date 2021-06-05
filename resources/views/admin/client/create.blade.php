@extends('admin.layouts.app')

@section('title','Add Client')
@section('content')


<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>Add Client</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Client</li>
        <li class="breadcrumb-item"><a href="#">Create</a></li>
      </ul>
    </div>

    @if(\Session::has('success'))
    <div class="alert alert-dismissible alert-success">
    <button class="close" type="button" data-dismiss="alert">×</button><strong>{!! \Session::get('success') !!}</strong>
            </div>
@endif
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="row">

            <div class="col-lg-12 ">
            <form action="{{ url('admin/client') }}" method="post">
               @csrf

               <div class="row">
                <div class="form-group has-success col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Client Name</label>
                  <input class="form-control {{ $errors->has('client_name') ? 'is-invalid' : '' }} {{ old('client_name') ? 'is-valid' : '' }} "
                name="client_name" type="text" value="{{ old('client_name') }}">
                    @error('client_name')
                    <p class="text-danger">{{ $message }} </p>
                     @enderror
                </div>
                <div class="form-group has-danger col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' :''}} {{ old('email') ? 'is-valid' : '' }}"  type="text" name="email" value="{{ old('email') }}">
                  @error('email')
                  <p class="text-danger">{{ $message }} </p>
                   @enderror

                </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Contact Number</label>
                      <input class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }} {{ old('contact_number') ? 'is-valid':'' }}"  name="contact_number" type="text" value="{{ old('contact_number') }}">
                      @error('contact_number')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-danger col-lg-6">
                      <label class="form-control-label" for="inputDanger1">Referenced BY</label>
                    <input class="form-control {{ $errors->has('referenced_by') ? 'is-invalid' :'' }} {{ old('referenced_by') ? 'is-valid':'' }}"  type="text" name="referenced_by" value="{{ old('referenced_by') }}">
                      @error('referenced_by')
                         <p class="text-danger">{{ $message }} </p>
                      @enderror
                    </div>
                   <div>
            </div>
          </div>
          <div class="tile-footer text-center">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </main>
    <!-- Essential javascripts for application to work-->
    @endsection
