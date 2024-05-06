<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="./../css/main.css">
    <link rel="shortcut icon" href="./../img/LOGO.png" type="image/png">
    <title>Антикварная мебель, интерьер (Авторизация)</title>
</head>
<body>
    <a href="./../index.html" class="next_index">Главная</a>
    <div class="block_form_content">

            <form action="./setting/autoriz.php" method="post">

                    <h1>Авторизация <br> в панель администратора</h1>
                    <img src="./../img/LOGO.png" alt="">

                
                <div class="login_block">
                    <input id="login_admin" type="text" name="login" placeholder="">
                    <label for="login_admin">Логин</label>
                </div>
                <div class="passw_block">
                    <input id="pass_admin" type="password" name="password" placeholder="">
                    <label for="pass_admin">Пароль</label>
                </div>
                <input type="submit" value="Войти" name="submit">
                <p class="error_autoriz"><?php echo $_SESSION['error']?></p>
            </form>
    </div>
    <script src="./../js/index.bundle.js"></script>
</body>
</html>