<?php
include_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Заявки</title>
        <link rel="icon" type="image/png" sizes="48x48" href="../favicon.ico">
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../jquery/table_with_nav.js"></script>
        <script type="text/javascript" src="../jquery/jquery.redirect.js"></script>
        <script type='text/javascript' src="../bootstrap_js/bootstrap.js"></script>
        <link rel='stylesheet' type=text/css href="../css_folder/bootstrap_1.css">
        <link rel='stylesheet' type=text/css href="../css_folder/my_main.css">
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
              <a class="nav-link" id='search_issue_workaround' href="#">Поиск по методам решения проблем</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id='reg_new_user' href="#">Регистрация нового пользователя</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id='logout' href="#">Выйти</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <br>
        <br>
        <br>
        <br>
        <p>Мои Заявки</p>
        <div id="div1"></div>
        <div id="my_issues"></div>
        <div id="my_navigation_bar" class='pagination pagination-centered'></div>
        <button class="btn btn-dark btn-sm" id="my_prev" >Prev</button> 
        <button class="btn btn-dark btn-sm" id="my_next" >Next</button> 
        <p>Все заявки</p>
        <div id="issues_table"></div>
        <div id="navigation_bar"></div>
        <button class="btn btn-dark btn-sm" id="prev" >Prev</button> 
        <button class="btn btn-dark btn-sm" id="next" >Next</button>
        <div id="auth"></div>>
    </body>
</html>
