<?php 
$result="";
$nameCustomer=!empty($_POST["name"]) ? $_POST["name"] : "";
$emailCustomer=!empty($_POST["email"]) ? $_POST["email"] : "";
$feedBack=!empty($_POST["message"]) ? $_POST["message"] : "";
$userName=!empty($_POST["username"]) ? $_POST["username"] : "";
function insertTablefeedBack($nameCustomer,$emailCustomer,$feedBack){
    $conn=mysqli_connect("localhost",'mysqli','211001','mysqli');
    $bool =false;
    if(!empty($nameCustomer) and !empty($emailCustomer) and !empty($feedBack)){
        $sql="INSERT INTO `cutomer feedback`( `name`, `email`, `feedback`) VALUES ('$nameCustomer','$emailCustomer','$feedBack')";
        mysqli_query($conn,$sql);
        $bool=true;
    }
    return $bool;
}
//VALIDATE EMAIL
if(!empty($_POST["email"])){
    $result=filter_var($emailCustomer,FILTER_VALIDATE_EMAIL);
    if($result===false){
        header("location: ../index.php?index=5&status=true&feedback_status=false&username=$userName&error=valid");
        exit();
    }
}
if(insertTablefeedBack($nameCustomer,$emailCustomer,$feedBack)){
    header("location: ../index.php?index=5&status=true&feedback_status=true&username=$userName");
}
else{
header("location: ../index.php?index=5&status=true&feedback_status=false&username=$userName");
}
?>