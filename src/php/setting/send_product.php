<?php require_once "./conenct.php";?>
<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="./../../css/main.css">
    <link rel="shortcut icon" href="./../../img/LOGO.png" type="image/png">
    <title>Антикварная мебель, интерьер (Отправка данныз в базу данных)</title>
</head>
<body>
<?php

if (isset($_POST['send'])) {
    if($_FILES['file_image']['name']){
        $list=['.php','.html', 'css','js', 'css','scss', 'zip', 'rar', '7z', 'tar', 'gz', 'bz2'];
    
        foreach($list as $item){
            if(preg_match("/$item/", $_FILES['file_image']['name']))exit("Недопустимый формат файла");
        }
    
        $type=getimagesize($_FILES['file_image']['tmp_name']);
        if($type && ($type['mime'] != 'image/jpeg' || $type['mime'] != 'image/png' || $type['mime'] != 'image/jpg')){
            if($_FILES['file_image']['name'] > 10000000){
                $upload = './../../img/products/'.$_FILES['file_image']['name'];
                if(move_uploaded_file($_FILES['file_image']['tmp_name'], $upload)) {
                echo "Файл успешно загружен";
                echo "<a href='./../add_product.php' class='back_img'>Назад</a>";
                unset($_SESSION['errorImg']);
                }
                else echo "Файл не загружен";
            }else exit("Файл слишком большой");
    }else exit("Недопустимый формат файла");
    
    }else {
        $_SESSION['errorImg'] = "Вы не выбрали файл";
        header("Location:./../add_product.php");
    }

    }
?>

<?php 

$text = $_POST['text'];
$price = $_POST['price'];
$fileName = $_FILES['file_image']['name'];

if(empty($seek_email) || empty($seek_pass)){
    $sql2 ="INSERT INTO product (file_img, text, price) VALUES (:fileName, :text, :price)";
    $query=$pdo->prepare($sql2);
    $query->execute(["fileName"=>$fileName, "text"=>$text, "price"=>$price]);
    unset($_SESSION['errorAdd']);
    $_SESSION['AddOk'] = "Запись добавлена";
    header("Location:./../add_product.php");
}else {
    unset($_SESSION['AddOk']);
    $_SESSION['errorAdd'] = "Вы заполнени не все поля";
    header("Location:./../add_product.php");
}
?>
</body>