<div id="update-name" class="panel panel-default panel-warning hidden">
    <div class="panel-heading">
        <h3 class="panel-title">Update Your Name</h3>
    </div>
    <div class="panel-body">
        <form id="update-name-form" action="{{url('users/name')}}" method="POST">
            {{ csrf_field() }}
            <h4>Input your Name Below</h4>
            <div class="card-fields form-group">
                <input type="text" id="new-name" name="new_name" placeholder="Name" class="form-control" value="{{$user->name}}"> 
            </div>
            <button id="submit-name-btn" class="btn btn-primary" type="submit">Submit</button>
            <button id="cancel-name-btn" class="btn">Cancel</button>
        </form>
    </div>
</div>
