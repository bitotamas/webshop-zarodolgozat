<?php
$logReg="";


if(isset($_SESSION['email'])){

     $logReg="
    <li class='nav-item'>
        <a href='index.php?page=LogReg/logout.php' class='nav-link bg-info text-white rounded m-1 text-center'>Kijelentkezés</a>
    </li>
    <li>
        <a href='index.php?page=LogReg/profileMenu.php' class='nav-link bg-info text-white rounded m-1 text-center'>Profil: {$_SESSION['name']}</a>
    </li>

    ";

    if($_SESSION['permission']==1){
      $logReg.="
    <li class='nav-item'>
        <a href='index.php?page=Admin/adminMenu.php' class='nav-link bg-white text-dark rounded m-1 text-center'>Admin felület</a>
    </li>
      ";
    }
}else{
    $logReg="
    <li class='nav-item'>
        <a href='index.php?page=LogReg/login.php' class='nav-link bg-info text-white rounded m-1 text-center'>Bejelentkezés</a>
    </li>
    <li class='nav-item'>
        <a href='index.php?page=LogReg/register.php' class='nav-link bg-warning text-dark rounded m-1 text-center'>Regisztráció</a>
    </li>
    ";
}


?>
  
<nav class="navbar navbar-expand-xl navbar-dark fixed-top bg-dark navStyle mtToggler" role="navigation">

        <button type="button" class="navbar-toggler bg-danger mtTogglerButton p-3 m-1" data-toggle="collapse" data-target="#menuid" >    
			<span class="text-dark"><b>Menü</b></span>    
        </button>

<div class="row ">   
    <div class="navbar-collapse collapse" id="menuid">
<div class="mtNav m-auto d-flex justify-content-center">
        <div class="col mtLogo"> <a href="index.php?page=home.php" class="navbar-brand bg"><img id="logo" class="border rounded-circle" src="logo/logo.png" alt="MagmaTech" title="MagmaTech"></a></div>
            <div class="col mtMenu">
                <div clas="row">
                    <div class="col mtMenuButtons">
                        <ul class="navbar-nav mr-auto mtCategories">
                            <li class="nav-item">
                                <a href="index.php?page=home.php"  class="nav-link bg-danger text-dark text-center m-1 rounded">Főoldal</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?categ=cpu"  class="nav-link bg-danger text-dark text-center m-1 rounded">Processzorok</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?categ=gpu"  class="nav-link bg-danger text-dark text-center m-1 rounded">Videókártyák</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?categ=memory"  class="nav-link bg-danger text-dark text-center m-1 rounded">Memóriák</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?categ=storage"  class="nav-link bg-danger text-dark text-center m-1 rounded">Háttértárak</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?categ=psu"  class="nav-link bg-danger text-dark text-center m-1 rounded">Tápegységek</a>
                            </li>
                        </ul>
                    </div>
                            <div class="w-100"></div>
    
                    <div class="col">  
                            <ul class="navbar-nav mr-auto mtUser">    
                                <?=$logReg?>
                            </ul>
                    </div>
                    <div class="col">
                            <ul class="navbar-nav mr-auto mtSearch">
                                <input type="search" name="searchingWord" id="searchInput" class="mr-1 rounded" value="">
                                <a href="index.php?categ=search" id="searching"   class="nav-link bg-danger text-dark text-center m-1 rounded">Keresés</a>
                            </ul>
                    </div>
                </div>
            </div>
        <div class="col mtCart"><a href="index.php?page=Cartfiles/cart.php" class="nav-link rounded"><img id="cart" class="bordered rounded-circle" src="Images/shopping-cart.png" alt=""></a></div>      
</div>
    </div>
    </div>
</div>          
</nav>               
<script src="Navbars/search.js"></script>
