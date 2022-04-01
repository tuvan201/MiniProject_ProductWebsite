<html>
<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Hi! I'm a <strong>student,</strong> this is my small project about a website to <strong>manage product information</strong> .</h2>
								<p>Since it's just a demo, I'll make it short</p>
							</header>

							<footer>
								 <a href="?index=2&username=<?php echo $username; ?><?php if(isset($_GET["status"])){
									if($_GET["status"]=="true") { echo "&status=true"; } else { echo "&status=false"; } } else { echo "&status=false"; } ?>" class="button scrolly">Let's go</a> 
							</footer>

						</div>
					</section>
</html>