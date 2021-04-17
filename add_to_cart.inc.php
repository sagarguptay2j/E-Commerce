<?php
class add_to_cart{
    function addproduct($pid,$qty){
        $_SESSION['cart'][$pid]['qty']=$qty;
    }
    function updateproduct($pid,$qty){
        if(isset( $_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid]['qty']=$qty;
        }
    }
    function removeproduct($pid){
        if(isset( $_SESSION['cart'][$pid])){
          unset($_SESSION['cart'][$pid]);
        }

    }
    function emptyproduct(){
        unset($_SESSION['cart']);
    }

    function totalproduct(){
        if(isset( $_SESSION['cart'])){
            return count($_SESSION['cart']);
          }else{
              return 0;
          }
       
    }
}
?>