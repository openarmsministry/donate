<div id="current-name" class="panel panel-default {{ $errors->hasAny(array('new_first_name', 'new_last_name')) ? 'hidden' : '' }}">
    <div class="panel-heading">
        <h3 class="panel-title">Your Name</h3>
    </div>
    <div class="panel-body">
        <button id="edit-name-btn" class="btn" style="float:right" ><i class="fa fa-pencil"></i> Edit</button>
        <p>{{$user->first_name . ' ' . $user->last_name}}</p>
    </div>
</div>