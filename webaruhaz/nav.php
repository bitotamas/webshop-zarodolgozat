
<header>  
    <div>
        <nav class="navbar navbar-expand-md ml-auto navbar-dark bg-danger fixed-top justify-content-center nav">
            <a href="index.php?page=home.php" class="navbar-brand"><img id="logo" class="border rounded-circle" src="logo/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav ml-auto" id="navbarNavAltMarkup">
                    <a href="index.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Főoldal</a>
                    <a href="index.php?page=cpu.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Processzorok</a>
                    <a href="index.php?page=gpu.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Videókártyák</a>
                    <a href="index.php?page=memory.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Memóriák</a>
                    <a href="index.php?page=storage.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Háttértárak</a>
                    <a href="index.php?page=psu.php" id="menuButtons" class="nav-item nav-link  text-dark rounded m-2">Tápegységek</a>
                    <a href="index.php?page=login.php" id="menuButtons" class="nav-item nav-link bg-info text-dark rounded m-2">Bejelentkezés</a>
                    
                </div> 
                <div class="navbar-nav ml-auto">
                <a href="index.php?page=cart.php" id="menuButtons" class="nav-item nav-link rounded m-2"><img id="cart" class="rounded-circle" src="images/shopping-cart.png" alt=""></a>
                </div>  
        </nav>
    </div>

        <?php
        if(isset($_GET['page'])){    
                include $_GET['page'];  
        }else include "home.php";
        ?>
   </div>
</header> 