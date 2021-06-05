@extends('admin.layouts.app')

@section('title','Edit Profile')
@section('content')


<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>Edit Profile</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
            <form action="{{ url('admin/profile-update') }}" method="post" enctype="multipart/form-data">
               @csrf

               <div class="row">
                <div class="form-group has-danger col-lg-6">
                    <label class="form-control-label" for="inputSuccess1">Name</label>
                  <input class="form-control {{ $errors->has('name') ? 'is-invalid' :''}} {{ old('name') ? 'is-valid' : '' }}"  type="text" name="name" value="{{ $profile->name }}" placeholder="Enter Your Name">
                    @error('name')
                    <p class="text-danger">{{ $message }} </p>
                     @enderror
                    </div>

                <div class="form-group has-danger col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Username/Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' :''}} {{ old('email') ? 'is-valid' : '' }}"  type="text" name="email" value="{{ $profile->email }}" placeholder="Enter Your Email">
                  @error('email')
                  <p class="text-danger">{{ $message }} </p>
                   @enderror

                </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Password</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"  name="password" type="text" placeholder="Enter New Password if Want to Change">
                      @error('password')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Contact Email</label>
                      <input class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }} {{ old('contact_email') ? 'is-valid':'' }}"  name="contact_email" type="email" value="{{ $profile->contact_email }}" placeholder="Enter Your Contact Email">
                      @error('contact_email')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>

                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Contac Number</label>
                      <input class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }} {{ old('contact_number') ? 'is-valid':'' }}"  name="contact_number" type="number" value="{{ $profile->contact_number }}" placeholder="Enter Your Contact Number">
                      @error('contact_number')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Address</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }} {{ old('address') ? 'is-valid':'' }}"  name="address" type="number"  placeholder="Enter Your Address ">{{ $profile->address }}</textarea>
                      @error('address')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
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
