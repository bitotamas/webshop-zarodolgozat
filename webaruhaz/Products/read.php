<?php



include "Products/product.class.php";
$hTag="";
$talalatokSzama="";
$product=new Product($db);
if(isset($_GET['categ'])){
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

}else {
$stmt=$product->readRandom();
}
$nr=$stmt->rowCount();
$talalatokSzama=$stmt->rowCount();
//echo $nr;
$divProducts="";
if($nr>0){
while($row=$stmt->fetch()){
    extract($row);
    //$strTable.="<tr><td>{$name}</td><td><img src='images/{$picture}'></td><td>{$price}</td><td><a href='index.php?page=cart.php&id={$id}'>Add to cart</a></td></tr>";
    /*$divProducts.="
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

    </div>";*/
    
    $divProducts.="
    <div class='col-12 col-sm-12 col-md-6 col-lg-3 mb-3'>
        <div class='card h-100 justify-content-center text-center productBorder'>
            
                <img id='cartImg' src='Images/{$picture}' class='card-img-top mt-5'>
            
            <div class='card-body border'>
                <h4 class='card-title'>{$name}</h4>
                <hr>
                
            </div>
            <div class='card'>
                <h5 class='card-title'>Listaár: {$price} Ft</h5>
            </div>
            <div class='card'>
                <a href='index.php?page=Cart/cart.php&id={$id}' class='btn btn-success'>Add to cart</a>
            </div>
        </div>
    </div>
    ";
}
}

?>
<link rel="stylesheet" href="Style/style.css">

