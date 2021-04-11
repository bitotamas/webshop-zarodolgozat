<?php
$tbl=$msg="";  
megjelenit($db,$tbl);



function megjelenit($db,&$tbl){//ha a bemeno parametert meg is akarjuk valtoztatni akkor referencat kell hasznalni
    $sql="select id,category,name,price,picture,quantity from products order by id desc";
    $stmt=$db->prepare($sql);//*
    $stmt->execute();//*
    while($row=$stmt->fetch()){
    extract($row);
    $tbl.="<tr><td>{$id}</td><td>{$category}</td><td>{$name}</td><td>{$price}</td><td>{$picture}</td><td>{$quantity}</td></tr>";
    }
} 

//adatok mentese:

$category="";
$name="";
$price="";
$picture="";
$quantity="";

//print_r($_POST);
if(isset($_POST['add']) && $_POST['categories']!="0"){
    
    
    $category=$_POST['categories'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $picture=$_POST['picture'];
    $quantity=$_POST['quantity'];

    $sql="insert into products values (null,'{$category}','{$name}',{$price},'{$picture}',{$quantity})";
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
<div class=" adminBorder bg-white">
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
                        <input type="text" name="name" class="form-control" value="<?=$name?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Termék ára: </label>
                        <input type="number" name="price" class="form-control" value="<?=$price?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Termék kép: </label>
                        <input type="text" name="picture" class="form-control" value="<?=$picture?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Termék darabszáma: </label>
                        <input type="text" name="quantity" class="form-control" value="<?=$quantity?>" required>
                    </div>
                    <input type="submit" name="add" value="Hozzáadás" class="btn btn-success m-t-5 p-2 rounded">
                    <hr>
                    <div><a href="index.php?page=Admin/adminMenu.php" class="btn btn-danger m-t-5 p-2 rounded">Vissza az admin menübe</a></div>
                    <!--Message-->
                    <?=$msg?>
                    <!--Message-->
                </form>
            </div>
            <div class="col-3">
                <table class="table table-bordered table-striped"><thead><th>Azonosító</th><th>Kategória</th><th>Név</th><th>Ár</th><th>Kép</th><th>Darabszám</th></thead>
                        <?=$tbl?>
                </table>
            </div>
        </div>
    </div>