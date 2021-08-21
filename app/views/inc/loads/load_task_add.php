<div id='task_add_modal'>
    <h5 class="modal-title mb-2">New Task Details</h5>
    <div id='succesBox' class="alert alert-success">
        Task has been added
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-heading"></i></span>
        </div>
        <input id='taskTitle' name='taskTitle' type="text" class="form-control require" placeholder="Name" value=''
               require>
    </div>
    <div id='errorBoxName' class="alert alert-danger errorBox">
        Name is a required field
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" >@</span>
        </div>
        <input id='taskEmail' name='taskEmail' type="email" class="form-control require" placeholder="Email" value=''
               require>
    </div>
    <div id='errorBoxEmail' class="alert alert-danger errorBox">
        Email is a required field
    </div>
    <div id='errorBoxEmailVal' class="alert alert-danger errorBox">
        Email is not valid
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-quote-right"></i></span>
        </div>
        <textarea id='taskBody' name='taskBody' type="text" class="form-control require" placeholder="Description"
                  require
                  value=''></textarea>
    </div>
    <div id='errorBoxDesc' class="alert alert-danger errorBox">
        Description is a required field
    </div>
    <div class="modal-footer">
        <button id='taskAdd' onclick="addTask()" type="button" class="btn btn-primary">Add Task</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>


