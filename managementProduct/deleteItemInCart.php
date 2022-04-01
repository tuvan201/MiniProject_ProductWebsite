<?php 
session_start();
//lấy tất cả danh sách
function getAllItems(){
    return isset($_SESSION["Mahang"]) ? $_SESSION["Mahang"] : array("#");
}
function deleteItem($Mahang)
{

    $ListProduct = getAllItems();
     
    foreach ($ListProduct as $key => $item)
    {
        // Đã tìm thấy thì dùng hàm unset để xóa
        if ($item == $Mahang){
            unset($ListProduct[$key]);
        }
    }
     
    // Cập nhật lại Session
    $_SESSION["Mahang"] = $ListProduct;
     
    return $ListProduct;
}
deleteItem($_GET["mahang"]);
$username=$_GET['username'];
$maloai="";
if(!empty($_GET["maloai"]))
{
    $maloai="&maloai=".$_GET["maloai"];
}
header("location: ../dataPage/cart.php?index=6&status=true&username=$username$maloai");
?>