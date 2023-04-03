<?php
if(!defined('IN_SITE'))die ('The request not found');

//set login function(For each user save 2 information: username & level)
function set_logged($username,$level){
    session_set('ss_user_token',array(
        'username'=>$username,
        'level' => $level
    ));
}

// set logout function(delete the key ss_user_token)

function set_logout(){
    session_delete('ss_user_token');
}

// check login status function(check the key 'ss_user_token'is exist or not)
function is_logged(){
    $user = session_get('ss_user_token');
    return $user;
} 

// check user is admin or not(check login status then check condition) 
function is_admin(){
    $user =is_logged();
    if(!empty($user['level'])&& $user['level']=='1'){
     return true;   
    }else{
        return false;
    }
    
    
}
?>