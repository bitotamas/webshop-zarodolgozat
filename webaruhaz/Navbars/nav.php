<?php
$logReg="";


if(isset($_SESSION['email'])){

     $logReg="
    <li class='nav-item'>
        <a href='index.php?page=LogReg/logout.php' id='menuButtons' class='nav-item nav-link bg-info text-white rounded m-2 text-center nav-right'>Kijelentkezés</a>
    </li>
    <li class='nav-item'>
        <span class='nav-item nav-link  text-white rounded m-2'>Bejelentkezve: {$_SESSION['name']}</span>
    </li>
    <li>
        <a href='index.php?page=LogReg/profile.php' id='menuButtons' class='nav-item nav-link bg-info text-white rounded m-2 text-center nav-right'>Profil</a>
    </li>

    ";

    if($_SESSION['permission']==1){
      $logReg.="
    <li class='nav-item'>
        <a href='index.php?page=Admin/adminMenu.php' id='menuButtons' class='nav-item nav-link bg-white text-dark rounded m-2 text-center nav-right'>Admin felület</a>
    </li>
      ";
    }
}else{
    $logReg="
    <li class='nav-item'>
                <a href='index.php?page=LogReg/login.php' id='menuButtons' class='nav-item nav-link bg-info text-white rounded m-2 text-center nav-right'>Bejelentkezés</a>
            </li>
            <li class='nav-item'>
                <a href='index.php?page=LogReg/register.php' id='menuButtons' class='nav-item nav-link navbar-right bg-warning text-dark rounded m-2 text-center'>Regisztráció</a>
    </li>
    ";
}


?>


<header>

<nav class="navbar navbar-expand-lg navbar-light navStyle">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navItems" aria-controls="navItems" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="index.php?page=home.php" class="navbar-brand"><img id="logo" class="border rounded-circle" src="logo/logo.png" alt=""></a>
        
        <div class="collapse navbar-collapse justify-content-center" id="navItems">
        <div>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a href="index.php?page=home.php" id="menuButtons" class="nav-item nav-link bg-danger text-dark rounded m-2">Főoldal</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=cpu" id="menuButtons" class="nav-item nav-link bg-danger text-dark rounded m-2">Processzorok</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=gpu" id="menuButtons" class="nav-item nav-link bg-danger text-dark rounded m-2">Videókártyák</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=memory" id="menuButtons" class="nav-item nav-link bg-danger text-dark rounded m-2">Memóriák</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=storage" id="menuButtons" class="nav-item nav-link bg-danger text-dark rounded m-2">Háttértárak</a>
            </li>
            <li class="nav-item">
                <a href="index.php?categ=psu" id="menuButtons" class="nav-item nav-link bg-danger text-dark rounded m-2">Tápegységek</a>
            </li>
            
            <!-- BEJELENTKEZÉS ÉS REGISZTRÁCIÓ -->
            <?=$logReg?>
            <!-------------------------------------->
            
          </ul>
        </div>
        
        </div>
        
        <a href="index.php?page=Cart/cart.php" class="navbar-brand rounded nav-item"><img id="cart" class="bordered rounded-circle" src="images/shopping-cart.png" alt=""></a>
            
</nav>
</header> 
<link rel="stylesheet" href="Style/style.css">