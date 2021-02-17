<?php

class Cart{
    public $cart_contents=array();

    public function __construct(){
        $this->cart_contents = isset($_SESSION['cart_contents'])? $_SESSION['cart_contents']:NULL;
    }

    public function insert($item=array()){
        $id=intval($item['id']);
        $old_qty=0;
        if($this->cart_contents!=NULL){
            foreach($this->cart_contents as $key=>$arr){
                if($arr['id']==$id){
                    $old_qty=$arr['quantity'];
                    unset($this->cart_contents[$key]);
                }
            }   
        }
        $item['quantity']+=$old_qty;
        $this->cart_contents[]=$item;
        

        $_SESSION['cart_contents']=$this->cart_contents;

        return TRUE;

    }

    public function remove($id){
        foreach($this->cart_contents as $key=>$arr){
            if($arr['id']==$id){
                unset($this->cart_contents[$key]);
            }
        }
        $_SESSION['cart_contents']=$this->cart_contents;

        return TRUE;
    }

    public function updateQty($id,$qty){
            echo "updateqty-be vagyunk";
        foreach($this->cart_contents as $key=>&$arr){
            if($arr['id']==intval($id)){
                $arr['quantity']=intval($qty);
               
            }
        }
        $_SESSION['cart_contents']=$this->cart_contents;
        return TRUE;
    }
}
?>