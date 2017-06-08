<div id="update-address" class="panel panel-default panel-warning hidden">
    <div class="panel-heading">
        <h3 class="panel-title">Update Your Mailing Address</h3>
    </div>
    <div class="panel-body">
        <form id="update-address-form" action="{{url('users/address')}}" method="POST">
            {{ csrf_field() }}
            <h4>Input your Address Below</h4>
            <div class="card-fields">
                <input type="text" id="street" name="line_one" placeholder="Line 1" class="form-control" value="{{$user->address_line_one}}">
                <input type="text" id="suite" name="line_two" placeholder="Line 2" class="form-control" value="{{$user->address_line_two}}">
                <div class="form-group form-inline">
                    <input type="text" id="city" name="city" placeholder="City" class="form-control" value="{{$user->address_city}}">
                    <select name="state" id="address-state" class="form-control" data-val="{{$user->address_state}}">
                        <option value="">State</option>
                        <option value="AK">AK</option>
                        <option value="AL">AL</option>
                        <option value="AR">AR</option>
                        <option value="AZ">AZ</option>
                        <option value="CA">CA</option>
                        <option value="CO">CO</option>
                        <option value="CT">CT</option>
                        <option value="DC">DC</option>
                        <option value="DE">DE</option>
                        <option value="FL">FL</option>
                        <option value="GA">GA</option>
                        <option value="GU">GU</option>
                        <option value="HI">HI</option>
                        <option value="IA">IA</option>
                        <option value="ID">ID</option>
                        <option value="IL">IL</option>
                        <option value="IN">IN</option>
                        <option value="KS">KS</option>
                        <option value="KY">KY</option>
                        <option value="LA">LA</option>
                        <option value="MA">MA</option>
                        <option value="MD">MD</option>
                        <option value="ME">ME</option>
                        <option value="MH">MH</option>
                        <option value="MI">MI</option>
                        <option value="MN">MN</option>
                        <option value="MO">MO</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="NC">NC</option>
                        <option value="ND">ND</option>
                        <option value="NE">NE</option>
                        <option value="NH">NH</option>
                        <option value="NJ">NJ</option>
                        <option value="NM">NM</option>
                        <option value="NV">NV</option>
                        <option value="NY">NY</option>
                        <option value="OH">OH</option>
                        <option value="OK">OK</option>
                        <option value="OR">OR</option>
                        <option value="PA">PA</option>
                        <option value="PR">PR</option>
                        <option value="PW">PW</option>
                        <option value="RI">RI</option>
                        <option value="SC">SC</option>
                        <option value="SD">SD</option>
                        <option value="TN">TN</option>
                        <option value="TX">TX</option>
                        <option value="UT">UT</option>
                        <option value="VA">VA</option>
                        <option value="VI">VI</option>
                        <option value="VT">VT</option>
                        <option value="WA">WA</option>
                        <option value="WI">WI</option>
                        <option value="WV">WV</option>
                        <option value="WY">WY</option>
                    </select>
                    <input type="tel" id="zip" name="zip" placeholder="Zipcode" class="form-control" value="{{$user->address_zip}}">
                </div>
            </div>
            <button id="submit-address-btn" class="btn btn-primary" type="submit">Submit</button>
            <button id="cancel-address-btn" class="btn">Cancel</button>
        </form>
    </div>
</div>

