<?php 
	$errors = array("role" => "", "app" => "");

	if(isset($_GET["id"])) {
		try {
			$admin_id = htmlspecialchars($_GET["id"]);

			$query = "SELECT * FROM services WHERE id = :admin_id";
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":admin_id", $admin_id);
			$stmt->execute();

			$results = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			die("Error" . $e->getMessage());
		}
	}

	if(isset($_POST["submit"])) {
       try {
       		function dataInput($data) {
		       $data = trim($data);
		       $data = stripslashes($data);
		       $data = htmlspecialchars($data);
		       return $data;
		    }

       	   $role = dataInput($_POST["role"]);
	       $app = dataInput($_POST["app"]);

	       if(array_filter($errors)) {

	       	} else {
	       	   $query = "UPDATE services SET role = :role, appropriation = :app WHERE id = :admin_id";
		       $stmt = $pdo->prepare($query);
		       $stmt->bindParam(":role", $role);
		       $stmt->bindParam(":app", $app);
		       $stmt->bindParam(":admin_id", $admin_id);
		       $stmt->execute();

		       if($stmt) {
		       	$_SESSION["success"] = "Update Sucessful!";
		       	header("location: personal.php");
		       }
		   }
       } catch (PDOException $e) {
       	   die("Error" . $e->getMessage());
       }
 
	}