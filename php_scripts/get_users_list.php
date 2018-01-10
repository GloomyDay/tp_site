<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include_once 'db_connect.php';
include_once 'get_user_id.php';
$p_issue_w=filter_input(INPUT_POST, 'get_p_issue_w',FILTER_SANITIZE_NUMBER_INT);
function gen_users_select(){
    $query="SELECT user_id,first_name,second_name from users where role='support';";
    $output= pg_fetch_all(db_conn($query));
    $temp_arr=array();
    $user_select=array();
    foreach ($output as $arr){
      $temp_arr[]="<option value=".$arr['user_id'].">".$arr['second_name']." ".$arr['first_name']."</option>";
    }
    $user_select[] = "<select class='custom-select mr-sm-2' name='i_w'>".implode('', $temp_arr)."</select>";
    return $user_select[0];
}
function gen_users_arr(){
    $query="SELECT user_id,first_name,second_name from users;";
    $output= pg_fetch_all(db_conn($query));
    $user_arr=array();
    foreach ($output as  $key => $value){
      $surname_plus_name=$value['second_name']." ".$value['first_name'];
      $user_arr[$value['user_id']]=$surname_plus_name;
    }
    return $user_arr;
}
if (isset($p_issue_w) || !($p_issue_w == null)){
    echo gen_users_select();
}