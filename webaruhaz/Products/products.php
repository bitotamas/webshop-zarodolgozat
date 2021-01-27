<?php
include_once "Products/read.php";

?>
<div class="mt-4"></div>
<div class="container justify-content-center text-center ">
        
        <div class="text-center text-black rounded bg-danger productHTagBorder mb-2">
                <?=$hTag?>
                <hr>
                <h4>Találatok száma: <?=$talalatokSzama?></h4>
        </div>
        
       
        <div class="row">
                <?=$divProducts?>
        </div>
        
</div>
<link rel="stylesheet" href="Style/style.css">