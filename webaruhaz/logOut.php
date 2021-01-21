<?php
unset($_SESSION['email']);
unset($_SESSION['permission']);
unset($_SESSION['name']);

header("Location: index.php?page=home.php");
?>