<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
    $user_role = filter_var($_SESSION['role']);
    if ($user_role == 'support'){
        header("HTTP/1.1 200 OK");
    }
     else {
        header("HTTP/1.1 401 Unauthorized");
    };
?>

