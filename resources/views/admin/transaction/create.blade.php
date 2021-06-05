@extends('admin.layouts.app')

@section('title','Add Transaction')
@section('content')


<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i>ADD Transaction</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Transaction</li>
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
            <form action="{{ url('admin/transaction') }}" method="post" enctype="multipart/form-data">
               @csrf

               <div class="row">
                <div class="form-group has-success col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Project Name</label>
                  <select  class="js-example-basic-single form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }} {{ old('project_id') ? 'is-valid' : '' }} "
                name="project_id"  value="{{ old('project_id') }}">
                <option value="">--Select Project--</option>
                @forelse($projects as $project)
                  <option value="{{ $project->id }}"  {{ old('project_id')==$project->id ? 'selected="selected"' :"" }}>{{ $project->project_name }}</option>
                @empty
                <option value="">--No Record Found--</option>
                @endforelse
                  </select>
                    @error('project_id')
                    <p class="text-danger">{{ $message }} </p>
                     @enderror
                </div>
                <div class="form-group has-danger col-lg-6">
                  <label class="form-control-label" for="inputSuccess1">Amount</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' :''}} {{ old('amount') ? 'is-valid' : '' }}"  type="number" name="amount" value="{{ old('amount') }}" placeholder="Enter Amount">
                  @error('amount')
                  <p class="text-danger">{{ $message }} </p>
                   @enderror

                </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Transaction Mode</label>
                      <input class="form-control {{ $errors->has('transaction_mode') ? 'is-invalid' : '' }} {{ old('transaction_mode') ? 'is-valid':'' }}"  name="transaction_mode" type="text" value="{{ old('transaction_mode') }}" placeholder="Enter Transaction Mode">
                      @error('transaction_mode')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>
                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Transaction Note</label>
                      <input class="form-control {{ $errors->has('transaction_note') ? 'is-invalid' : '' }} {{ old('transaction_note') ? 'is-valid':'' }}"  name="transaction_note" type="text" value="{{ old('transaction_note') }}" placeholder="Enter Transaction Note">
                      @error('transaction_note')
                      <p class="text-danger" > {{ $message }} </p>
                      @enderror
                    </div>

                    <div class="form-group has-success col-lg-6">
                      <label class="form-control-label" for="inputSuccess1">Payment Date</label>
                      <input id="date" class="form-control {{ $errors->has('payment_date') ? 'is-invalid' : '' }} {{ old('payment_date') ? 'is-valid':'' }}"  name="payment_date" type="date" value="{{ old('budget') }}" placeholder="Enter Payment Date">
                      @error('payment_date')
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
