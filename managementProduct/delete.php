<?php 
$username=!empty($_POST["username"]) ? $_POST["username"] : "";
$status=!empty($_POST["status"]) ? $_POST["status"] : "";
$index=!empty($_POST["index"]) ? $_POST["index"] : "";
include"../queryMysqli/import.php";
if(deleteTableHangHoa($_POST["mahang"])){
    header("location: ../index.php?index=$index&status=$status&username=$username");
}
else{
    echo "xóa không thành công";
}
?>