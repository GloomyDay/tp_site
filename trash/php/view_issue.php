<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include 'get_user_id.php';
include 'db_connect.php';
function html_table($data = array())
{
    $rows = array();
    global $count;
    $count=0;
    if (!empty($data)) {
            foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $count++;
            if ($count == 1){
             $abc=array_keys($row);
             $temp_cells=array();
             foreach ($abc as $keys){
                 $temp_cells[] = "<td>{$keys}</td>";
             }
             $rows[] = "<tr>" . implode('', $temp_cells) . "</tr>";
            }
            //var_dump($row);
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    
    }

    return "<table class='hci-table'>" . implode('', $rows) . "</table>";
}
function create_array_for_table(){
    global $issue_id;
    $query="SELECT user_id,message_text from messages where issue_id=".$issue_id.";";
    $query_result= db_conn($query);
    $output=pg_fetch_all($query_result);
    $count=0;
    $data2=array();
    $tempdata=array();
    if (!empty($output)) {
    $count=255;
        include 'config.php';
    foreach ($output as $rows){
        foreach ($rows as $row){
            global $count;
            $count++;
            global $str;
            if ($count == 1){
                $query="Select username from users where user_id=".$row;
                $query_result= db_conn($query);
                $username=pg_fetch_row($query_result);
                $tempdata['Отправитель'] =$username[0];
            }    
            if ($count == 2){
                $tempdata['Сообщение'] = $row;
                array_push($data2, $tempdata);
                global $tempdata;
                $count=0;
                $tempdata=array();
            }
            if ($count == 3){
                $query="Select username from users where user_id=".$row;
                $query_result= db_conn($query);
                $username=pg_fetch_row($query_result);
                $tempdata['Отправитель'] =$username;
            }       
        }
        }
    }
 else {
        $data2="";
    }

    return $data2;
}
$user_name=filter_var($_SESSION['username']);
$u_id=get_user_id($user_name);
function show_issue($issue_id){
    $query="SELECT subject,issue_desc from  issues where issue_id=".$issue_id.";";
    $query_result= db_conn($query);
    $output=pg_fetch_array($query_result);
    return $output;
}
function show_all_messages(){
    $table_array= create_array_for_table();
    return $table_array;
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
}
$data2=show_all_messages();

$issue_data=show_issue($issue_id);
$msg_table=html_table($data2);
echo "<html>"
    ."  <head>"
    .       "<link rel='stylesheet' type='text/css' href='../css_folder/view_issue.css'>"
    .       "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>"
    .       "<link rel='stylesheet' type='text/css' href='../css_folder/view_all_messages.css'>"
    .   "<head>"
    .   "<body>"
    ."<div class='top_line'>
        <div class='logo'>
            <img class='img_alighn' src='../red_eye_25_25.png'>
            <span class='text_it'> Red eye </span>
        </div>
        <div class='buttons'>
            <form method='post' action='../php_scripts/navigate.php'>
                <button onclick='' name='logout' class='logout'>Logout</button>
                <button onclick='' name='back_to_main' class='logout'>Back to main page</button>
            </form>
        </div>
    </div>"
    ."<div class='new_issue_form'>
    <form>
        <label class='label_style'>Тема:</label>
        <b>".$issue_data['subject']."</b>
        <br>
        <label class='label_style'>Описание Проблемы:</label>
        <p><textarea class='new_issue_problem_desc' disabled='disabled'>".$issue_data['issue_desc']. "</textarea></p>
    </form>
    <hr>
    </div>".$msg_table    
    ."<div class='text_form'>
    <form method='post' action='view_issue.php'>
        <br>
        <label class='label_style'>Ответить:</label>
        <p><textarea class='send_text' name='message_text'></textarea></p>
        <p><b>Тип сообщения</b></p>
        <p><input type='radio' name='message_type' value=0>reply</p>
        <p><input type='radio' name='message_type' value=1>note</p>
        <p><input type='submit' name='send_message' value='Отправить'></p>
    </form>
    <div>"
    . "</body>"
    . "</html>";
?>