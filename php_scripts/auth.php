<?PHP
$auth_in_process=True;
include 'db_connect.php';
include 'config.php';
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}
$conn_string = "host=$db_host port=$db_port dbname=$db user=$db_user password=$db_password";
$conn = pg_pconnect($conn_string);
$sumbit_post = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
$login_post =filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$post_password=filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if(strlen($sumbit_post) > 0){           
    $query = pg_query("SELECT user_id, password,role FROM users WHERE username='".$login_post."' LIMIT 1");
    $data = pg_fetch_assoc($query);
    if($data['password'] === md5(md5($post_password)))
    {
        $hash = md5(generateCode(10));  
        pg_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
        print("Ok You Are authorized");
        session_start(); 
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $login_post;
        $_SESSION['role'] = $data['role'];
        if ($data['role']=="client"){
            header("Location: http://$web_site_name/tp_site/html_dir/user_view.php");
            exit();
        }
        elseif ($data['role']=="support") {
            header("Location: http://$web_site_name/tp_site/html_dir/main.php");
            error_log("Auth OK",0);
            exit();  
        }
    }
    else {   $reddir=FALSE;
        readfile("../html_dir/wrong_login_pass.php");
        header( "refresh:2;url=http://$web_site_name/tp_site/php_scripts/wrong_login_pass.php" );
    }
}
 else {
    header("Location: http://$web_site_name/tp_site/");
}