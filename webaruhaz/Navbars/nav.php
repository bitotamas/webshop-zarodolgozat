<?php
$logReg="";


if(isset($_SESSION['email'])){

     $logReg="
    <li class='nav-item'>
        <a href='index.php?page=LogReg/logout.php' class='nav-link bg-info text-white rounded m-1 text-center'>Kijelentkezés</a>
    </li>
    <li class='nav-item'>
        <span class='nav-link text-white rounded'>Bejelentkezve: {$_SESSION['name']}</span>
    </li>
    <li>
        <a href='index.php?page=LogReg/profile.php' class='nav-link bg-info text-white rounded m-1 text-center'>Profil</a>
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
<!--
<header class="header">
		<h1 class="logo"><a href="index.php?page=home.php"><img id="logo" src="logo/logo.png" alt=""></a></h1>
      <ul class="main-nav">
                <li>
                    <a href="index.php?page=home.php">Főoldal</a>
                </li>
                <li>
                    <a href="index.php?categ=cpu">Processzorok</a>
                </li>
                <li>
                    <a href="index.php?categ=gpu">Videókártyák</a>
                </li>
                <li>
                    <a href="index.php?categ=memory">Memóriák</a>
                </li>
                <li>
                    <a href="index.php?categ=storage">Háttértárak</a>
                </li>
                <li>
                    <a href="index.php?categ=psu">Tápegységek</a>
                </li>
      </ul>
	</header>
-->
  
<nav class="navbar navbar-expand-xl navbar-dark fixed-top bg-dark navStyle sajattoggler" role="navigation">

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menuid" >    
			<span class="navbar-toggler-icon"></span>    
        </button>
        
           
 <!--        
<div class="navbar-collapse collapse " id="menuid">
    <div clas="row">
        <div class="col">
            <ul class="navbar-nav mr-auto">
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
            <ul class="navbar-nav mr-auto">    
                
                <?=$logReg?>
                
                <li class="nav-item">
                <a href="index.php?page=Cartfiles/cart.php" class="nav-link rounded"><img id="cart" class="bordered rounded-circle" src="images/shopping-cart.png" alt=""></a>
                </li>
            </ul>
    </div>
    </div>
</div>
-->
<div clas="row justify-content-center">   
    <div class="navbar-collapse collapse" id="menuid">
<div class="proba">
        <div class="col border sajatlogo"> <a href="index.php?page=home.php" class="navbar-brand bg"><img id="logo" class="border rounded-circle" src="logo/logo.png" alt=""><b class="bg-white text-dark rounded">MagmaTech</b></a></div>
        <div class="col border sajatmenu">
                <div clas="row">
                    <div class="col kozepso">
                        <ul class="navbar-nav mr-auto felsosor">
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
                            <ul class="navbar-nav mr-auto alsosor">    
                            <?=$logReg?>
                            </ul>
                    </div>
                </div>
            </div>
        <div class="col border sajatkosar"><a href="index.php?page=Cartfiles/cart.php" class="nav-link rounded"><img id="cart" class="bordered rounded-circle" src="images/shopping-cart.png" alt=""></a></div>      
</div>
    </div>
    </div>
</div>          
</nav>               

<link rel="stylesheet" href="Style/style.css">
