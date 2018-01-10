<?php
require_once '../php_scripts/session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../jquery/new_user_register.js"></script>
        <script type="text/javascript" src="../jquery/jquery.redirect.js"></script>
        <script type='text/javascript' src="../bootstrap_js/bootstrap.js"></script>
        <link rel='stylesheet' type=text/css href="../css_folder/bootstrap_1.css">
        <link rel="stylesheet" type="text/css" href="../css_folder/new_user_register.css">
        <meta charset="UTF-8">
        <title></title>
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
<div class="row justify-content-center marg">
    <div class="col-xs-5 widh">    
        <div class="new_issue_form">
            <label class="label_style">Регистрация нового пользователя</label>
             <br>
             <br>
            <form method="post" action="../php_scripts/new_user_register.php" id='register_new_user'>
                <div class="form-group row">
                    <label for="login" class="col-sm-2 col-form-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="login">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-sm-2 col-form-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"  name="password" id="pass" >
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="name" class="col-sm-2 col-form-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="first_name" id="name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="surname" class="col-sm-2 col-form-label">Фамилия</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  name="second_name" id="surname" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="userrole" class="col-sm-2 col-form-label">Роль</label>
                    <div class="col-sm-10">
                        <select name="role" class="custom-select mr-sm-2" id='userrole'>
                            <option value='support'>support</option>
                            <option value='client'>client</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto float-right">
                    <button type="submit" class="btn btn-primary" name='register_new_user'  value='Отправить'>Отправить</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
    <div id='div1'></div>
    </body>
</html>
