<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'session.php';
include 'db_connect.php';

$register_new_user=filter_input(INPUT_POST, 'register_new_user', FILTER_SANITIZE_STRING);

function create_new_user(){
    include 'config.php';
    $username= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password=filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
    $first_name=filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $second_name=filter_input(INPUT_POST, 'second_name', FILTER_SANITIZE_STRING);
    $role=filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
    $password_hash=md5(md5($password));
    $query="INSERT INTO users VALUES(DEFAULT,'".$username."','".$role."','".$password_hash."',0,DEFAULT,'".$first_name."','".$second_name."');";
    db_conn($query);
}

if(strlen($register_new_user) > 0){
      create_new_user();
}
