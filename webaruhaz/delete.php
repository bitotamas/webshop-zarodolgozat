<?php 
// Initialize shopping cart class 
require_once 'cart.class.php'; 
$cart = new Cart; 
// Include the database config file 
//require_once 'config.php'; 
//print_r($_GET);
//print_r($cart);
$deleteItem = $cart->remove($_GET['id']);
// Redirect to cart page 
header('Location:index.php?page=cart.php');

?>