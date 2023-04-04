<?php
// create URL
function base_url($uri = ''){
    return 'http://localhost/php_example/'.$uri;
}
 
//  redirect function
function redirect($url){
    header("Location:{$url}");
    exit();
}
 
// get value from $_POST
function input_post($key){
    return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}
 
// get value from $_GET
function input_get($key){
    return isset($_GET[$key]) ? trim($_GET[$key]) : false;
}
 
// check submit
function is_submit($key){
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
}
 
//  show error
function show_error($error, $key){
    echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';
}







?>