<?php
$maloai=!empty($_GET["maloai"]) ? $_GET["maloai"] : "";
$result=mysqli_query($conn,"select * from hanghoa where Maloai='$maloai'");
?>
<html>
    <section id="portfolio" class="two"  style="min-height:683px;">
        <div class="container">

            <header>
                <h2><?php echo empty($_GET["maloai"]) ? "Product Recommendation" : "Product Type" ?></h2>
            </header>

            <p>Here are some of the featured products we recommend and recommend to you.
            Hope the products here match your taste.</p>

            <div class="row">
                <?php if(empty($_GET["maloai"])) { ?>
                <div class="col-4 col-12-mobile">
                    <article class="item">
                        <a href="?maloai=cushion&index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" class="image fit"><img src="images/img02.jpg" alt="" /></a>
                        <header>
                            <h3>Sofa cushion</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="?maloai=highclass&index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" class="image fit"><img src="images/img03.jpg" alt="" /></a>
                        <header>
                            <h3>Sofa high-class</h3>
                        </header>
                    </article>
                </div>
                <div class="col-4 col-12-mobile">
                    <article class="item">
                        <a href="?maloai=luxury&index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" class="image fit"><img src="images/img04.jpg" alt="" /></a>
                        <header>
                            <h3>Sofa Luxyry</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="?maloai=classic&index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" class="image fit"><img src="images/img05.jpg" alt="" /></a>
                        <header>
                            <h3>Sofa classic</h3>
                        </header>
                    </article>
                </div>
                <div class="col-4 col-12-mobile">
                    <article class="item">
                        <a href="?maloai=family&index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" class="image fit"><img src="images/img06.jpg" alt="" /></a>
                        <header>
                            <h3>Sofa family</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="?maloai=modern&index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" class="image fit"><img src="images/img07.jpg" alt="" /></a>
                        <header>
                            <h3>Sofa modern</h3>
                        </header>
                    </article>
                </div>
                <!-- BACK -->
                <?php }
                if(!empty($maloai)) { ?>
                <a style="border:none" href="?index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>">BACK</a>
                <?php } ?>
                <div style="display:flex;flex-warp:warp;justify-content:center;width:100%;">
                    <?php 
                    if(mysqli_num_rows($result)>0) ?>
                    <?php
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                             <article class="item">
                                <a href="" class="image fit"><img src="upload_img/<?php echo $row[6] ?>" alt="ảnh sofa" style="width:200px;height:180px"></a>
                                <header>
                                  <h3 style="font-weight:500;">Name: <?php echo $row[1] ?></h3>
                                  <h3 style="font-weight:500;">Type: <?php echo $row[5] ?></h3>
                                  <h3 style="font-weight:500;">Price: <?php echo $row[2]."$" ?></h3>
                                  <form action="managementProduct/buyItem.php" method="POST">
                                  <input type="hidden" name="username" value="<?php echo $username ?>">
                                  <input type="hidden" name="maloai" value="<?php echo $maloai; ?>">
                                  <input type="hidden" name="mahang" value="<?php echo $row[0] ?>"> 
                                  <h3 style="font-weight:500;"><button style="padding:5px 12px;" type="submit" name="buyItem">ADD TO CART</button></h3>
                                  </form>
                                </header>
                             </article>  
                             <div style="width:20px"></div>
                        <?php
                         }
                ?>
                </div>  
            </div>

        </div>
    </section>
</html>