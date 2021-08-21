
//Open Modal And Show User Info For Update
function updateUserInfoModal() {
    $("#demo_modal").load("/users/loadUpdateUserInfo", {}, function () {
        $("#demo_modal_parent").modal('show')
    });
}

// Open Modal to Add Task
function addTaskModal() {
    $("#demo_modal").load("/tasks/addUserTaskModal", {}, function () {
        $("#demo_modal_parent").modal('show')
    });
}

// Open Modal And Show Task Info For Update
function task_update_modal(id) {
    $("#demo_modal").load("../tasks/loadUpdateTaskInfo", {task_id: id}, function () {
        $("#demo_modal_parent").modal('show');
    });
}
function rerenderUserTasksMainContent(){
    location.reload()
}


// Adding New Task
function addTask(){
    var taskTitle = $('#taskTitle').val();
    var taskBody = $('#taskBody').val();
    var taskEmail = $('#taskEmail').val();
    if (taskTitle == '' || taskBody == '' || taskEmail == '') {
        if(taskTitle == ''){
            $('#errorBoxName').show();
        }
        if(taskBody == ''){
            $('#errorBoxDesc').show();
        }
        if(taskEmail == ''){
            $('#errorBoxEmail').show();
        }else if(!validateEmail(taskEmail)){
            $('#errorBoxEmailVal').show();
        }
        // $('#errorBox').show();
    } else {
        $('.errorBox').hide();
        var formData = new FormData();
        formData.append('taskTitle', taskTitle);
        formData.append('taskBody', taskBody);
        formData.append('taskEmail', taskEmail);
        $.ajax({
            url: "../tasks/addUserTask",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 'required') {
                    $('.errorBox').show();
                }
                if (data == 'success') {
                    $("#demo_modal_parent").modal('hide');
                    rerenderUserTasksMainContent();
                }
                if(data == 'error'){
                    $('#errorBox').show();
                }
            },
        })
    }
}

//Updating tasks
function updateTask(is_admin) {
    if(!is_admin){
        window.location.href = "/users/login";return;
    }
    var task_id = $('#task_id').val();
    var taskBody = $('#taskNewBody').val();
    var taskStatus = $('#task_status:checked').length;
    if (taskBody == '') {
        $('#errorBox').show();
    } else {
        $('#errorBox').hide();
        var formData = new FormData();
        formData.append('task_id', task_id);
        formData.append('taskBody', taskBody);
        formData.append('taskStatus', taskStatus);
        $.ajax({
            url: "../tasks/userTaskInfoUpdate",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 'required') {
                    $('#errorBox').show();
                }
                if (data == 'success') {
                    // alert('ok');
                    $("#demo_modal_parent").modal('hide');
                    if($('#list-tab').length){
                        // alert('sdhf');
                        var active_a = $('#list-tab').find("a.active");
                        $(active_a).click();
                    }else{
                        rerenderUserTasksMainContent();
                    }
                }
                if(data == 'error'){
                    $('#errorBox').show();
                }
            },
        })
    }
}
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}













