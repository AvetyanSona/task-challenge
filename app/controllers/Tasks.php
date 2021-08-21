<?php

use app\libraries\Controller;
use app\models\User;
use app\models\Task;

class Tasks extends Controller
{

//Open tasks adding modal
//
    public function addUserTaskModal()
    {
        $this->view('inc/loads/load_task_add', false);
    }

//Add Tasks

    function addUserTask()
    {
        $taskModel = new Task;
        $data = [
            'taskTitle' => trim($_POST['taskTitle']),
            'taskBody' =>htmlspecialchars(trim($_POST['taskBody'])) ,
            'taskEmail' => trim($_POST['taskEmail']),
            'error' => '',
        ];

        if (empty($data['taskTitle']) || empty($data['taskBody']) || empty($data['taskEmail'])) {
            echo 'required'; // taskTitle,taskBody must be filled
        } else {
            if ($taskModel->loggedInUserTaskAdd($data)) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }

//Loading Task Info In Modal

    function loadUpdateTaskInfo()
    {
        $task_id = $_POST['task_id'];
        $taskModel = new Task;
        $taskInfo = $taskModel->getLoggedInUsesSingleTask($task_id);
        if ($taskInfo) {
            $this->view('inc/loads/load_task_update', false, $taskInfo);
        } else {
            $this->redirect('login');
        }
    }

//Update Task

    function userTaskInfoUpdate()
    {
        $taskModel = new Task;
        $data = [
            'task_id' => trim($_POST['task_id']),
            'taskBody' => htmlspecialchars(trim($_POST['taskBody'])) ,
            'taskStatus' => $_POST['taskStatus'],
            'error' => '',
        ];
        if (empty($data['taskBody'])) {
            echo 'required'; // taskTitle,taskBody must be filled
        } else {
            if ($taskModel->loggedInUserTaskUpdate($data)) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }
// Load Functionality

    function loadUserTasks()
    {
        $taskModel = new Task;
        $userTasks = $taskModel->getLoggedInUserTasks();
        $this->view('inc/loads/loadUserTasks', false, $userTasks);
    }
}