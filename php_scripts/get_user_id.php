<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($user_name)) 
{ 
    $user_name=filter_var($_SESSION['username']);
} 
include 'session.php';
function get_user_id($user_name){
    $query ="SELECT user_id FROM users WHERE username='".$user_name."' LIMIT 1";
    $query_result=pg_fetch_array(db_conn($query), NULL, PGSQL_ASSOC);
    $user_id=($query_result['user_id']);
    return $user_id;
}