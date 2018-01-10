<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css_folder/index.css">
        <link rel="stylesheet" type="text/css" href="css_folder/bootstrap_1.css">
        <link rel="stylesheet" type="text/css" href="css_folder/my.css">
        <script type="text/javascript" src="jquery/bootstrap.min.js"></script>
        <script type="text/javascript" src="../jquery.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Red Eye</a>
          <img src="red_eye_50_50.png" width="50" height="50" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
      </div>
    </nav>
<form method="post" action="php_scripts/auth_1.php" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="inputLogin">Login</label>
    <div class="controls">
      <input type="text" name="login" id="inputLogin" placeholder="Login">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> Remember me
      </label>
        <button type="submit" name="submit" value="going_in" class="btn">Sign in</button>
    </div>
  </div>
</form>
    </body>
</html>
