@extends('layouts.app')
@section('head-script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('{{ config('services.stripe.key') }}');
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials.message')
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials.onetime-donation')
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                @include('partials.current-subscription')
            </div>
            <div class="col-md-5">
                @if ( $user->subscribed('flexible'))
                    @include('partials.update-subscription')
                @else
                    @include('partials.create-subscription')
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                @include('partials.current-name')
                @include('partials.update-name')
                @include('partials.current-card')
                @include('partials.current-address')
                @include('partials.update-address')
            </div>
            <div class="col-md-5">
                @include('partials.setup-card')
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Receipts</div>
                    <div class="panel-body">Below you will find all the receipts for the financial contributions you have made through the Open Arms Ministry Donation Platform.
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Total</th>
                            <th>PDF</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->tz('America/Chicago')->toFormattedDateString() }}</td>
                                <td>{{ $invoice->total() }}</td>
                                <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body-script')
    <script src="js/dashboard.js"></script>
@endsection
