<?php
$nev=$msg=$email=$fnev="";  
print_r($_POST);
if(isset($_POST['mentes'])){
	extract($_POST);
	//ellenőrizzük hogy ne legyen ilyen email es felhasznalonev mar az adatbázisban:
	$sql= "select email from customers where email='{$email}'";
	//echo $sql;
    $stmt=$db->query($sql);
    //echo $stmt->rowCount();
    if(  $stmt->rowCount()>0){//létezik ilyen email / felhasználó név
		$row=$stmt->fetch(); 
		$msg="Ez az email cím már foglalt";
	}else{
		
			$pw=password_hash($password,PASSWORD_DEFAULT); 
			$sql="insert into customers values (null,'{$nev}','{$pw}','{$email}','{$phone}','{$address}')";
			echo $sql;
			$stmt=$db->exec($sql);
			if($stmt){
				$_SESSION["msg"]="sikeres regisztráció";
				header("location:index.php?page=login.php");
			}
		
	}
	
}
	


?>	

<div class="container">
  <div class="row justify-content-md-center p-5">
    <form class="col-4 border" action="" method="post" enctype="multipart/form-data">
		<h2 class="text-center" >Regisztráció</h2>

		<div class="alert alert-success " id="msg"><?=$msg?></div>	
		
	    <div class="form-group">
				<input type="text" class="form-control" name="nev" placeholder="név" required value="<?=$nev?>">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required value="<?=$email?>">
        </div>
		
		<!--disable autocomplete input text in login form-->
		<input type="text" style="display:none">
		<input type="password" style="display:none">
		
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="jelszo" placeholder="jelszó" required >
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="conf_password" id="conf_jelszo" placeholder="jelszó megerősítés" required>
        </div>  

		<div class="form-group">
			<input type="text" class="form-control" name="phone" placeholder="Telefonszám" required>
		 </div>	  
		<div>
		</div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required> Elfogadom az <a href="#">adatkezelési feltáteleket</a></label>
		</div>
		
		<div class="form-group">
            <input type="submit" class="btn btn-success btn-lg btn-block" name="mentes" id="mentes" value="Mentés">
        </div>
	</form>
  </div>
</div>
<script src="ellenor.js"></script>
                          

