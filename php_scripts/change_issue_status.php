<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include 'db_connect.php';
$issue_id = filter_var($_POST['issue_id']);
$issue_status = filter_var($_POST['issue_status']);
function update_issue_status(){
    include 'config.php';
    global $issue_status;
    global $issue_id;
    $query="UPDATE issues set issue_status=".$issue_status." where issue_id=".$issue_id.";";
    db_conn($query);
}
  if (isset($_POST['change_issue_status'])) {
      update_issue_status();
      error_log("Posted?!", 0);
     
  }
