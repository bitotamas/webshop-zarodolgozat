<?php
unset($_SESSION['email']);
unset($_SESSION['permission']);
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['userUpdate']);
unset($_SESSION['msg']);

header("Location: index.php?page=home.php");
?>