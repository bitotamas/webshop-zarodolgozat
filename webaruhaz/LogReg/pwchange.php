<?php

if(isset($_POST['mentes'])){

    extract($_POST);

    $pw=password_hash($password,PASSWORD_DEFAULT); 
	$sql="UPDATE customers SET password='{$pw}' where id={$_SESSION['id']}";
	$stmt=$db->exec($sql);
	if($stmt){
				header("Location:index.php?page=LogReg/pwchange.php");
              
			}

    
    
}
?>
<div class="row justify-content-center">
    <div class="col-6 bg-white">
        <form method="post">
                <h2 class="text-center"><b><i>Jelszó módosítás</i></b></h2>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="jelszo" placeholder="Új jelszó" required >
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="conf_password" id="conf_jelszo" placeholder="Új jelszó újra" required>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" name="mentes" id="mentes" value="Jelszó módosítása">
            </div>

        </form>

            <div class="row mb-2">
                <div class="col-6 text-center"><a href="index.php?page=LogReg/profileMenu.php" class="btn btn-warning">Vissza a profilmenübe</a></div>
                <div class="col-6 text-center"><a href="index.php?page=home.php" class="btn btn-danger">Vissza a főoldalra</a></div>
            </div>
            <div class="row">
                <p id="msg"></p>
                <p><?=isset($_SESSION['pwUpdate'])?$_SESSION['pwUpdate']:""?></p>

            </div> 
        
    </div>
</div>
<script src="LogReg/ellenor.js"></script>  