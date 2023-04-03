<?php
// project protecting from hacker
define("IN_SITE", true);
 
// get module & action from url

// if(isset($_GET['m'])){
//     $module = $_GET['m'];
// }else{
//     $module = '';
// }
$module = isset($_GET['m']) ? $_GET['m'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';
 
// in case of can not get module & action from user, set default
if (empty($module) || empty($action)){
    $module = 'common';
    $action = 'login';
}
 
// create path
$path = 'modules/'.$module . '/' . $action . '.php';
 
// in case of URL run correctly
if (file_exists($path)) {
    include_once ('../libs/session.php');
    include_once ('../libs/database.php');
    include_once ('../libs/role.php');
    include_once ('../libs/helper.php');
    include_once ($path);
} 
else {
    // URL wrong or not exist, show error
    include_once ('modules/common/404.php');
}








?>