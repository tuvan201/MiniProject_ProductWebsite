<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="login_container">
				<?php echo isset($_GET["login"])? "<h2>LOGIN</H2>":"<H2>SIGN UP</H2>" ?>
				<form action="management_user/login_signup.php" method="post">
				<div class="col-6 col-12-mobile">User:<input type="text" name="txtuse" id="" class="input_login_signup" style="float:left"></div>
				<div class="col-6 col-12-mobile">Password:<input type="password" name="txtpass" class="input_login_signup" style="float:left"></div>
					<div class="col-12">
						<?php if(isset($_GET["login"])){ ?>
										<input type="hidden" name="hidden_login" value="selected">
										<a href="#" style="font-size:18px;border:none;">Forgot password?</a>
										<input style="margin:20px 35%;" type="submit" value="Login" />
										<?php } if(isset($_GET["signup"])) { ?>
											<input type="hidden" name="hidden_sign_up" value="selected">
											<input style="margin:20px 35%;" type="submit" value="Sign up" />	
											<?php } ?>
									</div>
									<p style="color:red;"><?php if(isset($_GET["status"]) and $_GET["status"]=="false") { if(!empty($_GET["login"])) {
											echo "Wrong account or password !";
									}
									elseif (!empty($_GET["signup"])) {
										echo "Username already exists !";
									}
									} ?></p>
				</form>
				</div>
</body>
</html>