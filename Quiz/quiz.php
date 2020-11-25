<?php
session_start();
require_once "config.php";

$radio="";
$h="";
$id="";
$kerdes=$v1=$v2=$v3="";
$jovalaszok=0;
$helyes=$rossz="";
$megoldasId=$megoldas="";

$kerdess=[];
$sql="SELECT id,kerdes,valasz1,valasz2,valasz3 from kerdesek";
$stmt=$db->query($sql);
$szamlalo=0;
while($row=$stmt->fetch()){

    $szamlalo++;

    $kerdes=$row['kerdes'];
    $id=$row['id'];
    $v1=$row['valasz1'];
    $v2=$row['valasz2'];
    $v3=$row['valasz3'];
    $radio.="
    <h3>{$kerdes}</h3>
    <br>
    <ol>
        <li>
            <label for='1'>{$v1}</label>
            <input type='radio' name='{$id}' value='{$v1}'>
        </li>
    
        
        <li>
            <label for='2'>{$v2}</label>
            <input type='radio' name='{$id}' value='{$v2}'>
        </li>
    
        <li>
            <label for='3'>{$v3}</label>
            <input type='radio' name='{$id}' value='{$v3}'>
        </li>
    </ol>
    <hr>";
    
}


if(isset($_POST['kuldes'])){
    $h=[];
    $r=[];
$flag=true;
    for($i=1;$i<=$szamlalo;$i++){
        if(isset($_POST[$i]))
           if(is_string($_POST[$i]))
               $valasz=$_POST[$i];
           else
                $valasz=strval($_POST[$i]);      
        else
            $flag=false;
          
        

   
   if($flag){     
        $sql="SELECT megoldas from megoldasok where megoldas like '{$valasz}'";
        $stmt=$db->query($sql);
        if($stmt->rowCount()==1){
            $h[]="Helyes";
        }else {
            $r[]="Rossz";
        }
    }
    }


    $helyes=count($h);
    $rossz=count($r);
    $_SESSION['helyes']=$helyes;
    $_SESSION['rossz']=$rossz;
    header("Location:kesz.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyQuiz</title>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <script src="bootstrap\jquery.min.js"></script>
    <script src="bootstrap\bootstrap.min.js"></script>
    <link rel="stylesheet" href="bg.css">
    

</head>
<style>
    body{
       /* background-image: url("question-mark.jpg");*/
    }
    .container-fluid{
        max-width: 800px;
        background-color: lightgray;
        border: solid 4px;
        margin: auto;
        
    }
    hr{
        border: none; 
        height: 4px; 
        background: black;
    }
    li{
       /* list-style-type: none;*/
        
    }
    h3{
        text-align: center;
    }
   
</style>
<body>
<div class="p5 m-5">
    <div class="container-fluid"> 
           
        <form method="post">
            
            <div class="row p-5 m-5 justify-content-center">
                <div>
                    
                        <?=$radio?>
                        
                </div>
            </div>
       
        <div class="row justify-content-center">
            <input type="hidden" id="h" value="<?=$helyes?>">
            <input type="hidden" id="r" value="<?=$rossz?>">
            <input type="submit" value="Kész" name="kuldes" id="kuld" class="btn btn-success">
        </div>
         </form>
         
         
      </div>
    
    </div>
</div>
</body>
</html>