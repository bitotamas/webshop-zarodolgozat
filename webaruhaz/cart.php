<?php
include "cart.class.php";

print_r($_SESSION);

$cart=new Cart();

$sum=0;
$strCart="";
print_r($_GET);
/////////////////////////////////////
if(isset($_GET['id'])){

$query=$db->query("SELECT * from products where id={$_GET['id']}");
$row=$query->fetch();
extract($row);

$item_data=array('id'=>$id,'name'=>$name,'price'=>$price,'quantity'=>1);
print_r($item_data);
$insert_item=$cart->insert($item_data);
header("Location:index.php?page=cart.php");
}
/////////////////////////////////////

if(isset($_SESSION['cart_contents'])){
    $total=0;

    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $total=intval($quantity*$price);
        $sum+=$total;
        $strCart.="<tr><td>{$name}</td><td><input type='number' value='{$quantity}' id='{$id}' min='1'></td><td>{$price}</td><td>{$total}</td><td><a href='index.php?page=delete.php&id={$id}'>Remove</a></td></tr>";
    
    }
}


?>
<div class="container-fluid text-center items">
    <div class="jumbotron m-5">
        <table>
        <thead>
        <th>Item name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th>
        </thead>
        <tbody id="table">
            <?=$strCart?>
        </tbody>
        <tfoot><tr>
            <td colspan="3">Sum</td>
            <td><?=$sum==0? "" :$sum?></td>
        </tr></tfoot>
        </table>
    </div>
    <div><a href="index.php">continue shopping...</a><a href="index.php?page=checkout.php">Checkout</a></div>
    
</div>
<script src="cart.js"></script>