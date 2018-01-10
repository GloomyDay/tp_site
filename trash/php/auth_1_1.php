<html>
    <head>
    </head>
<body>
<?PHP
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
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


if(isset($_POST['submit']))
{           if(!@$_POST['not_attach_ip'])

        {

            # Если пользователя выбрал привязку к IP

            # Переводим IP в строку

            $insip=", source_ip=('".$_SERVER['REMOTE_ADDR']."')";
            //$insip = ", source_ip='".$_SERVER['REMOTE_ADDR']."'";
        }
    $query = pg_query("SELECT user_id, password FROM users WHERE username='".pg_escape_string($_POST['login'])."' LIMIT 1");
    $data = pg_fetch_assoc($query);
    if($data['password'] === md5(md5($_POST['password'])))
    {
        $hash = md5(generateCode(10));  

        pg_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
        setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);
        print("Ok You Are authorized");
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['login'];                                     // something like this is optional, of course
        //header("Location: http://$web_site_name/tp_site/php_scripts/new_issue.php"); /* Redirect browser */
        //exit();
    }
    else
    {
        print(md5(md5($_POST['password'])));
        echo "<br>";
        print($data['password']);
        echo "<br>";
        print "Введен неверный логин/пароль   ";
    }
}

?>

    </body>
</html>