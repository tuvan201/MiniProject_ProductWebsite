<?php
include"../queryMysqli/import.php";
if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
 $listOfProducts=!empty($_SESSION["Mahang"]) ? $_SESSION["Mahang"] : array("#") ;
 $num_appear=array_count_values($listOfProducts);//đếm số lượng của 1 sản phẩm mà người dùng mua 
 $str1="'";
 //gán nháy để phục vụ cho việc select;
foreach ($num_appear as $key => $value) {
         $listOfProductsForSelect[]=$str1.$key.$str1;
 }
 //kiểm tra
 $listOfProductsForSelect=implode(",",$listOfProductsForSelect);
 $result=mysqli_query($conn,"select * from hanghoa where Mahang in ($listOfProductsForSelect)");
?>