<?php
session_start();
include 'session.php';
include 'config.php';
if(isset($_POST['logout'])){
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
        header("Location: http://$web_site_name/tp_site/"); /* Redirect browser */
        exit();
}  
if(isset($_POST['back_to_main'])){
        header("Location: http://$web_site_name/tp_site/html_dir/main.php"); /* Redirect browser */
        exit();
}
if(isset($_POST['reg_new_user'])){

            header("Location: http://$web_site_name/tp_site/html_dir/new_user_register.php"); /* Redirect browser */
            exit();

}  
if(isset($_POST['search_issue_workaround'])){
            header("Location: http://$web_site_name/tp_site/html_dir/search_issue_workaround.php"); /* Redirect browser */
            exit();

}  
?>
