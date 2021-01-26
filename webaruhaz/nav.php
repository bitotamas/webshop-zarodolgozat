<?php
$logReg="";


if(isset($_SESSION['email'])){

     $logReg="
    <li class='nav-item'>
    <a href='index.php?page=logout.php' id='menuButtons' class='nav-item nav-link bg-info text-white rounded m-2 text-center nav-right'>Kijelentkezés</a>
    </li>
    <li class='nav-item'>
        <span class='nav-item nav-link  text-dark rounded m-2'>Bejelentkezve: {$_SESSION['name']}</span>
    </li>

    ";

    if($_SESSION['permission']==1){
      $logReg.="
    <li class='nav-item'>
        <a href='index.php?page=admin.php' id='menuButtons' class='nav-item nav-link bg-white text-dark rounded m-2 text-center nav-right'>Admin felület</a>
    </li>
      ";
    }
}else{
    $logReg="
    <li class='nav-item'>
                <a href='index.php?page=login.php' id='menuButtons' class='nav-item nav-link bg-info text-white rounded m-2 text-center nav-right'>Bejelentkezés</a>
            </li>
            <li class='nav-item'>
                <a href='index.php?page=register.php' id='menuButtons' class='nav-item nav-link navbar-right bg-warning text-dark rounded m-2 text-center'>Regisztráció</a>
    </li>
    ";
}


?>

<style>
.border-btm{
    border-bottom: solid 2px black;
}
</style>
<header>
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-danger border-btm">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navItems" aria-controls="navItems" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="index.php?page=home.php" class="navbar-brand"><img id="logo" class="border rounded-circle" src="logo/logo.png" alt=""><span style="font-weight: bold;"><u>MagmaTech</u></span></a>
        
        <div class="collapse navbar-collapse justify-content-center" id="navItems">
        <div>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a href="index.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Főoldal</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=cpu" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Processzorok</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=gpu" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Videókártyák</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=memory" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Memóriák</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=storage" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Háttértárak</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=psu" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Tápegységek</a>
            </li>
            <!-- BEJELENTKEZÉS ÉS REGISZTRÁCIÓ -->
            <?=$logReg?>
            <!-------------------------------------->
          </ul>
        </div>
        
        </div>
        
        <a href="index.php?page=cart.php" class="navbar-brand rounded nav-item"><img id="cart" class="bordered rounded-circle" src="images/shopping-cart.png" alt=""></a>
        
    </div>       
</nav>
</header> 