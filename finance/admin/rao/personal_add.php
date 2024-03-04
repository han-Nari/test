<?php 
	include "../includes/finance_db_connect.php";
	include "../includes/session.php";
	include "save_personal.php";
		
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
	<title>Dashboard</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="\test\finance\img\logo.png">

	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	
	<!-- ==== Icon ==== -->
	<script src="https://kit.fontawesome.com/9fd2f42e98.js" crossorigin="anonymous"></script>

	<!-- ==== Css Link ==== -->
	<style>
		<?php include "../dashboard/dash.css"; ?>
		<?php include "../coa/table.css"; ?>
		<?php include "main.css"; ?>
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
		<div class="add_data">
			<span class="title">Personal Services</span>
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">	
				<div class="box pwd">
					<i class="fa-solid fa-user"></i>
					<input type="text" name="role" placeholder="Role">
				</div>

				<span class="errors">
					<?php echo $errors["role"]; ?>
				</span>

				<div class="box pwd">
					<i class="fa-solid fa-coins"></i>
					<input type="text" name="app" placeholder="Appropriation">
				</div>

				<span class="errors">
					<?php echo $errors["app"]; ?>
				</span>

				<div class="box">
					<input class="btn" type="submit" name="submit" value="Submit">
				</div>

				<div class="back">
					<p>Back to <a id="back" href="personal.php">Personal Services</a></p>
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



	