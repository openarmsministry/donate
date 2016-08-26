<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Your Current Card</h3>
    </div>
    <div class="panel-body">
        @if(is_null($user->card_brand))
            You currently do not have a Credit Card setup
        @else
            <h4>Card Type</h4>
            <p>{{$user->card_brand}}</p>
            <h4>Last Four Digits</h4>
            <p>{{$user->card_last_four}}</p>
        @endif
    </div>
</div>