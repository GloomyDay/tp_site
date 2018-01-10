<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css_folder/index.css">
        <link rel="stylesheet" type="text/css" href="css_folder/bootstrap_1.css">
        <link rel="stylesheet" type="text/css" href="css_folder/my.css">
        <script type="text/javascript" src="jquery/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <title>Авторизация</title>
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
        <form method="post" action="php_scripts/auth.php" class="form-horizontal">
            <div>
                <label  for="inputLogin">Login</label>
                <div>
                    <input type="text" name="login" id="inputLogin" placeholder="Login">
                </div>
            </div>
            <div>
                <label for="inputPassword">Password</label>
                <div>
                    <input type="password" name="password" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div>
                <div>
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <button type="submit" name="submit" value="going_in" class="btn">Sign in</button>
                </div>
            </div>
        </form>
    </body>
</html>
