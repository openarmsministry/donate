<div id="update-name" class="panel panel-default panel-warning {{ $errors->hasAny(array('new_first_name', 'new_last_name')) ? '' : 'hidden' }}">
    <div class="panel-heading">
        <h3 class="panel-title">Update Your Name</h3>
    </div>
    <div class="panel-body">
        <form id="update-name-form" action="{{url('users/name')}}" method="POST">
            {{ csrf_field() }}
            <h4>Input your Name Below</h4>
            <div class="card-fields form-group">
                <div class="{{ $errors->has('new_first_name') ? 'has-error' : '' }}">
                    <input type="text" id="new-first-name" name="new_first_name" placeholder="First Name" class="form-control" value="{{$user->first_name}}"> 
                    @if ($errors->has('new_first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new_first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="{{ $errors->has('new_last_name') ? 'has-error' : '' }}">
                    <input type="text" id="new-last-name" name="new_last_name" placeholder="Last Name" class="form-control" value="{{$user->last_name}}"> 
                    @if ($errors->has('new_last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new_last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <button id="submit-name-btn" class="btn btn-primary" type="submit">Submit</button>
            <button id="cancel-name-btn" class="btn">Cancel</button>
        </form>
    </div>
</div>
