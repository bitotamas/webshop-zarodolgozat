<?php
session_start();
include_once "../database/config.php";
include_once "cart/cart.class.php";

print_r($_GET);

$cart=new Cart();

$updateItem=$cart->updateQty($_GET['id'],$_GET['qty']);

print_r($_SESSION);

?>