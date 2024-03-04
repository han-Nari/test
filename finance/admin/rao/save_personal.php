<?php 
	
	$errors = array("app" => "", "obli" => "", "role" => "");
	if(isset($_POST["submit"])) {
	 	try {
	 		function dataInput($data) {
		       $data = trim($data);
		       $data = stripslashes($data);
		       $data = htmlspecialchars($data);
		       return $data;
	      	}

	      	$role = htmlspecialchars($_POST["role"]);
	      	$app = htmlspecialchars($_POST["app"]);


	      	 $select = $pdo->prepare("SELECT * FROM services WHERE role = ?");
    		 $select->execute([$role]);

	      	// Errors Handlers
    		if(empty($role)) {
		       $errors["role"] = "Role is empty!";
		    } elseif($select->rowCount() > 0){
	           $errors["role"] = "this role is already taken!";
	      	} elseif(!preg_match('/^(?=.*[A-Za-z])[A-Za-z\d]+$/', $role)) {
            	$errors["role"] = "invalid role!";
    		}
    		
	      	if(empty($app)) {
	      		$errors["app"] = "Form is empty!";
	      	} elseif(!preg_match("/^[0-9]+$/", $app)) {
	      		$errors["app"] = "Only number is allowed!";
	      	} 

	      	if(array_filter($errors)) {
	      		//  Form wont submit if there's an errors
	      	} else {
	      		//  Form will submit if the form does not have an errors

	      		$query = 'INSERT INTO services (role, appropriation) VALUES(:role, :appropriation)';
		      	$stmt = $pdo->prepare($query);
		      	$stmt->bindParam(":role", $role);
		      	$stmt->bindParam(":appropriation", $app);
		      	$result = $stmt->execute();
		      	if($result) {
		      		 $_SESSION["data"] = "New Data has been added!";
		      		header("location:personal.php");
		      		die();
		      	}

	      	}



	 	} catch (PDOException $e) {
	 		die('Query Error' . $e->getMessage());
	 	}

	}




