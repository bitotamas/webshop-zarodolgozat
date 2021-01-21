<?php
$msg=isset($_SESSION['msg'])?$_SESSION['msg']:'';

if(isset($_POST['be'])){
    extract($_POST);
    $sql="select name,password,permission from customers where email='{$email}'";
    $stmt=$db->query($sql);
    echo $stmt->rowCount();
    if(  $stmt->rowCount()>0){//létezik a felhasználó
        $row=$stmt->fetch(); 
        if(password_verify($password,$row['password'])){
            $_SESSION['email'] = $email;
            $_SESSION['permission']=$row['permission'];
            $_SESSION['name']=$row['name'];
            //echo "ok";
            header('Location: index.php?page=home.php');
        }else
            $msg="Helytelen email cím és jelszó páros !";
        
    }else
        $msg="Helytelen email cím";

}

?>
<div class="container">
  <div class="row justify-content-md-center p-5">
    <form class="col-md-4 border" method="post">
        <div><?=$msg?></div>
	    <h2 class="text-center">Bejelentkezés</h2>		
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="E-mail" required="required" value="">
        </div>
		
		<!--disable autocomplete input text in login form
		<input type="text" style="display:none">
		<input type="password" style="display:none">-->
		
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="jelszó" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="be" class="btn btn-success btn-block">Bejelentkezés </button>
        </div>
        <a href="register.php">Regisztráció...</a>
    </form>
    
    
</div>
</div>
</body>
</html>                                		                            