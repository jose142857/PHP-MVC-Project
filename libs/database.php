<?php

if(defined('IN_SITE'))die ('The request not found');
// $conn = null;
// connection function 
function db_connect(){
    global $conn;
    // check if connection is not exist then create connection 
    if(!$conn){ 
        $conn = mysqli_connect('localhost','root',null,'user_management');
        // mysqli_set_charset($conn,'UTF-8');
    }else{
        echo "connected successfully!";
    }

}
db_connect();
// close connection function 

function db_close(){
    global $conn;
    // check if connection exist then close it 
    if($conn){
        mysqli_close($conn);

    }

}

// show datalist (select *)
function db_get_list($sql){
    db_connect();
    global $conn;
    $data  = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}
print_r(db_get_list('select * from tb_user') );
echo "--------------------------------<br>";


// show record with a condition 
function get_db_record($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
    
}
print_r(get_db_record('select * from tb_user where id =2'));
echo "--------------------------------------";

// excute query command function (insert, update, delete), return True or False

function excute_sql($sql){
    db_connect();
    echo "result: ";
    global $conn;
    $result = mysqli_query($conn,$sql);
    return $result;

}
var_export(excute_sql('update tb_user set username = "minhhoa"where id =2'));




?>