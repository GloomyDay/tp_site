<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
$cf_secondary_scr='True';
include 'main_1.php';
$user_name=filter_var($_SESSION['username']);
$u_id=get_user_id($user_name);
function show_issue($issue_id){
    $query="SELECT subject,issue_desc,issue_status from  issues where issue_id=".$issue_id.";";
    $query_result= db_conn($query);
    $output=pg_fetch_array($query_result);
    return $output;
}
function send_text($issue_id){
    global $u_id;
    $query="INSERT INTO messages VALUES (DEFAULT ,". $_POST['message_type'].",'". $_POST['message_text']."',".$issue_id.",".$u_id.");";
    $query_result= db_conn($query);
    $output=pg_fetch_array($query_result);
    return $output;
}
if (isset($_GET['issue_id'])){
    $_SESSION['last_watched_issue'] = $_GET['issue_id'];
}

  if (isset($_POST['send_message'])) {
      $issue_id=$_SESSION['last_watched_issue'];  
      send_text($issue_id);
  } else {
    $issue_id=$_GET['issue_id'];
    if ($_SESSION['role']=="client"){
    $user_id=get_user_id($user_name);
        $query="SELECT user_id,message_text from messages where issue_id=".$issue_id." AND message_type=0;";
    }
    elseif ($_SESSION['role']=="support") {
        $query="SELECT user_id,message_text from messages where issue_id=".$issue_id.";";
    
    }
    $msg_table=gen_table($query);
    $issue_data=show_issue($issue_id);
    $issue_status=$issue_status_RU[$issue_data['issue_status']];
    echo "<p id='subj'>".$issue_data['subject']."</p>"."<p id='issue_status'>".$issue_status."</p>"."<p id='issue_desc'>".$issue_data['issue_desc']."</p>".$msg_table;
}
?>