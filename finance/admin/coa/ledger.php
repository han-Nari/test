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
	<title>Ledger</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="\test\finance\img\logo.png">
	
	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	
	<!-- ==== Icon ==== -->
	<script src="https://kit.fontawesome.com/9fd2f42e98.js" crossorigin="anonymous"></script>

	<!-- ==== Css Link ==== -->
	<style>
		<?php include "../dashboard/dash.css"; ?>
		<?php include "table.css"; ?>
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
				<div class="auto">
					<table>
						<caption>
							<div class="top">
								<h1 class="h1">Ledger</h1>
							</div>
						</caption>
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td data-cell="Id">1</td>
								<td data-cell="Name">Felix</td>
								<td data-cell="Contact">Abungan</td>
								<td data-cell="Email">abungan@gmail.com</td>
								<td data-cell="Amount">$1000</td>
								<td data-cell="status">Paid</td>
							<tr>
						</tbody>
					</table>
				</div>
			</div>	
		</section>
	</main>
	<script>
		<?php include "../dashboard/dash.js" ?>
	</script>
</body>
</html>



	
