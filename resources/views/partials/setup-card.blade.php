<div class="panel panel-default panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Update Your Card</h3>
    </div>
    <div class="panel-body">
        <form id="update-card" action="{{url('card/update')}}" method="POST">
            {{ csrf_field() }}
            <div class="card-wrapper"></div>
            <h4>Input your information below</h4>
            <div class="card-fields">
                <input data-stripe="number" type="tel" id="number" placeholder="Number" class="form-control">
                <div class="form-group form-inline">
                    <input data-stripe="name" type="text" id="name" placeholder="Name" class="form-control">
                    <input data-stripe="expiry" type="text" id="expiry" placeholder="MM/YY" class="form-control">
                    <input data-stripe="cvc" type="tel" id="cvc" placeholder="CVC" class="form-control">
                </div>
            </div>
            <input type="text" type="hidden" class="hidden" name="token" id="token">
            <input class="btn btn-primary submit" type="submit" value="Submit">
        </form>
    </div>
</div>

