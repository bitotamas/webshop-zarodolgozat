<?php
    $str=$msg=$nev=$ev=$az="";  

    //a legördülő lista feltöltése:
    $sql="select id,name from products order by id desc";
    //$stmt=$db->query($sql);
    $stmt=$db->prepare($sql);
    $stmt->execute();
    while($row=$stmt->fetch())
        $str.="<option value='{$row['id']}'>{$row['name']}</option>";
        
    //a kiválasztott munkás adatainak a megjelenítése
    if(isset($_POST['szures']) && $_POST['munkasId']!='0'){
        $id=$_POST['munkasId'];
        //$sql="select az,nev,kezdev from munkasok where az={$id}";
        //$stmt=$db->query($sql);
        //$row=$stmt->fetch();
        $sql="select az,nev,kezdev from munkasok where az=?";
        $stmt=$db->prepare($sql);
        $stmt->execute([$id]);
        $row=$stmt->fetch();

        $nev=$row['nev'];
        $ev=$row['kezdev'];
        $az=$row['az'];
    }
    //modositas submit gomb megnyomása után:
    if(isset($_POST['modositas'])){
        //print_r($_POST);
        $nev=$_POST['nev'];
        $ev=$_POST['ev'];
        $az=$_POST['az'];
        //$sql="update munkasok set nev='{$nev}', kezdev={$ev} where az={$az}";
        //echo $sql;
        //$stmt=$db->exec($sql);
        $sql="update munkasok set nev=?,kezdev=? where az=?";
        $stmt=$db->prepare($sql);
        $result=$stmt->execute([$nev,$ev,$az]);//ha csak a művelet sikerességére vagyunk kiváncsiak
        if($result)
            $msg="sikeres adatmódosítás!";
        }

?>
<div class="container border">
        <h1 class="text-center">Munkások adatainak aktualizálása</h1>
        <div class="row m-1 p-2 justify-content-center">   
            <div class="col-5">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Válassz a listából:</label>
                        <select class="form-control" name="munkasId" >
                            <option value="0">válassz...</option>
                            <?=$str?>
                        </select>
                    </div>
                    <input type="submit" name="szures" value="adatok megjelenítése" >
                </form>
            </div>

            <div class="col-5">
                <form action="" method="post">
                    <input type="text" name="az" hidden  value="<?=$az?>">
                    <div class="form-group">
                        <label for="">A munkás neve:</label>
                        <input type="text" name="nev" class="form-control" value="<?=$nev?>">
                    </div>
                    <div class="form-group">
                        <label for="">A kezdési év:</label>
                        <input type="number" name="ev" class="form-control" value="<?=$ev?>">
                    </div>
                    <input type="submit" name="modositas" value="módosítás" >
                </form>

                <div><?=$msg?></div>
            </div>
    </div>