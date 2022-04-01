<?php 
include_once"../queryMysqli/import.php";
if(isset($_POST["hidden_login"]))
{
$user=$_POST["txtuse"];
$pass=$_POST["txtpass"];
$result=selectAccountFromUser($user,$pass);
if(selectAccountFromUser($user,$pass)){
    header("location: ../index.php?status=true&username=$result[0]");
}
else{
    header("location: ../index.php?status=false&login=need");
}
}
elseif(isset($_POST["hidden_sign_up"])){
    $user=$_POST["txtuse"];
    $pass=$_POST["txtpass"];
    if(insertTableUser($user,$pass)){
    $result=selectAccountFromUser($user,$pass);
     header("location: ../index.php?status=true&username=$result[0]");
        }
    else{
      header("location: ../index.php?status=false&signup=need");
    }
}
?>