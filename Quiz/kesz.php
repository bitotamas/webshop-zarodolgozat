<?php
session_start();

$helyes=$_SESSION['helyes'];
$rossz=$_SESSION['rossz'];


if(isset($_POST['ujra'])){
    header("Location:quiz.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyQuiz Megoldások</title>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <script src="bootstrap\jquery.min.js"></script>
    <script src="bootstrap\bootstrap.min.js"></script>
    <script src="quiz.js"></script>
    <link rel="stylesheet" href="bg.css">
</head>
<style>
    .container{
        border: 3pt solid black;
        background-color: white;
    }
    img{
        width: 250px;
    }
</style>
<body>
    <div class="container text-center">
        <div class="m-5 p-5">
            <input type="hidden" id="jovalaszok" value="<?=$helyes?>">
            <h2>A helyes válaszok száma: <?=$helyes?>, a helyteleneké pedig: <?=$rossz?>.</h2>
        </div>
        <div class="m-5 p-5">
        <img src="" id="smile">
        </div>
        <div class="m-5 p-5">
        <form method="post">
            
            <input type="submit" name="ujra" value="Újra" class="btn btn-success">

        </form>
        </div>
        
    </div>
    
</body>
</html>