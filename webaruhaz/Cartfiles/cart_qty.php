<?php
session_start();
include_once "../Database/config.php";
include_once "cart.class.php";


$cart=new Cart();

$updateItem=$cart->updateQty($_GET['id'],$_GET['qty']);

//print_r($_SESSION);

?>
