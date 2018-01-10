<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include_once 'db_connect.php';
include_once 'get_user_id.php';
$client_req=filter_input(INPUT_POST, 'client_table',FILTER_SANITIZE_NUMBER_INT);
function get_pg_table_length(){
    global $client_req;
    if ($_SESSION['role']=="client"){
        $user_name=filter_var($_SESSION['username']);
        $user_id=get_user_id($user_name);
        $query = "SELECT count(*) AS count FROM issues where client_id=".$user_id.";";
    }
     elseif ($_SESSION['role']=="support") {
        if (isset($client_req) || !($client_req == null)){
            $user_name=filter_var($_SESSION['username']);
            $user_id=get_user_id($user_name);
            $query = "SELECT count(*) AS count FROM issues where client_id=".$user_id.";";
        }
        else {
            $query ="SELECT count(*) AS count FROM issues;";
        }
    }
    error_log("WRITINGGGG_client".$query,0);
    $output= pg_fetch_array(db_conn($query));
    return $output['count'];    
}
function print_nav_ul(){
    $count_all=get_pg_table_length();
    $pages = ceil($count_all/5); 
    error_log("pages".$pages,0);
    $temp_li=array();
    $link_arr=array();
    if($pages>=1){
        for($i=0;$i<=$count_all;$i+=5){
            $val=$i / 5 ;
            error_log("val".$val,0);
            $temp_li[]="<li class='page-item pagination-sm'><a class='page-link' href='#'>{$val}</a></li>";
        }
        $link_arr[]="<ul class='pagination' id='blabla'>". implode('', $temp_li) . "</ul>";
    }
    $return_data=implode('', $link_arr);
    return $return_data;
}
function get_offset($page){
    $count_all=get_pg_table_length();
    $pages = ceil($count_all/5); 
    $offset_arr=array();
    if($pages>=1){
        for($i=0;$i<=$count_all;$i+=5){
        $list=$i / 5 ;
        $offset_arr[$list]=$i;
        }
    $return_data=$offset_arr[$page];
    }
    return $return_data;
}
if (!isset($cf_secondary_scr)){
    if (isset($client_req) || !($client_req == null)){
        $a=print_nav_ul();
        error_log("WRITINGGGG_client".$a,0);
        echo print_nav_ul();
    }
    else {
        $a=print_nav_ul();
        error_log("WRITINGGGG_all".$a,0);
        echo print_nav_ul();
    }
}