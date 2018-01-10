<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Страница пользователя</title>
        <link rel="icon" type="image/png" sizes="48x48" href="../favicon.ico">
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../jquery/user_view.js"></script>
        <script type='text/javascript' src="../bootstrap_js/bootstrap.js"></script>
        <script type="text/javascript" src="../jquery/jquery.redirect.js"></script>
        <link rel='stylesheet' type=text/css href="../css_folder/bootstrap_1.css">
        <link rel='stylesheet' type=text/css href="../css_folder/user_view.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Red Eye</a>
          <img src="../red_eye_50_50.png" width="50" height="50" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" id='logout' href="#">Выйти</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <div id="user_view" class="margin_from_top">
            <div id="issues_table"></div>
            <div id="navigation_bar"></div>
            <button class="btn btn-dark btn-sm" id="prev" >Prev</button> 
            <button class="btn btn-dark btn-sm" id="next" >Next</button> 
        </div>
        <div id="new_issue_with_button">
            <button id="but1" class="btn btn-info">Создать новую заявку</button>
            <br>
            <div id="new_issue"></div>
        </div>
    </body>
</html>
