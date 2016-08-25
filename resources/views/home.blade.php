@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Donation Recepts</div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Total</td>
                            <td>PDF</td>
                        </tr>
                    </thead>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
