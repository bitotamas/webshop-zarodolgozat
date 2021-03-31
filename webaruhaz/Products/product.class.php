<?php
class Product{

    private $conn;
    private $table_name="products";

    public $id;
    public $category;
    public $name;
    public $price;
    public $picture;
    public $quantity;
    

    public function __construct($db){
        $this->conn=$db;
    }

    function readRandom(){
        $sql="SELECT * from {$this->table_name} where quantity!=0 ORDER BY RAND() LIMIT 8";
        $stmt=$this->conn->query($sql);
        return $stmt;
    }
    function filteredRead($categ){
        $sql="SELECT * from {$this->table_name} where category='{$categ}' order by quantity desc,name";
        $stmt=$this->conn->query($sql);
        return $stmt;
    }
    function search($wordkey){
        $sql="SELECT * from {$this->table_name} where name like '{$wordkey}' or name like '%{$wordkey}' or name like '{$wordkey}%' or name like '%{$wordkey}%' order by quantity desc,name";
        $stmt=$this->conn->query($sql);
        return $stmt;
    }  
}
?>