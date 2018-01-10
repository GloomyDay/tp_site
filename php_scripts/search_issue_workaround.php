<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
$cf_secondary_scr='True';
include 'main_1.php';
function search_issue_workaround(){
    $search_text = filter_var($_POST['search_text']);
    $query="SELECT issue_id,subject,issue_desc,issue_type,issue_solve_method from issues where issue_solve_method ILIKE '%".$search_text."%';";
    $issue_table=gen_table($query);
    return $issue_table;
    
}
  if (isset($_POST['search_issue'])) {
      echo search_issue_workaround();
      error_log("Posted?!", 0);
  }