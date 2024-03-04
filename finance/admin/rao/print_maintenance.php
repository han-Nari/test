<?php 
	include "../includes/finance_db_connect.php";
	include "../includes/session.php";
	include "maintenance_fetch.php";
		
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
	<title>Maintenance & Other Operating Expenses</title>

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
		<?php include "maintenance.css"; ?>
		<?php include "print.css"; ?>
	</style>
</head>
<body>
	<section class="width">
		<div class="container">
			<div class="auto">
				<table>
					<caption>
						<div class="flex">
							<h1 class="title">Maintenance & Other Operating Expenses</h1>
							<div class="add_admin">
								<button class="btn" onClick="window.print();"><i class="fa-solid fa-print"></i></button>
							</div>
						</div>
					</caption>
					<thead>
						<tr>
							<th>Reference No.</th>
							<th>Expenses</th>
							<th>Approriation</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($results as $result) : ?>
							<tr>
								<td data-cell="Reference No"><?php echo $result["id"]; ?></td>
								<td data-cell="Expenses"><?php echo $result["expenses"]; ?></td>
								<td data-cell="Approriation"><?php echo $result["appropriation"]; ?></td>
								<td data-cell="Date"><?php echo $result["created_at"]; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>	
	</section>
	<script>
		<?php include "../dashboard/dash.js"; ?>
	</script>
</body>
</html>



	