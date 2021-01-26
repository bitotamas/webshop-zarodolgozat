<?php
unset($_SESSION['email']);
unset($_SESSION['permission']);
unset($_SESSION['name']);
unset($_SESSION['id']);

header("Location: index.php?page=home.php");
?>