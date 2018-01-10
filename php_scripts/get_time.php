<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
function get_create_time($date_id){
    $query ="select creation_date,creation_time from issue_time_track where date_id IN (SELECT date_id FROM issues WHERE issue_id=".$date_id.");";
    $query_result=pg_fetch_array(db_conn($query), NULL, PGSQL_ASSOC);
    $creation_time_date=$query_result['creation_date']." ".$query_result['creation_time'];
    return $creation_time_date;
}