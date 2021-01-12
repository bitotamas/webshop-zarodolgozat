<?php

$cartDetails="";
$sum=0;

if(isset($_SESSION['cart_contents'])){
    $total=0;
    foreach($_SESSION['cart_contents'] as $key=>$arr){
        extract($arr);
        $total=intval($quantity*$price);
        $sum+=$total;
        $cartDetails.="<tr><td>{$name}</td><td>{$quantity}</td><td>{$price}</td><td>{$total}</td></tr>";
    
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

            $sql="SELECT MAX(id)as 'id' from orders";
            $stmt=$db->query($sql);
            $row=$stmt->fetch();
            $order_id=$row['id'];

            $sql="";
            foreach($_SESSION['cart_contents'] as $key=>$arr){
                extract($arr);
                $sql.="INSERT into order_items values(null,{$order_id},{$id},{$quantity});";
            }
            $stmt=$db->exec($sql);
            if($stmt){
            unset($_SESSION['cart_contents']);
            $emailCustomer=$email;
            include "mailer.php";
            
            header("Location:index.php?page=order_success.php&order_id=".$order_id);
            }
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="jumbotron m-5">
        <div class="row">
            <div class="col-6">
                <table class="table-bordered">
            
                    <thead>
                        <th>Item name</th><th>Quantity</th><th>Price</th><th>Total</th>
                    </thead>
                    <tbody id="table">
                        <?=$cartDetails?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Sum</td>
                            <td><?=$sum?></td>
                        </tr>
                    </tfoot>
                    </table>
            </div>
            <div class="col-6">
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
</body>
</html>