<div class="panel panel-default panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Update your Recurring Donation</h3>
    </div>
    <div class="panel-body">
        <form id="create-subscription" action="{{'subscription/update'}}" method="POST">
            {{ csrf_field() }}
            <label for="amount">Monthly Contribution</label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="tel" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-addon">.00</span>
            </div>
            <br>
            <input class="btn btn-primary submit" type="submit" value="Submit">
        </form>
    </div>
</div>

