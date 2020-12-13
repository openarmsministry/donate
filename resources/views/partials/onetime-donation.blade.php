<div class="panel panel-default panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Contribute a One-Time Contribution</h3>
    </div>
    <div class="panel-body">
        <form id="onetime-donation" action="{{'donation'}}" method="POST">
            {{ csrf_field() }}
            <label for="amount"></label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="tel" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
            <br>
            <input id="onetime-donate-button" class="btn btn-primary submit" type="submit" value="Submit">
        </form>
    </div>
</div>

