<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method='post' action='../php_scripts/view_issue_1.php' id='issue_solve_method'>
            <br>
            <label class='label_style'>Способ решения проблемы:</label>
            <p><textarea class='send_text' name='message_text'></textarea></p>
            <p><input type='submit' name='issue_solve_method' value='Отправить'></p>
        </form>
    </body>
</html>
