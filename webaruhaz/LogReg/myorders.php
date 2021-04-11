<?php
$orders="";
$sql="SELECT a.id as orderid, a.status as status, b.quantity as qty, c.name as name, c.price as price, c.picture as pic from orders a,order_items b,products c where a.id=b.order_id and b.product_id=c.id AND a.customer_id={$_SESSION['id']}";
$stmt=$db->query($sql);
while($row=$stmt->fetch()){
   extract($row); 
    $orders.="
<div class='row m-2'>
    <div class='col-12 col-sm-12 col-md-2 text-center'>
        <img class='img-responsive' src='images/{$pic}' alt='prewiew' width='120' height='80'>
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
                <h6><strong>Darabszám: {$qty} db</strong></h6>
            </div>
        </div>
        <div class='col-3 col-sm-3 col-md-7 text-md-right'>
            <div class='status'>
                <h6><strong>Rendelés dátuma: {$status}</strong></h6>
            </div>
        </div>
    </div> 
           
</div>
";
}

?>
<div class='container'>
    <div class="row justify-content-center">
        
                <div class='card shopping-cart col-12 bg-info'>
                <div class="text-center bg-info col-12"><h1>Az ön rendelései</h1></div>
                    <div class='card-body bg-white'>   
                        <?=$orders!=""?$orders:"<h3 class='text-center'>Önnek jelenleg egy rendelése sincsen.</h3>"?>      
                    </div>
                    <div class="row">
                        <div class="col-6 text-center"><a href="index.php?page=LogReg/profileMenu.php" class="btn btn-warning">Vissza a profilmenübe</a></div>
                        <div class="col-6 text-center"><a href="index.php?page=home.php" class="btn btn-danger">Vissza a főoldalra</a></div>
                    </div>
                </div>
        </div>
       
       
               
    </div>
</div>