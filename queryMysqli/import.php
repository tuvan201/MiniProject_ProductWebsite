<?php 
// $server="localhost";
// $user='mysqli';
// $password='211001';
// $database_name='mysqli';
//kết nối dữ liệu
$conn=mysqli_connect("localhost",'mysqli','211001','mysqli');
function connectDatabase()
{
    $conn=mysqli_connect("localhost",'mysqli','211001','mysqli');
    return $conn;   
}
function insertTableUser($user,$pass){

    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM user WHERE user='$user'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0)
    {
     $sql= "INSERT INTO `user`(`user`, `pass`) VALUES ('$user','$pass')";
     mysqli_query($conn,$sql);
     $bool=true;
    }
    
    return $bool;
}
function updateTableUser($user,$pass){

    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM user WHERE user='$user'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $sql="UPDATE `user` SET `user`='$user',`pass`='$pass' WHERE user = '$user'";
        mysqli_query($conn,$sql);
        $bool=true;
    }
    return $bool;

}
function deleteTableUser($user){
    
    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM user WHERE user='$user'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $sql="DELETE FROM `user` WHERE user='$user'";
        mysqli_query($conn,$sql);
        $bool=true;
    }
    return $bool;
}
function selectAccountFromUser($user,$pass){
    
    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM user WHERE user='$user' and pass ='$pass'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        
        $row=mysqli_fetch_array($result);
        return $row;
        exit();
    }
    return $bool;
}

function insertTableHangHoa($mahang,$tenhang,$dongia,$soluong,$dvt,$hinhanh){

    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM hanghoa WHERE Mahang='$mahang'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0)
    {
     $sql= "INSERT INTO `hanghoa`(`Mahang`, `Tenhang`, `Dongia`, `Soluong`, `DVT`, `Anh`)
      VALUES ('$mahang','$tenhang','$dongia','$soluong','$dvt','$hinhanh')";
     mysqli_query($conn,$sql);
     $bool=true;
    }
    
    return $bool;
}
function updateTableHangHoa($mahang,$tenhang,$dongia,$soluong,$dvt,$hinhanh){

    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM hanghoa WHERE Mahang=$mahang";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $sql="UPDATE `hanghoa` SET `Mahang`='$mahang',`Tenhang`='$tenhang',`Dongia`='$dongia',`Soluong`='$soluong',`DVT`='$dvt',`Anh`='$hinhanh' WHERE Mahang = '$mahang'";
        mysqli_query($conn,$sql);
        $bool=true;
    }
    return $bool;

}
function deleteTableHangHoa($mahang){
    
    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM hanghoa WHERE Mahang=$mahang";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $sql="DELETE FROM `hanghoa` WHERE mahang='$mahang'";
        mysqli_query($conn,$sql);
        $bool=true;
    }
    return $bool;
}
function selectByIdFromHangHoa($mahang){
    
    $bool=false;
    $conn=connectDatabase();
    $sql="SELECT * FROM hanghoa WHERE Mahang='$mahang'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        
        $row=mysqli_fetch_array($result);
        return $row;
        exit();
    }
    return $bool;
}
?>