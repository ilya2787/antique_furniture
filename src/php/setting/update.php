<?php require_once "./conenct.php";?>

<?php

if (isset($_POST['save'])) {
    if($_FILES['file_images']['name']){
        $list=['.php','.html', 'css','js', 'css','scss', 'zip', 'rar', '7z', 'tar', 'gz', 'bz2'];
    
        foreach($list as $item){
            if(preg_match("/$item/", $_FILES['file_image']['name']))exit("Недопустимый формат файла");
        }
    
        $type=getimagesize($_FILES['file_image']['tmp_name']);
        if($type && ($type['mime'] != 'image/jpeg' || $type['mime'] != 'image/png' || $type['mime'] != 'image/jpg')){
            if($_FILES['file_image']['name'] > 10000000){
                $upload = './../../img/products/'.$_FILES['file_image']['name'];
                if(move_uploaded_file($_FILES['file_image']['tmp_name'], $upload)) echo "Файл успешно загружен";
                else echo "Файл не загружен";
            }else exit("Файл слишком большой");
    }else exit("Недопустимый формат файла");
    
    }


$text = $_POST['text'];
$price = $_POST['price'];
$id = $_POST['id'];

$sql = $pdo->prepare("SELECT * FROM product WHERE id=:id");
$sql->execute(["id"=>$id]);
$res=$sql->fetch(PDO::FETCH_OBJ);


    if($_FILES['file_image']['name']){
        $fileName = $_FILES['file_image']['name'];
    }else{
        $fileName = $res->file_img;
    }
    $sql ="UPDATE product SET file_img=:fileName, text=:text, price=:price WHERE id=:id";
    $query=$pdo->prepare($sql);
    $query->execute(["fileName"=>$fileName, "text"=>$text, "price"=>$price, "id"=>$id]);
    header("Location:./../admin_panel.php");

    }
?>


<?php
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = $pdo->prepare("DELETE FROM product WHERE id=:id");
    $sql->execute(["id"=>$id]);
    header("Location:./../admin_panel.php");
}
?>