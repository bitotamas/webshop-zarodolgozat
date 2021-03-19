<?php

if(!isset($_SESSION["email"])){
    
    header("Location:index.php?page=LogReg/login.php");
    
}


$cartDetails="";
$cartDetailsEmail="";
$sum=0;
$orderIdMail="";
$getName="";
$getEmail="";
$getPhone="";
if(isset($_SESSION['cart_contents'])){

    $sql="SELECT name,email,phone from customers where id={$_SESSION['id']}";
    $stmt=$db->query($sql);
    $row=$stmt->fetch();
    $getName=$row['name'];
    $getEmail=$row['email'];
    $getPhone=$row['phone'];



    $total=0;
    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $total=intval($quantity*$price);
        $sum+=$total;
        $cartDetails.="
    <div class='row m-2'>

            <div class='col-12 col-sm-12 col-md-2 text-center'>
                <img class='img-responsive' src='images/{$picture}' alt='prewiew' width='120' height='80'>
            </div>
        <div class='col-12 text-sm-center col-sm-12 text-md-left col-md-6'>
            <h4 class='product-name'><strong>{$name}</strong></h4>
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
}else header('Location:index.php?page=home.php');

if(isset($_POST['button'])){
    extract($_POST);
        $address=$_POST["isz"]." ".$_POST["city"]." ".$_POST["street"]." ".$_POST["streetNumber"].".";
        $customer_id=$_SESSION['id'];
        $date=date("Y-m-d");
        $sql="INSERT into orders values(null,{$customer_id},{$sum},'{$date}','{$address}')";
        $stmt=$db->exec($sql);

        if($stmt){
            echo "sikeres az orders táblába írás";


            $cartDetailsEmail.="
                <h1>Megrendelő adatai</h1>
                <p>Név: {$getName}</p>
                <p>Telefon: {$getPhone}</p>
                <p>Cím: {$address}</p>
                <h1>Rendelés termékei</h1>";


            $sql="SELECT MAX(id)as 'id' from orders";
            $stmt=$db->query($sql);
            $row=$stmt->fetch();
            $order_id=$row['id'];

            $sql="";
            foreach($_SESSION['cart_contents'] as $key=>$arr){
                extract($arr);
                $sql.="INSERT into order_items values(null,{$order_id},{$id},{$quantity});";
                $sql.="UPDATE products set quantity=(quantity-{$quantity}) where id=$id;";
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

            include "Cartfiles/mailer.php";
            
            header("Location:index.php?page=Cartfiles/order_success.php&order_id=".$order_id);
            }
        }
    

}
?>

<div class='container'>
    <div class="row justify-content-center">
        <div class="text-center bg-info col-12"><h1>Kosár adatai</h1></div>
                <div class='card shopping-cart'>
                    <div class='card-body border'>   
                        <?=$cartDetails?>      
                    </div>
                    <div class='card-body text-center bg-info'>
                        <h6><strong>Végösszeg: <?=$sum?> Ft</strong></h6>
                    </div>
                </div>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-4">
                    <form method="post">
                        <h2>Az Ön adatai</h2>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="" placeholder="Name" value="<?=$getName?>" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" id="" placeholder="Email" value="<?=$getEmail?>" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="phone" id="" placeholder="Phone" value="<?=$getPhone?>" readonly>
                        </div>
                    
                        <h2>Szállítási adatok</h2>
                        <div class="form-group">
                            <input class="form-control mt-1" type="number" name="isz" id="" placeholder="Irányító szám" value="" required>
                            <input class="form-control mt-1" type="text" name="city" id="" placeholder="Város" value="" required>
                            <input class="form-control" type="text" name="street" id="" placeholder="Utca" value="" required>
                            <input class="form-control" type="number" name="streetNumber" id="" placeholder="Házszám" value="" required>
                        </div>
                        <div class="form-group">
                            <input class="form-group btn btn-success btn btn-block" type="submit" name="button" id="" value="Place order">
                        </div>
                    </form>
            </div>
    </div>
</div>
<link rel="stylesheet" href="Style/style.css">    