<?php

function dd($value){
    var_dump($value);
    die();
}

function oldValue($value){
    if (isset($_SESSION['flash']["$value"])){
        return $_SESSION['flash']["$value"];
    }else{
        return false;
    }
}

function passwordHash($pass){
    $hashPass = md5($pass);
    return $hashPass;
}
function createUserSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['is_admin'] = $user->is_admin;
    if(isset($_SESSION)){
        return  true;
    }else{
        return false;
    }



}