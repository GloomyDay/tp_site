<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css_folder/main.css">
        <meta charset="UTF-8">
        <title>Страница Пользователя</title>
        <script type="text/javascript" src="../jquery.js"></script>
        <script>
            $(document).ready(function(){
                    $("#div1").load("http://172.16.0.254/tp_site/php_scripts/main.php");
            });
        </script>
        </head>
    <body>
        <div class="top_line">
            <div class="logo">
                <img class="img_alighn" src="../red_eye_25_25.png">
                <span class="text_it"> Red eye </span>
            </div>
            <div class="buttons">
                <form method='post' action='../php_scripts/navigate.php'>
                    <button name='logout' class='logout'>Logout</button>
                    <button name='reg_new_user' class='logout'>Register new user</button>
                </form>   
            </div>
        </div>
        <div class="issues_list" id="div1"></div>
    </body>
</html>
