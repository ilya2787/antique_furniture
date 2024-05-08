<?php require_once "./conenct.php";?>
<?php session_start(); ?>
<?php
$login = $_POST['login'];
$password = $_POST['password'];
$sql = $pdo->prepare("SELECT id, login FROM admin_user WHERE login =:login AND password =:password");
$sql->execute(array('login' =>$login, 'password' =>$password));
$array=$sql->fetch(PDO::FETCH_ASSOC);
if ($array['id']>0) {
    $_SESSION['login'] = $array["login"];
    header('Location: ./../admin_panel.php');
}else{
    $_SESSION['error'] = "Неверный логин или пароль";
    header('Location: ./../admin.php');
}
?>