<?php require_once "./conenct.php";?>
<?php session_start();?>
<?php
if (isset($_POST['send'])) {
    if($_FILES['file_image']['name']){
        $list=['.php','.html', 'css','js', 'css','scss', 'zip', 'rar', '7z', 'tar', 'gz', 'bz2'];
        foreach($list as $item){
            if(preg_match("/$item/", $_FILES['file_image']['name'])){
                echo "<a href='./../add_product.php' class='back_img'>Назад</a>";
                exit("Недопустимый формат файла");
            }
        }
        $type=getimagesize($_FILES['file_image']['tmp_name']);
            if($type && ($type['mime'] != 'image/jpeg' || $type['mime'] != 'image/png' || $type['mime'] != 'image/jpg')){
                if($_FILES['file_image']['name'] < 100000000){
                    $upload = './../../img/products/'.$_FILES['file_image']['name'];
                    if(move_uploaded_file($_FILES['file_image']['tmp_name'], $upload)) {
                    unset($_SESSION['errorImg']);
                    header("Location: ./../add_product.php");
                    } else {
                        echo "<a href='./../add_product.php' class='back_img'>Назад</a>";
                        exit("Файл не загружен");
                    }
                }else {
                    echo "<a href='./../add_product.php' class='back_img'>Назад</a>";
                    exit("Файл слишком большой");
                }
        }
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
    header("Location: ./../add_product.php");
}else {
    unset($_SESSION['AddOk']);
    $_SESSION['errorAdd'] = "Вы заполнени не все поля";
    header("Location: ./../add_product.php");
}
?>