<?php

$orderIdMail="";
$getName="";
$getEmail="";
$getPhone="";

$sql="SELECT name,email,phone from customers where id={$_SESSION['id']}";
$stmt=$db->query($sql);
$row=$stmt->fetch();
$getName=$row['name'];
$getEmail=$row['email'];
$getPhone=$row['phone'];


if(isset($_POST['update'])){
    $nName=$_POST['name'];
    $nEmail=$_POST['email'];
    $nPhone=$_POST['phone'];

    $sql="UPDATE customers set name='{$nName}',email='{$nEmail}',phone={$nPhone} where id={$_SESSION['id']}";
    $stmt=$db->exec($sql);

    if($stmt){
        $_SESSION['userUpdate']="<h2 class='text-success text-center'><b><i>Sikeresen megváltoztatta az adatait!</i></b></h2>";
        header("Location:index.php?page=LogReg/userinfo.php");
    }else{
        $_SESSION['userUpdate']="<h2 class='text-danger text-center'><b><i>Hiba történt! Sikertelen adatmódosítás! Próbálja újra!</i></b></h2>";
        header("Location:index.php?page=LogReg/userinfo.php");
    }
}


?>
<div class="row justify-content-center ">
            <div class="col-6 bg-white">
                    <form method="post">
                        <h2 class="text-center"><b><i>Az Ön adatai</i></b></h2>
                        <div class="form-group">
                            <input class="form-control text-center" type="text" name="name" id="" placeholder="Name" value="<?=$getName?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control text-center" type="text" name="email" id="" placeholder="Email" value="<?=$getEmail?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control text-center" type="text" name="phone" id="" placeholder="Phone" value="<?=$getPhone?>">
                        </div>
                        <div class="form-group text-center">
                            <input class="w-50 btn btn-success" type="submit" name="update" id="" value="Adatok mentése">
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-center"><a href="index.php?page=LogReg/profileMenu.php" class="btn btn-warning">Vissza a profilmenübe</a></div>
                            <div class="col-6 text-center"><a href="index.php?page=home.php" class="btn btn-danger">Vissza a főoldalra</a></div>
                        </div>
                        <div class="row">
                            <?=isset($_SESSION['userUpdate'])?$_SESSION['userUpdate']:""?>
                        </div>
            </div>
    </div>