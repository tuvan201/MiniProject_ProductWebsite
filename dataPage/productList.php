<?php 
$username=!empty($_GET["username"]) ? $_GET["username"] : "";
$status=!empty($_GET["status"]) ? $_GET["status"] : "";
$index=!empty($_GET["index"]) ? $_GET["index"] : "";
$select_all="";
$tenhang="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- sự kiện thêm hàng hóa, hiển thị tất cả hàng hóa khi đang tìm hàng hóa -->
<div style="margin:20px 0px 0px 23px;">
<form action="" method="get">
						<input type="hidden" name="username" value="<?php echo $username ?>">
						<input type="hidden" name="index" value="<?php echo $index ?>">
						<input type="hidden" name="status" value="<?php echo $status ?>">
						<strong><button style="padding: 10px 20px;font-size: 18px;" name='btnInserProduct' value="InserProduct" type="submit"><strong>INSERT PRODUCT</strong></button>
						</form>
<?php 
        //nếu người dùng nhập hàng hóa cần tìm và ấn tìm
        if(isset($_POST["submit_sreach"]) and !empty($_POST["sreach_item"]))
            {
                $select_all="SHOW ALL PRODUCTS";
                $tenhang=$_POST["sreach_item"];
                $result_countItem = mysqli_query($conn, "SELECT count(Mahang) as total FROM hanghoa WHERE Tenhang='$tenhang' or Tenhang LIKE'$tenhang%' or Tenhang LIKE '%$tenhang'");
                $row = mysqli_fetch_array($result_countItem);
                $total_records = $row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
         
                // tổng số trang
                $total_page = ceil($total_records / $limit);
         
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
         
                // Tìm Start
                $start = ($current_page - 1) * $limit;
                $sql_query="SELECT * FROM hanghoa WHERE Tenhang LIKE'$tenhang%' or Tenhang LIKE '%$tenhang' ORDER BY Mahang ASC LIMIT $start, $limit";
                $result=mysqli_query($conn,$sql_query);
            }
            else{
                $result_countItem = mysqli_query($conn, 'select count(Mahang) as total from hanghoa');
                $row = mysqli_fetch_array($result_countItem);
                $total_records = $row['total'];
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 5;
         
                // tổng số trang
                $total_page = ceil($total_records / $limit);
         
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
         
                // Tìm Start
                $start = ($current_page - 1) * $limit;
                $result = mysqli_query($conn, "SELECT * FROM hanghoa  ORDER BY Mahang ASC LIMIT $start, $limit");
            }
 
        ?>
        <?php
// chỉ hiện khi đang tìm hàng hóa
if(isset($_POST["submit_sreach"]) && !empty($_POST["sreach_item"])){
    echo "<br><button style='padding: 10px 20px;font-size: 18px;' name='btnShowAllProduct'><strong><a href=''>$select_all</a></strong></button>";
}
?>  
</div>
<div style="margin:0 20px;min-height:680px">
<table border="1px" cellpadding="10" cellspacing="0" id="productList">
    <caption><h2>List Product</h2></caption>
    <tr>
        <form action="" method="post">
        <th colspan="2">Sreach:</th>
        <th colspan="4"><input style="padding-left:10px;border-radius:15px;" type="text" name="sreach_item" id="" placeholder="Search product" value="<?php echo $tenhang; ?>"></th>
        <th colspan="2"><input type="submit" name="submit_sreach" value="Sreach"></th>
        </form>
    </tr>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Unit</th>
        <th>Classify</th>
        <th>Image</th>
        <th>Delete Row</th>
    </tr>
    <?php
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))//trả về 1 dòng của kết quả trả về từ biến $result bằng dạng mảng
    { ?>
         <tr>
        <td><?php echo $row[0]?></td>
        <td><a href="?mahang=<?php echo $row[0]?><?php echo"&index=$index&status=$status&username=$username"; ?>" name="updateProduct"><?php echo $row[1] ?></a></td>
        <td><?php echo $row[2]?></td>
        <td><?php echo $row[3]?></td>
        <td><?php echo $row[4]?></td>
        <td><?php echo $row[5]?></td>
        <td><?php
        if($row[6]=="chưa có")
        {
            echo $row[6];
        }
        else { ?>
            <img src="<?php echo"upload_img/$row[6]"; ?>" width="50px" height="50px" alt="" srcset="">
        <?php } ?>
        </td>
        <td><form action="managementProduct/delete.php" method="post">
        <input type="hidden" name="username" value="<?php echo $username ?>">
		<input type="hidden" name="index" value="<?php echo $index ?>">
		<input type="hidden" name="status" value="<?php echo $status ?>">
        <input type="hidden" name="mahang" value="<?php echo $row[0]; ?>">
        <input onclick="return confirm('Bạn có chắc muốn xóa mặt hàng này không?');" type="submit" value="Delete">
        </form></td>
        </tr>
    <?php }
    include"managementProduct/paging.php";
}
    elseif(mysqli_num_rows($result)==0 and !empty($tenhang))
    {echo "Không có mặt hàng mà bạn đang tìm kiếm";}
    else
    {echo "Bảng hàng hóa hiện chưa có dữ liệu";}
?>
</table>
</div>
</body>
</html>