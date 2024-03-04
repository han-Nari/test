<?php 

	if(isset($_POST["delete"])) {
		$admin_id = htmlspecialchars($_POST["delete"]);

		try {
			$query = "DELETE FROM admins WHERE id = :admin_id";
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":admin_id", $admin_id);
			$stmt->execute();
			
			if($stmt) {
				$_SESSION["delete"] = "Delete Successful!";
				header("location: admins.php");
			} 
			die();
		} catch (Exception $e) {
			die("Error" . $e->getMessage());
		}
	}