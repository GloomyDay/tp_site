<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$cf_secondary_scr='True';
include 'session.php';
include 'main_1.php';
include 'table_navigate.php';
include_once 'get_user_id.php';
$page=filter_input(INPUT_POST, 'selected_page',FILTER_SANITIZE_NUMBER_INT);
$issues_by_worker=filter_input(INPUT_POST, 'issues_by_worker',FILTER_SANITIZE_NUMBER_INT);
$page_a=filter_input(INPUT_POST, 'page_all',FILTER_SANITIZE_NUMBER_INT);
$page_m=filter_input(INPUT_POST, 'page_my',FILTER_SANITIZE_NUMBER_INT);
$client_req=filter_input(INPUT_POST, 'client_table',FILTER_SANITIZE_NUMBER_INT);
if ((!isset($page) || ($page == null)) && (isset($page_m) || !($page_m == null)) && (!isset($page_a) || ($page_a == null)) ){
    $offset=get_offset($page_m);
}
elseif ((!isset($page) || ($page == null)) && (isset($page_a) || !($page_a == null)) && (!isset($page_m) || ($page_m == null))) {
    $offset=get_offset($page_a);
}
function get_table_nav($offset){
    global $client_req;
    if ($_SESSION['role']=="client"){
        $user_name=filter_var($_SESSION['username']);
        $user_id=get_user_id($user_name);
        $columns="issue_id,date_id,subject,issue_desc,priority,issue_type,responsible_worker_id,client_id,issue_status";
        $query = "SELECT ".$columns." from issues where client_id=".$user_id." ORDER BY issue_id LIMIT 5 OFFSET ".$offset.";";
    }
     elseif ($_SESSION['role']=="support") {
        $columns="issue_id,date_id,subject,issue_desc,priority,issue_type,responsible_worker_id,client_id,issue_status";
        if (isset($client_req) || !($client_req == null)){
            $user_name=filter_var($_SESSION['username']);
            $user_id=get_user_id($user_name);
            $query ="SELECT ".$columns." from issues where client_id=".$user_id." ORDER BY issue_id LIMIT 5 OFFSET ".$offset.";";
        }
        else {
            $query ="SELECT ".$columns." from issues ORDER BY issue_id LIMIT 5 OFFSET ".$offset.";";
        }
    }
    $issue_table=gen_table($query);
    return $issue_table;
}
function get_table_curr_worker($offset){
    $user_name=filter_var($_SESSION['username']);
    $user_id=get_user_id($user_name);
    $columns="issue_id,date_id,subject,issue_desc,priority,issue_type,responsible_worker_id,client_id,issue_status";
    $query="SELECT ".$columns." from issues where responsible_worker_id=".$user_id." ORDER BY issue_id  LIMIT 5 OFFSET ".$offset.";";
    $issue_table=gen_table($query);
    error_log("returned_something", 0);
    return $issue_table;
}
if (isset($page_a) || !($page_a == null)){
    echo get_table_nav($offset);
}
if (isset($issues_by_worker) || !($issues_by_worker == null)){
    echo get_table_curr_worker($offset);
}
else {
    error_log("not working", 0);
}
  
