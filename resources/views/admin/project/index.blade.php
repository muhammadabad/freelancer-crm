@extends('admin.layouts.app')

@section('title','Projects')
@section('content')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Project List</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Project</li>
      </ul>
    </div>
    @if(\Session::has('success'))
    <div class="alert alert-dismissible alert-success">
    <button class="close" type="button" data-dismiss="alert">×</button><strong>{!! \Session::get('success') !!}</strong>
            </div>
@endif
   <a href="{{url('/admin/project/create')}}"> <button class="btn btn-outline-primary fa fa-plus pull-right" type="button">Project</button></a><br><br>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>S No.</th>
                    <th>Client Name</th>
                    <th>Project Name</th>
                    <th>Started Date</th>
                    <th>Delivery Date</th>
                    <th>Budget</th>
                    <th>No Of Developers</th>
                    <th>Status</th>
                    <th>Plan Report</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                  <tr>
                 <td>{{ $loop->iteration }}</td>
                  <td>{{ $project->client->client_name }}</td>
                  <td>{{ $project->project_name }}</td>
                  <td>{{ $project->started_date }}</td>
                  <td>{{ $project->delivery_date }}</td>
                  <td>{{ $project->budget }}</td>
                  <td>{{ $project->no_of_developers }}</td>
                  <td>{{ $project->status }}</td>
                  <td> @if( !$project->plan_report_url==null)

                    <a href="{{ $project->plan_report_url }}" class="button" download><i class="fa fa-download"></i>Download </a>
                  @endif
                  </td>
                    <td><a href="{{ URL::to('admin/project/' . $project->id . '/edit') }}">
                        <button  class="btn btn-outline-primary fa fa-edit" type="button"></button></a>

                        <a href="{{ URL::to('admin/project/' . $project->id . '/delete') }}" class="delete-confirm">
                            <button  class="btn btn-outline-danger fa fa-trash " type="button"></button></a>
                    </td>

                    </tr>
                    @endforeach()
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        </div>

<script>
    $(".delete-confirm").on("click", function (event) {
        event.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this file!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false,
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>

@endsection

