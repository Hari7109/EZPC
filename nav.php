<?php
include 'php/connection.php';
session_start();


if(!empty($_SESSION['UID'])){
$UID = $_SESSION['UID'];
}else{
    header("Location: signin.php");
    exit;
}



$cfile = basename($_SERVER['PHP_SELF']);
?>
<section id="header">
    <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

    <div>
        <ul id="navbar">
            <li><a <?php if ($cfile == "index.php") echo 'class="active"' ?>href="index.php">Home</a></li>
            <li><a <?php if ($cfile == "shop.php") echo 'class="active"' ?>href="shop.php">Shop</a></li>
            <li><a <?php if ($cfile == "blog.html") echo 'class="active"' ?>href="blog.html">Blog</a></li>
            <li><a <?php if ($cfile == "about.html") echo 'class="active"' ?>href="about.html">About</a></li>
            <li><a <?php if ($cfile == "contact.html") echo 'class="active"' ?>href="contact.html">Contact</a></li>
            <li><a <?php if ($cfile == "chat/index.php") echo 'class="active"' ?>href="chat/index.php">Commuinty</a></li>
            <li id="lg-bag"><a <?php if ($cfile == "cart.php") echo 'class="active"' ?> href="cart.php"><i class='bx bx-shopping-bag'></i></a></li>
            <a href="#" id="close"><i class='bx bx-x'></i></a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.html"><i class='bx bx-shopping-bag'></i></a>
        <i id="bar" class='bx bx-menu'></i>
    </div>
</section>