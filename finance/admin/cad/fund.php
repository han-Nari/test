<?php 
	include "../includes/finance_db_connect.php";
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
	<title>LGU's Allocated Fund</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="\test\finance\img\logo.png">
	
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	
	<!-- ==== Icon ==== -->
	<script src="https://kit.fontawesome.com/9fd2f42e98.js" crossorigin="anonymous"></script>

	<!-- ==== Css Link ==== -->
	<style>
		<?php include "../dashboard/dash.css"; ?>
		<?php include "fund.css"; ?>
	</style>
</head>
<body>
	<main>
	<?php include "../dashboard/side.php"; ?>

	<!-- Header -->
	<?php include "../dashboard/header.php";?>

	<!-- Main content -->
		<section>
			<div class="container">
				<div class="box">
					<div class="top">
						<h3 class="title">O.R No.:</h3>
						<h3 class="title">Brngy:</h3>
						<h3 class="title">Date:</h3>
					</div>

					<div class="bottom">
						<p>Total annual fund for brgy. 176 with the amount of 200,000 Pesos given by the local government.</p>

						<p>Total: 200,000</p>
					</div>
				</div>
			</div>	
		</section>
	</main>
	<script>
		<?php include "../dashboard/dash.js" ?>
	</script>
</body>
</html>



	
