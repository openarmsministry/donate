@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2> Frequently Asked Questions </h2>
          <div class="panel panel-default">
            <div class="panel-heading">What is Open Arms Ministry?</div>
            <div class="panel-body">
              Open Arms Ministry (OAM) is a 501(c)3 nonprofit organization that aims to serve individuals and families who are experiencing homelessness and/or food-insecurities.
              To find out more, please visit <a href="https://openarmsministry.org">our homepage</a>.
            </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">How do I know this platform is safe with my credit card information?</div>
              <div class="panel-body">
                We actually do not store or process your credit card on this platform at all.  The only information we store is your name and the last four digits of your card number for identification purposes.
                <br><br>
                We use a payment gateway provider called <a href="https://stripe.com">Stripe</a> to store and process your credit card.
                Stripe is a popular online payment platform that is trusted by companies like Target, Twitter, and Kickstarter. <a href="https://stripe.com/customers">See what other companies trust Stripe</a>
              </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">What happens if something goes wrong with this platform?</div>
                <div class="panel-body">
                  If you see something unexpected happen, please take a screenshot of the error and send an email to <a href="mailto:techsupport@openarmsministry.org">techsupport@openarmsministry.org</a>
                </div>
              </div>
    </div>
</div>
@endsection
