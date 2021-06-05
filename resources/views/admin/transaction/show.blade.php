@extends('admin.layouts.app')

@section('title',' View Transaction')
@section('content')

<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
        <p>A Printable Invoice Format</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Invoice</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <section class="invoice">
            <div class="row mb-4">
              <div class="col-6">
                <h2 class="page-header"><i class="fa fa-globe"></i> Vali Inc</h2>
              </div>
              <div class="col-6">
              <h5 class="text-right">Date: {{ $transaction->created_at }}</h5>
              </div>
            </div>
            <div class="row invoice-info">
              <div class="col-4">From
                <address><strong>{{Auth::user()->name  }}</strong><br>{{Auth::user()->address}}<br>Email:{{ Auth::user()->contact_email}}<br>Phone: {{Auth::user()->contact_number}}</address>
              </div>
              <div class="col-4">To
                <address><strong> {{$transaction->project->client->client_name}}</strong><br>Phone: {{ $transaction->project->client->contact_number }}<br>Email:  {{$transaction->project->client->email}}</address>
              </div>
            <div class="col-4"><b>Invoice #FRCRCRM{{ $transaction->id }}</b><br><br><b>Payment Due:</b>@php echo (int)$dueAmount @endphp &#8377;<br>
              {{-- <b>Account:</b> 968-34567 --}}
            </div>
            </div>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>

                      <th>Project Name</th>
                      <th>Amount</th>
                      <th>Transaction Mode</th>
                      <th>Transaction Note</th>
                      <th>Payment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                    <td>{{ $transaction->project->project_name }}</td>
                    <td>@php echo (int)$transaction->amount @endphp</td>
                    <td>{{ $transaction->transaction_mode }}</td>
                    <td>{{ $transaction->transaction_note }}</td>
                    <td>{{ $transaction->payment_date }}</td>
                    </tr>


                  </tbody>
                </table>
              </div>
            </div>
            <div class="row d-print-none mt-2">
              <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>


@endsection
