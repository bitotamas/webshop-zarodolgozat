<?php
    $str=$msg=$category=$name=$price=$picture=$id="";  

    //a legördülő lista feltöltése:
    $sql="select id,name from products order by id desc";
    //$stmt=$db->query($sql);
    $stmt=$db->prepare($sql);
    $stmt->execute();
    while($row=$stmt->fetch())
        $str.="<option value='{$row['id']}'>{$row['name']}</option>";
        
    //a kiválasztott munkás adatainak a megjelenítése
    if(isset($_POST['filter']) && $_POST['products']!='0'){
        $id=$_POST['products'];
        //$sql="select az,nev,kezdev from munkasok where az={$id}";
        //$stmt=$db->query($sql);
        //$row=$stmt->fetch();
        $sql="select category,name,price,picture from products where id={$id}";
        $stmt=$db->query($sql);
        $row=$stmt->fetch();

        $category=$row['category'];
        $name=$row['name'];
        $price=$row['price'];
        $picture=$row['picture'];
    }
    //modositas submit gomb megnyomása után:
    if(isset($_POST['update'])){
        //print_r($_POST);
        $id=$_POST['id'];
        $category=$_POST['category'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $picture=$_POST['picture'];
        $sql="UPDATE products set category='{$category}', name='{$name}',price={$price},picture='{$picture}' where id={$id}";
        $stmt=$db->exec($sql);
        if($stmt){
            $msg="<div class='text-success'>Sikeres adatmódosítás!</div>";
        }else {
            $msg="<div class='text-success'>Sikertelen adatmódosítás!</div>";
        }
    }
     

?>
<div class="container border">
        <h1 class="text-center">Termékek módosítása</h1>
        <div class="row m-1 p-2 justify-content-center">   
            <div class="col-5">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Válassz a listából:</label>
                        <select class="form-control" name="products">
                            <option value="0">Termékek...</option>
                            <?=$str?>
                        </select>
                    </div>
                    <input type="submit" name="filter" value="Termék adatainak megjelenítése" class="btn btn-info">
                    <hr>
                    <div><a href="index.php?page=Admin/adminMenu.php" class="btn-danger m-t-5 p-2 rounded name">Vissza az admin menübe</a></div>
                </form>
            </div>

            <div class="col-5">
                <form action="" method="post">
                    <input type="text" name="id" hidden  value="<?=$id?>">
                    <div class="form-group">
                        <label for="">Kategória: </label>
                        <input type="text" name="category" class="form-control" value="<?=$category?>">
                    </div>
                    <div class="form-group">
                        <label for="">Termék neve: </label>
                        <input type="text" name="name" class="form-control" value="<?=$name?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ár: </label>
                        <input type="number" name="price" class="form-control" value="<?=$price?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kép: </label>
                        <input type="text" name="picture" class="form-control" value="<?=$picture?>">
                    </div>
                    <input type="submit" name="update" value="Módosítás" class="btn btn-success" >
                </form>

                <?=$msg?>
            </div>
    </div>
</div>