<?php 

if(!$_SESSION['usuario']){
    header('Location: login_home.php');
    exit();
}
 