<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include_once 'db_connect.php';
$new_issue_worker=filter_input(INPUT_POST, 'i_w',FILTER_SANITIZE_NUMBER_INT);
$issue_id=filter_input(INPUT_POST, 'issue_id',FILTER_SANITIZE_NUMBER_INT);
$get_issue_w=filter_input(INPUT_POST, 'g_c_issue_w',FILTER_SANITIZE_NUMBER_INT);
function set_new_issue_worker($new_issue_worker,$issue_id){
    $query="UPDATE issues set responsible_worker_id=".$new_issue_worker." where issue_id=".$issue_id.";";
    db_conn($query);
}
function get_current_issue_worker($issue_id){
    $query="select responsible_worker_id from issues where issue_id=".$issue_id.";";
    $output= pg_fetch_array(db_conn($query));
    $cur_worker_id=$output['responsible_worker_id'];
    $query="select first_name,second_name from users where user_id=".$cur_worker_id.";";
    $output= pg_fetch_array(db_conn($query));
    return "<p>".$output['second_name']." ".$output['first_name']."</p>";
}

if (isset($new_issue_worker) || !($new_issue_worker == null)){
    echo set_new_issue_worker($new_issue_worker,$issue_id);
}
if (isset($get_issue_w) || !($get_issue_w == null)){
    echo get_current_issue_worker($issue_id);
}



