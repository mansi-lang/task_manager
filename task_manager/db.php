<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "task_manager";

$conn = new mysqli($server_name, $username, $password, $db_name);

if(!$conn){
    echo "DB not connected";
}
?>