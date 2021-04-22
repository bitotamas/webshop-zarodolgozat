<?php
$msg=isset($_SESSION['msg'])?$_SESSION['msg']:'';

if(isset($_POST['be'])){
    extract($_POST);
    $sql="select id,name,password,permission from customers where email='{$email}'";
    $stmt=$db->query($sql);
    echo $stmt->rowCount();
    if(  $stmt->rowCount()>0){
        $row=$stmt->fetch(); 
        if(password_verify($password,$row['password'])){
            $_SESSION['email'] = $email;
            $_SESSION['permission']=$row['permission'];
            $_SESSION['name']=$row['name'];
            $_SESSION['id']=$row['id'];
            header('Location: index.php?page=home.php');
        }else
            $msg="<div class='text-danger'>Helytelen email cím és jelszó páros !</div>";
        
    }else
            $msg="<div class='text-danger'>Helytelen email cím</div>";

}

?>
<div class="container">
  <div class="row justify-content-md-center p-5 ">
    <form class="col-lg-8 col-12 col-md-8 logRegBorder bg-white p-4" method="post">
        <?=$msg?>
	    <h2 class="text-center bg-danger mt-2 mb-4 p-2 rounded">Bejelentkezés</h2>		
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="E-mail" required="required" value="">
        </div>
		
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="jelszó" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="be" class="btn btn-success btn-block">Bejelentkezés </button>
        </div>
        <h5 class="text-center mt-2 mb-4 p-2 rounded">Ha még nem regisztráltál..</h5>
        <a href="index.php?page=LogReg/register.php" class="btn btn-warning btn-block">Regisztráció...</a>
    </form>
    
    
</div>
</div>
                              		                            