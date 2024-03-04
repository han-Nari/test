<?php 
	include "../includes/finance_db_connect.php";
	include "../includes/session.php";
	include "edit_admin.php";
		
	$admin_id = $_SESSION['admin_id'];

	if(!isset($admin_id)){
	   header('location:../Dashboard/dash.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Admin</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="../img/logo.png">

	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	
	<!-- ==== Icon ==== -->
	<script src="https://kit.fontawesome.com/9fd2f42e98.js" crossorigin="anonymous"></script>

	<!-- ==== Css Link ==== -->
	<style>
		<?php include "../dashboard/dash.css"; ?>
		<?php include "admins.css"; ?>
		<?php include "add_admin.css"; ?>
	</style>
</head>
<body>
	<main>
	<!-- Sidebar -->
	<?php include "../dashboard/side.php";?>

	<!-- Header -->
	<?php include "../dashboard/header.php";?>

	<!-- Main content -->
		<section class="center">
			<div class="add_admin">
				<span class="title">Edit Admin</span>
				<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype=multipart/form-data>	
					<div class="box username">
						<i class="fa-solid fa-user"></i>
						<input type="text" name="username" placeholder="Username" value="<?php echo $results["username"]; ?>">
					</div>

					<span class="errors">
						<?php echo $errors["username"]; ?>
					</span>

					<div class="box pwd">
						<i class="fa-solid fa-key"></i>
						<input type="password" name="password" placeholder="Password" value="<?php echo $results["password"]; ?>">
					</div>

					<span class="errors">
						<?php echo $errors["password"]; ?>
					</span>

					<div class="box pwd">
						<i class="fa-solid fa-key"></i>
						<input type="password" name="passwordCon" placeholder="Password repeat" value="<?php echo $results["password"]; ?>">
					</div>

						<span class="errors">
						<?php echo $errors["password"]; ?>
					</span>

					<div class="box email">
						<i class="fa-solid fa-envelope"></i>
						<input type="email" name="email" placeholder="Email" value="<?php echo $results["email"]; ?>">
					</div>

					<span class="errors">
						<?php echo $errors["email"]; ?>
					</span>

         		   <div class="block">
         		   	 <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         		     <img class="avatar" src="../uploads/<?php echo $results["image_profile"] ?>">
         		   </div>

         		    <span class="errors">
						<?php echo $errors["img"]; ?>
					</span>
					
					<div class="box">
						<input class="btn" type="submit" name="update" value="Save">
					</div>
					<div class="back">
						<p>Back to <a id="back" href="admins.php">Admin</a></p>
					</div>
				</form>
			</div>	
		</section>
	</main>
	<script>
		<?php include "../dashboard/dash.js"; ?>
	</script>
</body>
</html>



	