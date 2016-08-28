<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Your Monthly Recurring Donation</h3>
    </div>
    <div class="panel-body">
        @if( ! $user->subscribed('flexible'))
            You do not have a recurring donation set up.
        @else
            <h4>You are donating ${{ $user->subscription('flexible')->quantity }} every month!</h4>
            <p>Thank you so much!</p>
        @endif
    </div>
</div>