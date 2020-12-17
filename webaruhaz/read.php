<?php
require_once "database/config.php";

include "product.class.php";

$product=new Product($db);
if(isset($_GET['categ'])){
    $stmt=$product->filteredRead($_GET['categ']);
}else {
$stmt=$product->readRandom();
}
$nr=$stmt->rowCount();
//echo $nr;
$divProducts="";
if($nr>0){
while($row=$stmt->fetch()){
    extract($row);
    //$strTable.="<tr><td>{$name}</td><td><img src='images/{$picture}'></td><td>{$price}</td><td><a href='index.php?page=cart.php&id={$id}'>Add to cart</a></td></tr>";
    $divProducts.="
    <div class='border border-danger rounded'>

    <div class='row justify-content-center m-4'>
        <h3>{$name}</h3>
    </div>
    
    <div class='row justify-content-center m-4'>
        <img src='images/{$picture}'>
    </div>

    <div class='row justify-content-center m-4'>
        <h4>Listaár: {$price} Ft</h4>
    </div>
    
    <div class='row justify-content-center m-4'>
        <a href='index.php?page=cart.php&id={$id}' class='btn btn-success'>Add to cart</a>
    </div>

    </div>";
}
}

?>

