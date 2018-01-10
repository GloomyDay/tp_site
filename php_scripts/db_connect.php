<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($auth_in_process)) 
{ 
    include 'session.php'; 
} 
include 'config.php';
    function db_conn($query){
        global $db_host;
        global $db_port;
        global $db;
        global $db_user;
        global $db_password;
    $conn_string = "host=$db_host port=$db_port dbname=$db user=$db_user password=$db_password";
    $conn = pg_pconnect($conn_string);
    $result = pg_query($conn, $query);
    return($result);
}
