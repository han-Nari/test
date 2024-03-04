<?php 
	include '../admin/includes/finance_db_connect.php';
	include '../admin/includes/session.php';
	include 'admin_logs.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>

	<!-- ==== Icon ==== -->
	<script src="https://kit.fontawesome.com/9fd2f42e98.js" crossorigin="anonymous"></script>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="\test\finance\img\logo.png">

	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<style>
		<?php include "admin_login.css"; ?>
	</style>
</head>
<body>
	<section class="center">
		<div class="login">
			<span class="title">Login</span>
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">	
				<div class="box">
					<i class="fa-solid fa-user"></i>
					<input type="text" name="username" placeholder="Username">
				</div>
				<span class="errors">
					<?php echo $errors["username"]; ?>
				</span>
				<div class="box">
					<i class="fa-solid fa-lock"></i>
					<input type="password" name="password" id="show" placeholder="Password">
				</div>
				<span class="errors">
					<?php echo $errors["password"]; ?>
				</span>
				
				<div class="show">
					<label class="check">
						<input type="checkbox" onclick="myFunction()">Show Password
					</label>
				</div>
				<div class="remember">
					<label for="check" class="check">
						<input type="checkbox" name="checkbox" id="check">Remember me
					</label>
					<a href="#" class="bg">Forgot password?</a>
				</div>
				<input class="btn" type="submit" name="login" value="Login">
			</form>
		</div>
	</section>

	<script>
		function myFunction() {
	      var x = document.getElementById("show");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		}
	</script>
</body>
</html>
