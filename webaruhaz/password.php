<?php
    require_once "database/config.php";
    $jelszo=password_hash('admin',PASSWORD_DEFAULT); 
    $sql="update customers set password='{$jelszo}' where id=1";
    $stmt=$db->exec($sql);
?>