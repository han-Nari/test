<?php 
	include "../includes/finance_db_connect.php";
	include "../includes/session.php";
	include "maintenance_fetch.php";
	include "maitenance_delete.php";
		
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
	</style>
</head>
<body>
	<main>
	<!-- Sidebar -->
	<?php include "../dashboard/side.php";?>

	<!-- Header -->
	<?php include "../dashboard/header.php";?>

	<!-- Main content -->
		<section>
			<?php if(isset($_SESSION["success"])) : ?>
					<div class="update">
						<strong><?php echo $_SESSION["success"];?></strong>
						<i class="fa-solid fa-xmark remove"></i>
					</div>
					<?php unset($_SESSION["success"]); ?>
			<?php endif; ?>

			<?php if(isset($_SESSION["data"])) : ?>
					<div class="data">
						<strong><?php echo $_SESSION["data"];?></strong>
						<i class="fa-solid fa-xmark remove"></i>
					</div>
					<?php unset($_SESSION["data"]); ?>
			<?php endif; ?>

			<?php if(isset($_SESSION["delete"])) : ?>
					<div class="update deleted">
						<strong><?php echo $_SESSION["delete"];?></strong>
						<i class="fa-solid fa-xmark remove"></i>
					</div>
					<?php unset($_SESSION["delete"]); ?>
			<?php endif; ?>
			<div class="container">
				<div class="auto">
					<table>
						<caption>
							<div class="flex">
								<span class="title">Operating Expenses</span>
								<div class="add_admin">
									<a target="_blank" href="print_maintenance.php"><i class="fa-solid fa-print"></i></a>
									<a href="maintenance_add.php">Add Expenses</a>
								</div>
							</div>
						</caption>
						<thead>
							<tr>
								<th>Reference No.</th>
								<th>Budget Name</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($results as $result) : ?>
								<tr>
									<td data-cell="Reference No"><?php echo $result["id"]; ?></td>
									<td data-cell="Expenses"><?php echo $result["expenses"]; ?></td>
									<td data-cell="Approriation"><?php echo $result["appropriation"]; ?></td>
									<td data-cell="Date"><?php echo $result["created_at"]; ?></td>
									<td data-cell="Edit"><a class="edit" href="maintenance_edit.php?id=<?php echo htmlspecialchars($result["id"]); ?>">Edit</a></td>
									<td data-cell="Delete">
										<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">	
											<button id="delete_button" onclick="return confirm('Do you want to delete <?php echo "Id" . " " . $result["id"] ?>')" type="submit" name="delete" class="delete" value="<?php echo htmlspecialchars($result["id"]); ?>">Delete</button>
											<a href="javascript:void"></a>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>	
		</section>
	</main>
	<script>
		<?php include "../dashboard/dash.js"; ?>
		<?php include "remove.js"; ?>
	</script>
</body>
</html>



	