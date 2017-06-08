<div id="current-address" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Your Current Address</h3>
    </div>
    <div class="panel-body">
        @if( ! $user->hasAddress())
            <p style="font-size: 16px">Please add your mailing address. We can send you the end-of-year contribution letter.</p>
            <button id="add-address-btn" class="btn btn-large btn-success">Add your address now</button>
        @else
            <button id="edit-address-btn" class="btn" style="float:right" ><i class="fa fa-pencil"></i> Edit</button>
            <p>{{$user->address_line_one}}</p>
            <p>{{$user->address_line_two}}</p>
            <p>{{$user->address_city}}, {{$user->address_state}}</p>
            <p>{{$user->address_zip}}</p>
        @endif
    </div>
</div>