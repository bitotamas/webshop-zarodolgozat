<?php

include "Products/product.class.php";

$hTag="";
$talalatokSzama="";
$product=new Product($db);
if(isset($_GET['keyword'])){
    $stmt=$product->search($_GET['keyword']);
    $hTag='<h1>Keresés: "'.$_GET['keyword'].'" kulcsszóval</h1>';
}else if(isset($_GET['categ'])){
    if($_GET['categ']=="cpu"){
        $hTag="<h1>Processzorok</h1>";
        }else if($_GET['categ']=="gpu"){
            $hTag="<h1>Videókártyák</h1>";
            }else if($_GET['categ']=="memory"){
                $hTag="<h1>Memóriák</h1>";
                }else if($_GET['categ']=="storage"){
                    $hTag="<h1>Háttértárak</h1>";
                    }else if($_GET['categ']=="psu"){
                        $hTag="<h1>Tápegységek</h1>";
                        }
                        

    $stmt=$product->filteredRead($_GET['categ']);
    
}else{
   $stmt=$product->readRandom(); 
}
    $nr=$stmt->rowCount();
    $talalatokSzama=$stmt->rowCount();
    $divProducts="";
    $hozzaad="";
    $raktaron="";
if($nr>0){
    while($row=$stmt->fetch()){
        extract($row);
    if($quantity==0){
        $hozzaad="<span class='bg-warning'>Nincs raktáron</span>";
    }else{
        $hozzaad="<a href='index.php?page=Cartfiles/cart.php&id={$id}' class='btn btn-success'>Kosárba</a>";
    }
    if($quantity>5){
        $raktaron="<h6 class='text-success'>Szállításra kész > 5 db</h6>";
    }else if($quantity<=5 && $quantity>0){
        $raktaron="<h6 class='text-success'>Szállításra kész {$quantity} db</h6>";
    }else{
        $raktaron="";
    }
    $divProducts.="
    <div class='col-12 col-sm-12 col-md-6 col-lg-3 mb-3'>
        <div class='card h-100 justify-content-center text-center productBorder'>  
                <img id='cartImg' src='Images/{$picture}' class='card-img-top mt-5'>
            <div class='card-body border'>
                <h4 class='card-title'>{$name}</h4>
                <hr>    
            </div>
            <div class='card'>
                {$raktaron}
            </div>
            <div class='card'>
                <h5 class='card-title'>Listaár: {$price} Ft</h5>
            </div>
            <div class='card'>
               {$hozzaad}
            </div>
        </div>
    </div>
    ";
}
}
?>

