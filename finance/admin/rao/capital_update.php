<?php 
	$errors = array("expenses" => "", "app" => "");

	if(isset($_GET["id"])) {
		try {
			$admin_id = htmlspecialchars($_GET["id"]);

			$query = "SELECT * FROM capitals WHERE id = :admin_id";
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

       	   $expenditures = dataInput($_POST["expenses"]);
	       $app = dataInput($_POST["app"]);

	       if(array_filter($errors)) {

	       	} else {
	       	   $query = "UPDATE capitals SET expenditures = :expenditures, appropriation = :app WHERE id = :admin_id";
		       $stmt = $pdo->prepare($query);
		       $stmt->bindParam(":expenditures", $expenditures);
		       $stmt->bindParam(":app", $app);
		       $stmt->bindParam(":admin_id", $admin_id);
		       $stmt->execute();

		       if($stmt) {
		       	$_SESSION["success"] = "Update Sucessful!";
		       	header("location: capital.php");
		       }
		   }
       } catch (PDOException $e) {
       	   die("Error" . $e->getMessage());
       }
 
	}