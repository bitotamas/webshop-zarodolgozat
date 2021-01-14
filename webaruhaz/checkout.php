<?php

$cartDetails="";
$cartDetailsEmail="";
$sum=0;
$orderIdMail="";
if(isset($_SESSION['cart_contents'])){
    $total=0;
    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $total=intval($quantity*$price);
        $sum+=$total;
        $cartDetails.="
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
            <div class='col-3 col-sm-3 col-md-7 text-md-right' style='padding-top: 5px'>
                <h6><strong>Listaár: {$price} Ft</strong></h6>
            </div>
                <div class='col-3 col-sm-3 col-md-7 text-md-right'>
                    <div class='quantity'>
                    <h6><strong>Darabszám: {$quantity} db</strong></h6>
                    </div>
                </div>
            </div>
            
    </div>";
    
    }
}else header('Location:index.php');

if(isset($_POST['button'])){
    extract($_POST);

    $sql="INSERT into customers values(null,'{$name}',null,'{$email}','{$phone}','{$address}')";
    $stmt=$db->exec($sql);
    if($stmt){
        echo "sikeres adatbeírás";
        $sql="SELECT MAX(id)as 'id' from customers";
        $stmt=$db->query($sql);
        $row=$stmt->fetch();
        $customer_id=$row['id'];
        $date=date("Y-m-d");
        $sql="INSERT into orders values(null,{$customer_id},{$sum},'{$date}')";
        $stmt=$db->exec($sql);

        if($stmt){
            echo "sikeres az orders táblába írás";


            $cartDetailsEmail.="
                <h1>Megrendelő adatai</h1>
                <p>Név: {$_POST['name']}</p>
                <p>Telefon: {$_POST['phone']}</p>
                <p>Cím: {$_POST['address']}</p>
                <h1>Rendelés termékei</h1>";


            $sql="SELECT MAX(id)as 'id' from orders";
            $stmt=$db->query($sql);
            $row=$stmt->fetch();
            $order_id=$row['id'];

            $sql="";
            foreach($_SESSION['cart_contents'] as $key=>$arr){
                extract($arr);
                $sql.="INSERT into order_items values(null,{$order_id},{$id},{$quantity});";

                $cartDetailsEmail.="
                <hr>
                <p>{$name}</p>
                <p>{$price}</p>
                <p>{$quantity}</p>
                <hr>
                ";


            }
            $stmt=$db->exec($sql);
            if($stmt){
            unset($_SESSION['cart_contents']);
            $emailCustomer=$email;
            $orderIdMail=$order_id;
            $cartDetailsEmail.="
            <p>Végösszeg: {$sum}</p>
            ";

            include "mailer.php";
            
            header("Location:index.php?page=order_success.php&order_id=".$order_id);
            }
        }
    }

}
?>

<div class='container'>
    <div class="text-center bg-info"><h1>Kosár adatai</h1></div>
            <div class='card shopping-cart'>
                <div class='card-body'>   
                    <?=$cartDetails?>      
                </div>
                <div class='card-body text-center'>
                    <h6><strong>Végösszeg: <?=$sum?> Ft</strong></h6>
                </div>
            </div>
        </div>
</div>

<div class="container">
    <div class="jumbotron m-5 ">
            <div class="col-12">
                <form method="post">
                    <h2>Contact details</h2>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="" placeholder="Name" value="" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" id="" placeholder="Email" value="" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" id="" placeholder="Phone" value="" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="address" id="" placeholder="Address" value="" required>
                    </div>
                    <div class="form-group">
                        <input class="form-group btn btn-success btn btn-block" type="submit" name="button" id="" value="Place order">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    