<?php
$id=$_GET['order_id'];
$orderinfo="SELECT orders.id,orders.total,orders.status,customers.name,customers.email,customers.phone,orders.postcode,orders.city,orders.street,orders.housenumber from orders inner join customers on customers.id=orders.customer_id where orders.id={$id}";
$stmt=$db->query($orderinfo);
$row=$stmt->fetch();
extract($row);
$rendelo=$name;

$ordersStr="";
$sum=0;
$orderdetails="SELECT c.name,c.price,b.quantity,c.price*b.quantity as subtotal
from orders a, order_items b, products c
where a.id=b.order_id and b.product_id=c.id and a.id={$id}";
$stmt=$db->query($orderdetails);
while($row=$stmt->fetch()){
    extract($row);
    $total=intval($quantity*$price);
    $sum+=$total;
    $ordersStr.="
    <div class='row'>

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


?>
    
    <div class='container'>
    
            <div class='card shopping-cart bg-info'>
                <div class="text-center "><h1>Rendelés adatai</h1></div>
                <div class='card-body text-center bg-white'>
                    <div>Vásárlói azonosító: <?=$id?></div>
                    <div>Rendelés időpontja: <?=$status?></div>
                    <div>Vevő neve: <?=$rendelo?></div>
                    <div>Email címe: <?=$email?></div>
                    <div>Telefonszáma: <?=$phone?></div>
                    <div>Szállítási cím: <?=$postcode." ".$city." ".$street." ".$housenumber?></div>
                </div>
                <div class="text-center"><h1>Termékek adatai</h1></div>
                <div class='card-body bg-white'>   
                    <?=$ordersStr?>    
                </div>
                <div class='card-body text-center'>
                    <h6><strong>Végösszeg: <?=$sum?> Ft</strong></h6>
                </div>
                 <a class="btn btn-success " href="index.php?page=home.php">Vissza a főoldalra</a>
            </div>
           
        </div>
        
    </div>
            
   

    


