<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section id="about" class="three" style="min-height:683px;">
						<div class="container">

							<header>
								<h2>User List</h2>
							</header>
						<?php
						$sql="select * from user";
						$result=mysqli_query($conn,$sql);
						?>
						<table cellpadding="10" cellspacing="0" border="1"> 
							<tr><th>User name</th>
								<th>Password</th>
								<th>Delete user</th></tr>
								<?php if(mysqli_num_rows($result)>0) {
									while($rows=mysqli_fetch_array($result)){
									?>
									<tr>
										<td><a href="management_user/update.php?user=<?php echo $rows["user"] ?>"><?php echo $rows["user"] ?></a></td>
										<td><?php echo $rows["pass"] ?></td>
										<td><form action="management_user/delete.php" method="post">
        								<input type="hidden" name="user" value="<?php echo $rows["user"]; ?>">
       									 <input onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?');" type="submit" value="Delete">
      							  </form></td>
									</tr>
									<?php } }?>
										</table>
							

						</div>
					</section>
</body>
</html>