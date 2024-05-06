<?php require_once "./setting/conenct.php";?>
<?php session_start(); 
unset($_SESSION['AddOk']);
unset($_SESSION['errorAdd']);
unset($_SESSION['errorImg']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="./../css/main.css">
    <link rel="shortcut icon" href="./../img/LOGO.png" type="image/png">
    <title>Антикварная мебель, интерьер (Администрирование)</title>
</head>

<body>

<?php 
    if(!empty($_SESSION['login'])) : 
?>

 
<div class="panel_header">
    <h2><?php echo "Здравствуйте ".$_SESSION['login']; ?></h2>
    <a href="./setting/logout.php" class="panel_header_exit">Выход</a>
</div>


<div class="list_products">
    <a href="./add_product.php" class="list_products_addProd">Добавить товар <i class="fa-solid fa-circle-plus"></i></a>
<div class="list_products_title">
    <p>Фотография</p>
    <p>Описание</p>
    <p>Стоимость</p>
</div>

<?php
$sql = $pdo->prepare("SELECT * FROM product");
$sql->execute();
while ($res=$sql->fetch(PDO::FETCH_OBJ)):?>
 
<div class='list_products_product'>
    <form action="./setting/update.php" method="post" enctype="multipart/form-data">
        <div class="nuber">
            <input type="number" name="id" id="" value="<?php echo $res->id ?>" >
        </div>
        <div class="img_DB">
            <img src='./../img/products/<?php echo $res->file_img ?>'>
            
             <label class="input-file">
                <input type="file" name="file_image" class="inputFile">  	
	   	        <span>Выберите файл</span>
 	        </label>
            
        </div>
        <div class="description">
            <textarea name="text" id="" cols="100%" rows="7" class='list_products_product__text'><?php echo $res->text ?></textarea>
        </div>
        <div class="price_BD">
            <input type="number" name="price" value="<?php echo $res->price ?>" class='list_products_product__price'><i class='fa-solid fa-ruble-sign'></i>
        </div>
        <div class="btn_BD">
            <button type="submit" name="save" class="btn_save">Сохранить</button>
            <button type="submit" name="delete" class='btn_BD_delet'><i class='fa-solid fa-trash-can'></i></button>
        </div>
    </form>
</div>
      <?php endwhile?>  
</div>


<?php 
    else:
        echo "<div class='note_autoriz'>";
        echo "<h1>Вы не авторизованы</h1>";
        echo '<a href="./../index.html">Вернуться на сайт</a>';
        echo "</div>";
?>

<?php endif ?>

<script src="./../js/index.bundle.js"></script>
</body>