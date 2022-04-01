<?php
include_once"../queryMysqli/import.php";
$user=$_POST['user'];
if(deleteTableUser($_POST["user"])){
    header("location: ../index.php?index=4&status=true&username=$user");   
}
?>