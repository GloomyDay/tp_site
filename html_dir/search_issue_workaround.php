<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css_folder/view_issue.css">
        <meta charset="UTF-8">
        <title></title>                                                            
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../jquery/search_issue_workaround.js"></script>
        <script type='text/javascript' src="../bootstrap_js/bootstrap.js"></script>
        <script type="text/javascript" src="../jquery/jquery.redirect.js"></script>
        <link rel='stylesheet' type=text/css href="../css_folder/bootstrap_1.css">
        <meta charset="UTF-8">
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
              <a class="nav-link" id='back_to_main' href="#">Назад на главную</a>
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
<div class="container-fluid">
    
    
    
    <div class="row justify-content-center marg">
    <div class="col-xs-5 widh">    
        <div class="new_issue_form">
            <label class="label_style">Поиск по методам решения проблем</label>
             <br>
             <br>
        <form class="form-inline my-2 my-lg-0" method='post' action='../php_scripts/search_issue_workaround.php' id="sform">
            <input class="form-control mr-sm-2" type="search" name="search_text" placeholder="Текст для поиска"> 
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать</button>
        </form>
        </div>
    </div>
</div>
    <br>
    <br>
    <div id="div2"></div>
    </div>
    </body>
</html>