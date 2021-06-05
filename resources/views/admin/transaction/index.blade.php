@extends('admin.layouts.app')

@section('title','Transactions')
@section('content')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i>Transaction List</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Transaction</li>
      </ul>
    </div>
    @if(\Session::has('success'))
    <div class="alert alert-dismissible alert-success">
    <button class="close" type="button" data-dismiss="alert">×</button><strong>{!! \Session::get('success') !!}</strong>
            </div>
@endif
   <a href="{{url('/admin/transaction/create')}}"> <button class="btn btn-outline-primary fa fa-plus pull-right" type="button">Transaction</button></a><br><br>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>

                   <th>Invoice No. </th>
                    <th>Project Name</th>
                    <th>Amount</th>
                    <th> Transaction Mode</th>
                    <th>Transaction Note</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($transactions as $transaction)
                  <tr>

                 <td>#FRCRCRM{{ $transaction->id }}</td>
                  <td>{{ $transaction->project->project_name}}</td>
                  <td>@php echo (int)$transaction->amount @endphp&#8377;</td>
                  <td>{{ $transaction->transaction_mode}}</td>
                  <td>{{ $transaction->transaction_note }}</td>
                  <td>{{$transaction->payment_date }}</td>


                    <td><a href="{{ URL::to('admin/transaction/' . $transaction->id . '/view') }}">
                      <button  class="btn btn-outline-warning fa fa-eye" type="button"></button></a>
                      <a href="{{ URL::to('admin/transaction/' . $transaction->id . '/edit') }}">
                        <button  class="btn btn-outline-primary fa fa-edit" type="button"></button></a>

                        <a href="{{ URL::to('admin/transaction/' . $transaction->id . '/delete') }}" class="delete-confirm">
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

