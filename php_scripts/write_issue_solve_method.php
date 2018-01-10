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
$issue_id = filter_var($_POST['issue_id']);
$solve_text = filter_var($_POST['issue_solve_method']);
function set_issue_workaround(){
    include 'config.php';
    global $solve_text;
    global $issue_id;
    $query="UPDATE issues set issue_solve_method='".$solve_text."' where issue_id=".$issue_id.";";
    db_conn($query);
}
  if (isset($_POST['write_issue_status'])) {
      set_issue_workaround();
      error_log("Posted?!", 0);
     
  }
?>