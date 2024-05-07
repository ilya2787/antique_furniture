<?php require_once "./setting/conenct.php";?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="./../css/main.css">
    <link rel="shortcut icon" href="./../img/LOGO.png" type="image/png">
    <title>Антикварная мебель, интерьер (Добавление товара)</title>
</head>
<body>
<?php 
    if(!empty($_SESSION['login'])) :?>
<div class="panel_header">
    <a href="./admin_panel.php" class="panel_header_back">Назад</a>
    <h2><?php echo "Здравствуйте ".$_SESSION['login'];?></h2>
    <a href="./setting/logout.php" class="panel_header_exit">Выход</a>
</div>
<div class="blockAdd_info">
<h1 class="AddOk"><?php echo $_SESSION['AddOk'];?></h1>
<h1 class="erorr_add"><?php echo $_SESSION['errorImg'];?></h1>
<h1 class="erorr_add"><?php echo $_SESSION['errorAdd'];?></h1>
<form action="./setting/send_product.php" method="post" class="form_add" enctype="multipart/form-data">
            <h1>Фотография</h1>
            <label class="input-file">
                <input type="file" name="file_image" class="inputFile">  	
                <span>Выберите файл</span>
            </label>
            <h1>Описание</h1>
             <textarea name="text" id="" cols="40" rows="7" class='Text_form'></textarea>
             <h1>Стоимость</h1>
             <div class="block_price">
                 <input type="number" name="price" >
                 <i class='fa-solid fa-ruble-sign'></i>
             </div>
        <input type="submit" name="send" value="Загрузить" class="btn_send">
</form>
</div>
<?php 
    else:
        echo "<div class='note_autoriz'>";
        echo "<h1>Вы не авторизованы</h1>";
        echo '<a href="./../index.php">Вернуться на сайт</a>';
        echo "</div>";
?>
<?php endif ?>
<script src="./../js/index.bundle.js"></script>
</body>