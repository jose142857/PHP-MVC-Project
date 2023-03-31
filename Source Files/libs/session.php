<?php
// assign session (SET)
function session_set ($key,$val){
    $_SESSION[$key] = $val;
}

// get session (GET) if exist get session, if not return false
function session_get ($key){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    }else{
        return false;
    }
}

// delete session : check exist and delete (UNSET)
function session_delete($key){
    if(isset($_SESSION[$key])){
        unset($_SESSION[$key]);
    }
}



?>