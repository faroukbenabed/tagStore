<?php
session_start();
if(!isset($_SESSION["username"])){
    header('Location: ./view/login.php');
}else{
header('Location: ./view/index.php');
}