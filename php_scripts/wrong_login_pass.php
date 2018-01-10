<?php
echo "
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' type='text/css' href='../css_folder/new_user_register.css'>
        <meta charset='UTF-8'>
        <title></title>
    </head>
    <body>
        <div class='top_line'>
            <div class='logo'>
                <img class='img_alighn' src='../red_eye_25_25.png'>
                <span class='text_it'> Red eye </span>
            </div>
            <div class='buttons'>
                <form method='post' action='../php_scripts/navigate.php'>
                    <button onclick='' name='logout' class='logout'>Logout</button>
                </form>   
            </div>
            <b>WRONG LOGIN PASSWORD</b>
        </div>
    </body>
</html>
";
sleep(3);
include 'config.php';
if(!isset($_SESSION['loggedin'])) {
    header("Location: http://$web_site_name/tp_site/");
    
}
?>
