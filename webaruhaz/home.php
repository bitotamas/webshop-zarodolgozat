<?php
include "Products/read.php";
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" id="carouselImg" src="images/banner.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" id="carouselImg" src="images/banner2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" id="carouselImg" src="images/banner3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container justify-content-center m-auto">
      <div class="jumbotron text-center bg-danger rounded text-black productHTagBorder"><h1>Ajánlatok</h1></div>
       <div class="row">
        <?=$divProducts?>
       </div>          
</div>
<link rel="stylesheet" href="Style/style.css">

