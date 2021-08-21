<?php

namespace app\models;

use app\libraries\Model;

class User extends Model
{


//Log In User
    public function login($data)
    {
        $hashPass = passwordHash($data['pass']);
        $userQuery = "SELECT * FROM users WHERE username = :username AND password= :hashPass ";
        $this->db->query("$userQuery");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':hashPass', $hashPass);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

}