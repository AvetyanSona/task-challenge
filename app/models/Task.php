<?php

namespace app\models;

use app\libraries\Model;

class Task extends Model
{

// Get Logged In User Tasks

    public function getLoggedInUserTasks()
    {
        $query = "SELECT *  FROM tasks ORDER BY created_at DESC LIMIT 3";
        $this->db->query($query);
        if ($data = $this->db->resultSet()) {
            return $data ;
        } else {
            return false;
        }
    }

// Get single task info for logged in user
    public function getLoggedInUsesSingleTask($task_id)
    {
        $query = "SELECT * FROM tasks WHERE id = :task_id";
        $this->db->query($query);
        $this->db->bind(':task_id', $task_id);
        $row = $this->db->singleArr();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }

    }

// Adding Task
    public function loggedInUserTaskAdd($data)
    {
        $now = date('Y-m-d H:i:s');
        $taskQuery = "INSERT INTO tasks 
                            (task_creator_name, task_creator_email, task_description, created_at)
                             VALUES 
                            (:taskTitle,:taskEmail,:taskBody,:now)";
        $this->db->query($taskQuery);
        $this->db->bind(':taskTitle', $data['taskTitle']);
        $this->db->bind(':taskBody', $data['taskBody']);
        $this->db->bind(':taskEmail', $data['taskEmail']);
        $this->db->bind(':now', $now);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

// Updating tasks
    public function loggedInUserTaskUpdate($data)
    {
        $now = date('Y-m-d H:i:s');
        $userTaskInfo = "UPDATE tasks SET task_description=:taskBody,status=:taskStatus,updated_at=:now WHERE id = :task_id";
        $this->db->query($userTaskInfo);
        $this->db->bind(':task_id', $data['task_id']);
        $this->db->bind(':taskBody', $data['taskBody']);
        $this->db->bind(':taskStatus', $data['taskStatus']);
        $this->db->bind(':now', $now);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}