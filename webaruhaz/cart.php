<?php
include "cart.class.php";

//print_r($_SESSION);

$cart=new Cart();

$sum=0;
$strCart="";
//print_r($_GET);
/////////////////////////////////////
if(isset($_GET['id'])){

$query=$db->query("SELECT * from products where id={$_GET['id']}");
$row=$query->fetch();
extract($row);

$item_data=array('id'=>$id,'picture'=>$picture,'name'=>$name,'price'=>$price,'quantity'=>1);
//print_r($item_data);
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
        /*
        $strCart.="<tr><td>{$name}</td><td><input type='number' value='{$quantity}' id='{$id}' min='1'></td><td>{$price}</td><td>{$total}</td><td><a href='index.php?page=delete.php&id={$id}'>Remove</a></td></tr>";
        */
        $strCart.="
        <div class='row'>
        <div class='col-12 col-sm-12 col-md-2 text-center'>
                <img class='img-responsive' src='images/{$picture}' alt='prewiew' width='120' height='80'>
        </div>
        <div class='col-12 text-sm-center col-sm-12 text-md-left col-md-6'>
            <h4 class='product-name'><strong>{$name}</strong></h4>
            <h4>
                <small>Product description</small>
            </h4>
        </div>
        <div class='col-12 col-sm-12 text-sm-center col-md-4 text-md-right row'>
            <div class='col-3 col-sm-3 col-md-6 text-md-right' style='padding-top: 5px'>
                <h6><strong>{$price} Ft <span class='text-muted'> x </span></strong></h6>
            </div>
            <div class='col-4 col-sm-4 col-md-4'>
                <div class='quantity'>
                <input type='number' id='{$id}' value='{$quantity}' step='1' max='99' min='1'  title='Qty' class='qty' size='4'>
                </div>
            </div>
            <div class='col-2 col-sm-2 col-md-2 text-right'>
                <a href='index.php?page=delete.php&id={$id}' class='btn btn-outline-danger btn-xs'><i class='fa fa-trash' aria-hidden='true'></i></a>
            </div>
        </div>
    </div>
        ";
    }
}


?>
<!--
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
    <div><a href="index.php?page=home.php">continue shopping...</a><a href="index.php?page=checkout.php">Checkout</a></div>
    
</div>
-->
<div class="m-5"></div>
<div class='container'>
   <div class='card shopping-cart'>
            <div class='card-header bg-info text-light'>
                <i class='fa fa-shopping-cart' aria-hidden='true'></i>
                Bevásárlókosár
                <a href='index.php?page=home.php' class='btn btn-danger btn-sm pull-right'>Vásárlás fojtatása</a>
                <div class='clearfix'></div>
            </div>
            <div class='card-body' id="table">
                    <!-- PRODUCT -->
                    <?=$strCart?>
                    <!-- END PRODUCT -->
            </div>
            <div class='card-footer'>
                <div class='coupon col-md-5 col-sm-5 no-padding-left pull-left'>
                    <div class='row'>
                        <div class='col-6'>
                            <input type='text' class='form-control' placeholder='Kupon'>
                        </div>
                        <div class='col-6'>
                            <input type='submit' class='btn btn-info' value='Bevált'>
                        </div>
                    </div>
                </div>
                <div class='pull-right' style='margin: 10px'>
                    <a href='index.php?page=checkout.php' class='btn btn-success pull-right'>Checkout</a>
                    <div class='pull-right' style='margin: 5px'>
                        Total price: <b><?=$sum==0? "" :$sum?> Ft</b>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="m-5"></div>
<script src="cart.js"></script>