<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include 'db_connect.php';
foreach ($_POST as $key => $value)
{
  error_log("$key "." $value", 0);
}
function create_new_issue(){
    include 'config.php';
    $query="INSERT INTO issue_time_track VALUES (DEFAULT,DEFAULT,DEFAULT,DEFAULT);";
    $query1="INSERT INTO issues VALUES (DEFAULT ,DEFAULT ,'". $_POST['subject']."','".$_POST['issue_desc']."',DEFAULT,".$_POST['request_type'].",1,".$_COOKIE["id"].");";
    db_conn($query);
    db_conn($query1);
}
  if (isset($_POST['write_new_issue'])) {
      create_new_issue();
      error_log("Posted?!", 0);
     
  }
?>