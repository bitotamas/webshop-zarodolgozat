<?php
session_start();
include_once "Database/config.php";
include_once "Cart/cart.class.php";
echo "ok";
print_r($_GET);


$cart=new Cart();

$updateItem=$cart->updateQty($_GET['id'],$_GET['qty']);

print_r($_SESSION);

?>