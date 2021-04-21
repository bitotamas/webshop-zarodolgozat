<?php
include "Cartfiles/cart.class.php";

/*echo realpath('cart_qty.php'), PHP_EOL;
print_r($_SESSION);*/

$cart=new Cart();


$sum=0;
$strCart="";
/////////////////////////////////////
if(isset($_GET['id'])){

$query=$db->query("SELECT id,category,name,price,picture,quantity as dbqty from products where id={$_GET['id']}");
$row=$query->fetch();

extract($row);

$item_data=array('id'=>$id,'picture'=>$picture,'name'=>$name,'price'=>$price,'dbqty'=>$dbqty,'quantity'=>1);
//print_r($item_data);
$insert_item=$cart->insert($item_data);
header("Location:index.php?page=Cartfiles/cart.php");
}
/////////////////////////////////////

if(isset($_SESSION['cart_contents'])){
    $total=0;

    foreach($_SESSION['cart_contents'] as $key=>$arr){

        extract($arr);
        
        $total=intval($quantity*$price);
        $sum+=$total;
        $strCart.="
        <div class='row'>
        <div class='col-12 col-sm-12 col-md-2 text-center'>
                <img class='img-responsive' src='Images/{$picture}' alt='prewiew' width='120' height='80'>
        </div>
        <div class='col-12 text-sm-center col-sm-12 text-md-left col-md-6'>
            <h4 class='product-name'><strong>{$name}</strong></h4>
        </div>
        <div class='col-12 col-sm-12 text-sm-center col-md-4 text-md-right row'>
            <div class='col-3 col-sm-3 col-md-6 text-md-right' style='padding-top: 5px'>
                <h6><strong>{$price} Ft <span class='text-muted'> x </span></strong></h6>
            </div>
            <div class='col-4 col-sm-4 col-md-4'>
                <div class='quantity'>
                <input type='number' id='{$id}' value='{$quantity}' step='1' max='{$dbqty}' min='1'  title='Qty' class='qty' size='4'>
                </div>
            </div>
            <div class='col-2 col-sm-2 col-md-2 text-right'>
                <a href='index.php?page=Cartfiles/delete.php&id={$id}' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash' aria-hidden='true'></i></a>
            </div>
        </div>
    </div>
        ";
    }
}


?>

<div class='container'>
   <div class='card shopping-cart cartBorder'>
            <div class='card-header bg-danger text-light'>
                <i class='fa fa-shopping-cart' aria-hidden='true'></i>
                Bevásárlókosár
                <a href='index.php?page=home.php' class='btn btn-warning btn-sm pull-right'>Vásárlás fojtatása</a>
                <div class='clearfix'></div>
            </div>
            <div class='card-body' id="table">
                    <!-- PRODUCT -->
                    <?=$strCart!=""?$strCart:"<h1>Jelenleg üres a kosár</h1>"?>
                    <!-- END PRODUCT -->
            </div>
            
                <div class='pull-right' style='margin: 10px'>
                <?=$strCart!=""?"<a href='index.php?page=Cartfiles/checkout.php' class='btn btn-success pull-right'>Tovább a rendeléshez</a>":"<a href='index.php?page=home.php' class='btn btn-outline-success pull-right'>Vissza a főoldalra</a>"?>
                    
                    <div class='pull-right' style='margin: 5px'>
                        Teljes összeg: <b><?=$sum==0? "0" :$sum?> Ft</b>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="m-5"></div>
<script src="Cartfiles/cartt.js"></script>