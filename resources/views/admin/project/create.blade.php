@extends('admin.layouts.app')

@section('title','Add Project')
@section('content')


<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>ADD Project</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Project</li>
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
            <form action="{{ url('admin/project') }}" method="post" enctype="multipart/form-data">
               @csrf

               <div class="row">
                <div class="form-group has-success col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Client Name</label>
                  <select class="js-example-basic-single form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }} {{ old('client_id') ? 'is-valid' : '' }} "
                name="client_id"  value="{{ old('client_id') }}">
                <option value="">--Select Client--</option>
                @forelse($clients as $client)
                  <option value="{{ $client->id }}"  {{ old('client_id')==$client->id ? 'selected="selected"' :"" }}>{{ $client->client_name }}</option>
                @empty
                <option value="">--No Record Found--</option>
                @endforelse
                  </select>
                    @error('client_id')
                    <p class="text-danger">{{ $message }} </p>
                     @enderror
                </div>
                <div class="form-group has-danger col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Project Name</label>
                <input class="form-control {{ $errors->has('project_name') ? 'is-invalid' :''}} {{ old('project_name') ? 'is-valid' : '' }}"  type="text" name="project_name" value="{{ old('project_name') }}" placeholder="Enter Project Name">
                  @error('project_name')
                  <p class="text-danger">{{ $message }} </p>
                   @enderror

                </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Started Date</label>
                      <input class="form-control {{ $errors->has('started_date') ? 'is-invalid' : '' }} {{ old('started_date') ? 'is-valid':'' }}"  name="started_date" type="date" value="{{ old('started_date') }}">
                      @error('started_date')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Delivery Date</label>
                      <input class="form-control {{ $errors->has('delivery_date') ? 'is-invalid' : '' }} {{ old('delivery_date') ? 'is-valid':'' }}"  name="delivery_date" type="date" value="{{ old('delivery_date') }}">
                      @error('delivery_date')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>

                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Budget</label>
                      <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }} {{ old('budget') ? 'is-valid':'' }}"  name="budget" type="number" value="{{ old('budget') }}" placeholder="Enter Project Budget">
                      @error('budget')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">No Of Developers</label>
                      <input class="form-control {{ $errors->has('no_of_developers') ? 'is-invalid' : '' }} {{ old('no_of_developers') ? 'is-valid':'' }}"  name="no_of_developers" type="number" value="{{ old('no_of_developers') }}" placeholder="Enter Number of Developers">
                      @error('no_of_developers')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Status</label>
                      <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }} {{ old('status') ? 'is-valid':'' }}"  name="status"  value="{{ old('status') }}">
                     <option value="">--Select Status--</option>
                     <option value="pending">Pending</option>
                     <option value="under_working">Under Working</option>
                     <option value="completed">Completed</option>
                      </select>
                        @error('status')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Plan Report</label>
                      <input type="file" class="form-control {{ $errors->has('plan_report_url') ? 'is-invalid' : '' }} {{ old('plan_report_url') ? 'is-valid':'' }}"  name="plan_report_url" value="{{ old('plan_report_url') }}">
                      @error('plan_report_url')
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
    <script>
      $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
  </script>
    @endsection
