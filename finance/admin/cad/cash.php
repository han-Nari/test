<?php 
	include "../includes/finance_db_connect.php";;
	include "../includes/session.php";

		
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
	<title>Cash Books</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="\test\finance\img\logo.png">
	
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	
	<!-- ==== Icon ==== -->
	<script src="https://kit.fontawesome.com/9fd2f42e98.js" crossorigin="anonymous"></script>

	<!-- ==== Css Link ==== -->
	<style>
		<?php include "../dashboard/dash.css"; ?>
		<?php include "cash.css"; ?>
	</style>
</head>
<body>
	<main>
	<?php include "../dashboard/side.php"; ?>

	<!-- Header -->
	<?php include "../dashboard/header.php";?>
	<!-- Main content -->
		<section>
			<h1 class="title pad">Cash Books</h1>
			<div class="grid">
				<div class="fund">
					<a class="bg-color one" href="fund.php">LGU's Allocated Fund</a>
				</div>
				<div class="fees">
					<a class="bg-color twos" href="../">Barangay Fees and Taxes</a>
				</div>
				<div class="charges">
					<a class="bg-color three" href="../">Other Fees and Charges</a>
				</div>
			</div>
		</section>
	</main>
	<script>
		<?php include "../dashboard/dash.js" ?>
	</script>
</body>
</html>



	
