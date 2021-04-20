<?php
$nev=$msg=$email=$fnev="";  
if(isset($_POST['mentes'])){
	extract($_POST);
	//ellenőrizzük hogy ne legyen ilyen email es felhasznalonev mar az adatbázisban:
	$sql= "select email from customers where email='{$email}'";
	//echo $sql;
    $stmt=$db->query($sql);
    //echo $stmt->rowCount();
    if(  $stmt->rowCount()>0){//létezik ilyen email / felhasználó név
		$row=$stmt->fetch(); 
		$msg="<div class='text-danger'>Ez az email cím már foglalt</div>";
	}else{
		
			$pw=password_hash($password,PASSWORD_DEFAULT); 
			$sql="insert into customers values (null,'0','{$nev}','{$pw}','{$email}','{$phone}')";
			echo $sql;
			$stmt=$db->exec($sql);
			if($stmt){
				$_SESSION["msg"]="Sikeres regisztráció, kérjük jelentkezzen be!";
				header("location:index.php?page=LogReg/login.php");
			}
		
	}
	
}
	


?>	

<div class="container">
  <div class="row justify-content-md-center p-5">
    <form class="col-lg-8 col-12 col-md-8 logRegBorder bg-white" action="" method="post" enctype="multipart/form-data">
		<h2 class="text-center bg-danger mt-2 mb-4 p-2 rounded">Regisztráció</h2>

		<?=$msg?>	
		
	    <div class="form-group">
				<input type="text" class="form-control" name="nev" placeholder="Név" required value="<?=$nev?>">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="E-mail cím" required value="<?=$email?>">
        </div>
		
		<!--disable autocomplete input text in login form-->
		<input type="text" style="display:none">
		<input type="password" style="display:none">
		
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="Jelszó" placeholder="Jelszó" required >
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="conf_password" id="conf_jelszo" placeholder="Jelszó újra" required>
        </div>  

		<div class="form-group">
			<input type="text" class="form-control" name="phone" placeholder="Telefonszám" title="A telefonszámát a leendő megrendelések miatt kell megadnia." required>
		 </div>	  
		<div>
		</div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required> <div id="dmc"> Elfogadom az adatkezelési feltételeket<span id="dmctext">Ön elfogadja, hogy a weboldal, adatait felhasználva hajtson végre automatikus kitöltést a weboldalon.</span></div></label>
		</div>
		
		<div class="form-group">
            <input type="submit" class="btn btn-success btn-lg btn-block" name="mentes" id="mentes" value="Regisztráció">
        </div>
	</form>
  </div>
</div>
<script src="LogReg/ellenor.js"></script>
                          

