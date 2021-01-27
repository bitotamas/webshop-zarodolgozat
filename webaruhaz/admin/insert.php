<?php
$tbl=$msg="";  
megjelenit($db,$tbl);



function megjelenit($db,&$tbl){//ha a bemeno parametert meg is akarjuk valtoztatni akkor referencat kell hasznalni
    $sql="select id,category,name,price,picture from products order by id desc";
    $stmt=$db->prepare($sql);//*
    $stmt->execute();//*
    while($row=$stmt->fetch()){
    extract($row);
    $tbl.="<tr><td>{$id}</td><td>{$category}</td><td>{$name}</td><td>{$price}</td><td>{$picture}</td></tr>";
    }
} 

//adatok mentese:

$category="";
$name="";
$price="";
$picture="";

print_r($_POST);
if(isset($_POST['add']) && $_POST['categories']!="0" && $_POST['name']!=null && $_POST['price']!=null && $_POST['picture']!=null){
    
    
    $category=$_POST['categories'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $picture=$_POST['picture'];

    $sql="insert into products values (null,'{$category}','{$name}',{$price},'{$picture}')";
    $stmt=$db->exec($sql);

     if($stmt){
           $msg="<div class='text-success'>Sikeres adatbeírás!</div>";
           $tbl="";
           megjelenit($db,$tbl);
           header("Location:index.php?page=Admin/insert.php");
    }else
        $msg="<div class='text-danger'>Hiba! Nem sikerült az adat beírása az adatbázisba!</div";
}

?>
<div class="container adminBorder bg-white">
        <h1 class="text-center">Termékek</h1>
        <div class="row m-1 p-2">   
            <div class="col-5">
                <form method="post">
                    <div class="form-group">
                        <label for="">Kategória: </label>
                        <select class="form-control" name="categories" >
                            <option value="0">category...</option>
                            <option value='cpu'>Processzor</option>
                            <option value='gpu'>Videókártya</option>
                            <option value='memory'>Memória</option>
                            <option value='storage'>Háttértár</option>
                            <option value='psu'>Tápegység</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Termék neve: </label>
                        <input type="text" name="name" class="form-control" value="<?=$name?>">
                    </div>
                    <div class="form-group">
                        <label for="">Termék ára: </label>
                        <input type="number" name="price" class="form-control" value="<?=$price?>">
                    </div>
                    <div class="form-group">
                        <label for="">Termék kép: </label>
                        <input type="text" name="picture" class="form-control" value="<?=$picture?>">
                    </div>
                    <input type="submit" name="add" value="Hozzáadás" class="btn btn-success m-t-5 p-2 rounded">
                    <hr>
                    <div><a href="index.php?page=Admin/adminMenu.php" class="btn btn-danger m-t-5 p-2 rounded">Vissza az admin menübe</a></div>
                    <!--Message-->
                    <?=$msg?>
                    <!--Message-->
                </form>
            </div>
            <div class="col-5">
                <table class="table table-bordered table-striped"><thead><th>Azonosító</th><th>Kategória</th><th>Név</th><th>Ár</th><th>Kép</th></thead>
                        <?=$tbl?>
                </table>
            </div>
        </div>
    </div>