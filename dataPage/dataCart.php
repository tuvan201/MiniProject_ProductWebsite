<?php 
function returnNum_appear(){
   global $num_appear;
   return $num_appear;
}
function num_appear($mahang){
    $arr=returnNum_appear();
    $result=1;
    foreach ($arr as $key => $value) {
        if($mahang ==$key)
        {
            $result=$value;
        }
}
return $result;
} 
$err=array();
$total=$final_total=$purchase_status=0;
$username=!empty($_GET["username"]) ? $_GET["username"] : "";
$status=!empty($_GET["status"]) ? $_GET["status"] : "";
$maloai=!empty($_GET["maloai"]) ? $_GET["maloai"] : "";
$index=!empty($_GET["index"]) ? $_GET["index"] : "";
?>
  <?php
  if(isset($_POST["paybtn"]))
  {
  $cardNum=!empty($_POST["CardNumber"]) ? $_POST["CardNumber"] : "";
  $cardHol=!empty($_POST["CardHolder"]) ? $_POST["CardHolder"] : "";
  $expi=!empty($_POST["Expires"]) ? $_POST["Expires"] : "";
  $cvc=!empty($_POST["CVC"]) ? $_POST["CVC"] : "";
  if(empty($cardNum))
  {
    $err["cardNum"]="Please enter the CardNumber !";
  }
  if(empty($cardHol))
  {
    $err["cardHol"]="Please enter the CardHolder !";
  }
  if(empty($expi))
  {
    $err["expi"]="Please enter the Expires !";
  }
  if(empty($cvc))
  {
    $err["cvc"]="Please enter the CVC !";
  }    
  $CartShopping=returnNum_appear();
  if(empty($CartShopping))
  {
    $err["amount"]="Dont have any product in your cart";
  }   
  if(count($err)==0)
  {
    $purchase_status=1;
  }
  }
  ?>
<html>
<div class='container'>
    <div class='window'>
    <?php if(empty($_GET["purchase_status"])) { ?>
      <div class='order-info'>
        <?php if(mysqli_num_rows($result)==0) { ?>
          <h3 style="text-align:center;margin-top:125px;">Dont have any product in your cart, click <a href="../index.php?<?php echo"username=$username&status=$status&index=2"; ?>" style="color:black;">here</a>
          to buy products</h3>
          <?php } else { ?>
        <div class='order-info-content'>
          <h2>Order Summary</h2>
                  <div class='line'></div>
                  <?php while($row=mysqli_fetch_array($result)) { $amount=num_appear($row["Mahang"]) ?>
          <table class='order-table'>
            <tbody>
              <tr>
                <td><img src='../upload_img/<?php echo $row["Anh"] ?>' class='full-width'></img>
                </td>
                <td>
                  <br> <span class='thin'><?php echo $row["Tenhang"] ?> x <?php echo $amount  ?> </span>
                  <span style="float:right;"><a href="../managementProduct/deleteItemInCart.php?mahang=<?php echo $row[0] ?>&index=6&maloai=<?php echo !empty($_GET["maloai"]) ? $_GET["maloai"] : ""; ?>&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>"
                   style="background-color:red;border:1px solid red;border-radius:50%;color:white;padding:0px 7px;line-height:20px;padding-bottom:2px;text-decoration:none;"  onclick="return confirm('Bạn có chắc muốn xóa mặt hàng này không?');" >x</a></span>
                  <br> product type: <?php echo $row["Maloai"] ?><br> <span class='thin small'> Color: Grey/Orange, Size: <?php echo $row["Soluong"] ?><br><br></span>
                </td>
  
              </tr>
              <tr>
                <td>
                  <div class='price'>$<?php  echo $Price =$row["Dongia"]*$amount  ?></div>
                </td>
              </tr>
            </tbody>
  
          </table>
          <div class='line'></div>
          <?php
        $total+=$Price;
        } ?>
          <div class='total'>
            <span style='float:left;'>
              <div class='thin dense'>VAT 10%</div>
              <div class='thin dense'>Delivery</div>
              TOTAL
            </span>
            <span style='float:right; text-align:right;padding-bottom:15px;'>
              <div class='thin dense'>$<?php echo $VAT=$total/10; ?></div>
              <div class='thin dense'>$4.95</div>
              $<?php echo $final_total=$total+4.95+$VAT; ?>
            </span>
          </div>
  </div>
  <?php } ?>
  </div>
          <div class='credit-info'>
            <div class='credit-info-content'>
              <table class='half-input-table'>
                <tr><td>Please select your card: </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                  <div class='dropdown-select'>
                  <ul>
                    <li>Master Card</li>
                    <li>American Express</li>
                    </ul></div>
                  </div>
                 </td></tr>
              </table>
              <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
              Card Number
              <form action="" method="post">
              <input class='input-field' name="CardNumber" type="text">
              Card Holder
              <input class='input-field' name="CardHolder" type="text">
              <table class='half-input-table'>
                <tr>
                  <td> Expires
                    <input class='input-field' name="Expires" type ="text">
                  </td>
                  <td>CVC
                    <input class='input-field' name="CVC" type ="text">
                  </td>
                </tr>
              </table>
              <div style="height:10px;"></div>
              <table class='half-input-table'>
        <tr>
          <th colpan="2"><p style="color:red"><?php echo !empty($err)? "invalid !" : "" ?></p></th>
        </tr>
              </table>
              <input type="submit" class='pay-btn' name="paybtn" value="Checkout">
            </form>
            </div>
  
          </div>
          <?php } else{ ?>
            <div style="width:100%"><h1 style="width:100%;text-align:center;height:80px;margin-top:75px;color:green;">DONE !</h1>
            <div style="width:100%;display:flex;justify-content:space-evenly">
                <button class="btnHover" style="padding:10px 15px;border:1px solid black;border-radius:12px"><a style="text-decoration:none;font-size:19px;"
                 href="../index.php?index=2&username=<?php echo $username ?>&status=true">CONTINUE SHOPPING</a></button>
                 <button  class="btnHover" style="padding:10px 15px;border:1px solid black;border-radius:12px"><a style="text-decoration:none;font-size:19px;"
                 href="../index.php?index=1&username=<?php echo $username ?>&status=true">HOME</a></button>
          </div></div>
            <?php } ?>
        </div>
  </div>
</html>
<?php 
  if($purchase_status==1)
  {
    header("location:?username=$username&status=$status&index=6&purchase_status=true");
  }
?>