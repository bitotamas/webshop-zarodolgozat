<?php

$host="localhost";
$dbName="papirgyujtes";
$userName="root";
$password="";
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];


$db=new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$userName,$password,$options);
?>