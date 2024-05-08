<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./img/LOGO.png" type="image/png">
    <title>Антикварная мебель, интерьер</title>
</head>
<body>
    <header>
    <img src="./img/LOGO.png" alt="" class="img_big_logo_fon">
    <div class="logo_header_block">
        <img src="./img/LOGO.png" alt="" class="img_logo _anim_items _anim_no_hide">
    </div>
     <div class="title_header">
        <h1 class="_anim_items _anim_no_hide">Антикварная</h1>
        <h2 class="_anim_items _anim_no_hide"><p class="_anim_items _anim_no_hide">МЕБЕЛЬ</p>ИНТЕРЬЕР</h2>
    </div>
    
    <div class="contact">
        <p class="contact_1 _anim_items _anim_no_hide">Игорь</p>
        <a class="contact_1 _anim_items _anim_no_hide" href="tel:+79114753280">8(911)475-32-80</a>
        <p class="contact_2 _anim_items _anim_no_hide">Милена</p>
        <a class="contact_2 _anim_items _anim_no_hide" href="tel:+79114501430">8(911)450-14-30</a>  
        <p class="contact_3 _anim_items _anim_no_hide">Наталья</p>
        <a class="contact_3 _anim_items _anim_no_hide" href="tel:+79097755989">8(909)775-59-89</a>  
    </div>
    <div class="buttom_phone">
        <i class="fa-solid fa-phone-volume"></i>
    </div>

    <img src="./img/Phone_header.png" alt="" class="img_phone_header">
</header>
<div class="block_header_fon"></div>
<div class="block_header_fon2"></div>
<div class="block_header_corner"></div>


    <div class="social">
        <div class="social_vk _anim_items _anim_no_hide">
            <a href="https://vk.com/pitctok" target="_blank"><i class="fa-brands fa-vk"></i></a>
            <div class="social_vk_text">
                <p>Мы ВКОНТАКТЕ</p>
                <a href="https://vk.com/pitctok" target="_blank">vk.com/pitctok</a>
            </div>
        </div>
    
        <div class="social_inst _anim_items _anim_no_hide">
            <a href="https://www.instagram.com/pit_ctok39?igsh=ejViaTBndnZsNjJh" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <div class="social_inst_text">
                <p>Мы ИНСТАГРАМ</p>
                <a href="https://www.instagram.com/pit_ctok39?igsh=ejViaTBndnZsNjJh" target="_blank">pit_ctok39</a>
            </div>
        </div>
    
        <div class="social_telegram _anim_items _anim_no_hide">
            <a href="https://t.me/pitctok" target="_blank"><i class="fa-brands fa-telegram"></i></a>
            <div class="social_telegram_text">
                <p>Мы ТЕЛЕГРАМ</p>
                <a href="https://t.me/pitctok" target="_blank">t.me/pitctok</a>
            </div>
        </div>
        
    </div>



    <div class="block_info ">
        <div class="block_info_left">
            <img src="./img/Clock.png" alt="">
            <div class="block_info_left_text">
                <p class="text1 _anim_items _anim_no_hide">СТАРИННАЯ ВИНТАЖНАЯ МЕБЕЛЬ</p>
                <p class="text2 _anim_items _anim_no_hide">МЕБЕЛЬ ИЗ МАССИВА ДУБА И ОРЕХА</p>
                <p class="text3 _anim_items _anim_no_hide">ЧАСЫ КАМИННЫЕ, НАПОЛЬНЫЕ, НАСТЕННЫЕ</p>
            </div>
        </div>
        <div class="block_info_right">
            <div class="block_info_right_exclusive _anim_items _anim_no_hide">
                <img src="./img/icons/exclusive.png" alt="">
                <p>Эксклюзивная мебель</p>
            </div>
            <div class="block_info_right_CardAndCash _anim_items _anim_no_hide">
                <img src="./img/icons/CardAndCash.png" alt="">
                <p>Наличный и безналичный расчет</p>
            </div>
            <div class="block_info_right_tree _anim_items _anim_no_hide">
                <img src="./img/icons/tree.png" alt="">
                <p>Натуральное дерево</p>
            </div>
            <div class="block_info_right_saw _anim_items _anim_no_hide">
                <img src="./img/icons/saw.png" alt="">
                <p>Ручная работа краснодеревщеков</p>
            </div>
        </div>
    </div>

    <div class="block_products_fon"></div>
    <div class="block_products">

    <?php require_once "./php/setting/conenct.php";?>

        <div class="block_products_list">
        <?php
        $sql = $pdo->prepare("SELECT * FROM product");
        $sql->execute();
        while ($res=$sql->fetch(PDO::FETCH_OBJ)):?>
            <div class="block_products_list_product _anim_items _anim_no_hide">
                <img src="./img/products/<?php echo $res->file_img ?>" alt="">
                <div class="block_products_list_product_info">
                    <p><?php echo $res->text ?></p>
                    <p><?php echo $res->price ?><i class="fa-solid fa-ruble-sign"></i></p>
                </div>
            </div>
            <?php endwhile;?>  
            <a href="./../php/admin.php" class="setting_admin"><i class="fa-solid fa-gear"></i></a>
        </div>
        
    </div>
    <div class="block_products_fon2"></div>


    <footer class="footer">
  <p class="footer_address">Калининградская область <br> г. Гурьевск <br> пер. Байдукова, д. 2А</p>

<div class="footer_inform">
    <div class="footer_inform_coperait">
        <p>C</p>
        <p>2024, Антикварная мебель, интерьер</p>
    </div>
    
    <div class="footer_inform_social">
        <div class="footer_inform_social_vk">
            <a href="https://vk.com/pitctok" target="_blank"><i class="fa-brands fa-vk"></i></a>

        </div>
    
        <div class="footer_inform_social_inst">
            <a href="https://www.instagram.com/pit_ctok39?igsh=ejViaTBndnZsNjJh" target="_blank"><i class="fa-brands fa-instagram"></i></a>

        </div>
    
        <div class="footer_inform_social_telegram">
            <a href="https://t.me/pitctok" target="_blank"><i class="fa-brands fa-telegram"></i></a>

        </div>
    </div>
</div>
</footer>
    
    <script src="./js/index.bundle.js"></script>
</body>
</html>