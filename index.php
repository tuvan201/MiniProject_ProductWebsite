<?php 
include_once"queryMysqli/import.php";
$status=!empty($_GET["status"]) ? $_GET["status"] : ""; //check login session
$index =!empty($_GET["index"]) ? $_GET["index"] : "1";	//navigation
$username=!empty($_GET["username"]) ? $_GET["username"] : ""; 
$maloai="";
if(!empty($_GET["maloai"]))
{
    $maloai="&maloai=".$_GET["maloai"];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Product form Văn Tú</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<div id="header">

				<div class="top">
					<?php if(empty($status) || $_GET["status"]=="false") {  ?> <a href="?login=need&login_status=coming" class="login_signup" name="aLogin" style="margin-left:35px;">Login/</a><a href="?signup=need&login_status=coming" class="login_signup" name="aSignup">Sign up</a> <?php } 
					 elseif($_GET["status"]=="true" || $status =="true") { ?> <a href="index.php?login_status=coming" class="login_signup" style="margin-left:35px;" >Log Out</a> <?php } ?>
					<p></p>
					<!-- Logo -->
					<?php if(isset($_GET["status"])) {
						if($_GET["status"]=="true") { ?>
						<div id="logo">
							<span class="image avatar48"><img src="images/ava.jpg" alt="" /></span>
							<h1 id="title"><?php echo $username?></h1>
							<p></p>
						</div>
						<?php } } ?>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="?index=1&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } } else { echo "&status=false"; } ?>" id="top-link"><span class="icon solid fa-home">Intro</span></a></li>
								<li><a href="?index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" id="portfolio-link"><span class="icon solid fa-star">Recommend Product</span></a></li>
								<li><a href="?index=3&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" id="portfolio-link"><span class="icon solid fa-th">Product</span></a></li>
							<?php if($username=="admin") { ?>	<li><a href="?index=4&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" id="about-link"><span class="icon solid fa-user">User management</span></a></li> <?php } ?>
								<li><a href="?index=5&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" id="contact-link"><span class="icon solid fa-envelope">Contact</span></a></li>
								<li><a href="dataPage/cart.php?index=6<?php echo $maloai ?>&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } }  else { echo "&status=false"; } ?>" id="contact-link"><span class="icon solid fa-cart-plus">Cart</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="https://www.instagram.com/nguyenvantu2110/" class="icon brands fa-instagram"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/nguyen.vantu2110/" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://github.com/tuvan201" class="icon brands fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
				<?php if(isset($_GET["login"])||isset($_GET["signup"]))
				{ 
				include_once"dataPage/formLogin_Signup.php";
				 }
				elseif(!isset($_GET["index"]) || $index ==1){ 
				include_once"dataPage/intro.php";
			} ?>

				<!-- Portfolio -->
				<?php if(isset($_GET["index"])) { 
					if($_GET["index"]==2 and $status=="true") {	
						include_once"dataPage/productRecommendation.php";
					 } } ?>
				<!-- list product -->
				<?php if(isset($_GET["index"])) { 
					if($_GET["index"]==3 and $status=="true") {	 ?>
					  <?php 
					  if(!empty($_GET["btnInserProduct"])){
						  include"managementProduct/insertItem.php";
						}
					  elseif(!empty($_GET["mahang"])){
						include"managementProduct/update.php";
						} 
					else{
						include"dataPage/productList.php";
					}
					 } } ?>
				<!-- User Management -->
				<?php if(isset($_GET["index"])) { 
					if($_GET["index"]==4 and $status=="true") {
					$_SESSION["lastIndex"][]=4;
					include_once"dataPage/userManagement.php";
					 } } ?>
				<!-- Contact -->
				<?php if(isset($_GET["index"])) { 
					if($_GET["index"]==5 and $status=="true") {
					$_SESSION["lastIndex"][]=5;
					include_once"dataPage/contact.php";
					 } } ?>		 
			</div>
			<?php if($status=="false" || empty($_GET["status"]) || $status="" and empty($_GET["login_status"]) and $index !=1) { echo "<h2 style='height:680px;margin:50px 49%;min-width:330px'>You need to<a href ='?login=need'><strong id='need_login_hover'> login</strong></a></h2>"; } elseif ($index==1 || empty($index)) {
				echo "";
			} ?>
		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Website product management.</li><li>Design: <a href="https://www.facebook.com/nguyen.vantu2110/">Nguyễn Văn Tú 202090449</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<div id="headerToggle"><a href="#header" class="toggle"></a></div>
	</body>
</html>