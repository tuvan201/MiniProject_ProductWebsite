<?php 
$username=$_POST["username"];
$maloai=$_POST["maloai"];
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $_SESSION["Mahang"][]=$_POST["mahang"];
}
else{
    $_SESSION["Mahang"][]=$_POST["mahang"];
}
var_dump($_SESSION["Mahang"]);
header("location: ../index.php?username=$username&status=true&index=2&maloai=$maloai");
?>