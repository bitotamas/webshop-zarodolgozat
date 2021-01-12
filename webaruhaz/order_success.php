<?php
$id=$_GET['order_id'];
$orderinfo="SELECT orders.id,orders.total,orders.status,customers.name,customers.email,customers.phone from orders inner join customers on customers.id=orders.customer_id where orders.id={$id}";
$stmt=$db->query($orderinfo);
$row=$stmt->fetch();
extract($row);

$ordersStr="";

$orderdetails="SELECT c.name,c.price,b.quantity,c.price*b.quantity as subtotal
from orders a, order_items b, products c
where a.id=b.order_id and b.product_id=c.id and a.id={$id}";
$stmt=$db->query($orderdetails);
while($row=$stmt->fetch()){
    extract($row);
    $ordersStr.="<tr><td>{$name}</td><td>{$quantity}</td><td>{$price}</td><td>{$subtotal}</td></tr>";
}


?>

    <div>Reference id: <?=$id?></div>
    <div>Total: <?=$total?></div>
    <div>Placed on: <?=$status?></div>
    <div>Buyer Name: <?=$name?></div>
    <div>Email: <?=$email?></div>
    <div>Phone: <?=$phone?></div>

    <table>
        <thead>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sub Total</th>
        </thead>
        <tbody>
            <?=$ordersStr?>
        </tbody>
    </table>

    <a class="btn btn-success" href="index.php">Vissza a főoldalra</a>


