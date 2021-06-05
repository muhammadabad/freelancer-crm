@extends('admin.layouts.app')

@section('title','Clients')
@section('content')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Client List</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Client</li>
      </ul>
    </div>
    @if(\Session::has('success'))
    <div class="alert alert-dismissible alert-success">
    <button class="close" type="button" data-dismiss="alert">×</button><strong>{!! \Session::get('success') !!}</strong>
            </div>
@endif
   <a href="{{url('/admin/client/create')}}"> <button class="btn btn-outline-primary fa fa-plus pull-right" type="button">Client</button></a><br><br>

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
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Referenced By</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                  <tr>
                 <td>{{ $loop->iteration }}</td>
                  <td>{{ $client->client_name }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->contact_number }}</td>
                  <td>{{ $client->referenced_by }}</td>
                    <td>@php echo  date('d-m-Y', strtotime($client->created_at)); @endphp</td>
                    <td><a href="{{ URL::to('admin/client/' . $client->id . '/edit') }}">
                        <button  class="btn btn-outline-primary fa fa-edit" type="button"></button></a>

                        <a href="{{ URL::to('admin/client/' . $client->id . '/delete') }}" class="delete-confirm">
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

