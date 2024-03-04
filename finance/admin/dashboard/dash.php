<?php 
	include "../includes/finance_db_connect.php";
	include "../includes/session.php";
	include "../admins/total_admins.php";
		
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
		<?php include "dash.css"; ?>
		<?php include "../coa/table.css"; ?>
	</style>
</head>
<body>
	<main>
	<!-- Sidebar -->
	<?php include "side.php";?>

	<!-- Header -->
	<?php include "header.php";?>

	<!-- Main content -->
		<section>
			<h1 class="title block">Dashboard</h1>
			<div class="col_one">
				<div class="cards">
					<span class="icon bg-1">
						<i class="fa-solid fa-file-circle-plus"></i>
					</span>
					<span class="texts">
						<span>New Attachments</span>
						<p class="count">0</p>
					</span>
					</span>
				</div>
				<div class="cards">
					<span class="icon bg-2">
						<i class="fa-solid fa-file"></i>
					</span>
					<span class="texts">
						<span>Recent Documents</span>
						<p class="count">0</p>
					</span>
				</div>
				<div class="cards">
					<span class="icon bg-3">
						<i class="fa-solid fa-folder"></i>
					</span>
					<span class="texts">
						<span>Total Documents</span>
						<p class="count">0</p>
					</span>
				</div>
				<div class="cards">
					<span class="icon bg-4">
						<i class="fa-solid fa-user-tie"></i>
					</span>
					<span class="texts">
						<span>Admin</span>
						<p class="count"><?php echo rowCount($pdo); ?></p>
					</span>
				</div>
			</div>
			<div class="col_two">
				<div class="container">
					<div class="auto_scroll">
						<table>
							<caption>
									<span class="left">Recent Documents</span>			
							</caption>
							<thead>
								<tr>
									<th>Document Name</th>
									<th>Sender</th>
									<th>Descriptions</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td data-cell="Document Name">Expense</td>
									<td data-cell="Sender">Lek</td>
									<td data-cell="Descriptions">Supplies</td>
									<td data-cell="Date">2/3/24</td>
								<tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</section>
	</main>
	<script>
		<?php include "dash.js"; ?>
	</script>
</body>
</html>



	