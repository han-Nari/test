<?php 
	
	$errors = array("app" => "", "obli" => "", "expenses" => "");
	if(isset($_POST["submit"])) {
	 	try {
	 		function dataInput($data) {
		       $data = trim($data);
		       $data = stripslashes($data);
		       $data = htmlspecialchars($data);
		       return $data;
	      	}

	      	$expenses = htmlspecialchars($_POST["expenses"]);
	      	$app = htmlspecialchars($_POST["app"]);


	      	// Errors Handlers
    		if(empty($expenses)) {
	      		$errors["expenses"] = "Form is empty!";
	      	} elseif(!preg_match("/^(?=.*[A-Za-z])[A-Za-z\d]+$/", $expenses)) {
	      		$errors["expenses"] = "Title Incorrect";
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

	      		$query = 'INSERT INTO expenses (expenses, appropriation) VALUES(:expenses, :appropriation)';
		      	$stmt = $pdo->prepare($query);
		      	$stmt->bindParam(":expenses", $expenses);
		      	$stmt->bindParam(":appropriation", $app);
		      	$result = $stmt->execute();
		      	if($result) {
		      		 $_SESSION["data"] = "New Data has been added!";
		      		header("location:maintenance.php");
		      		die();
		      	}

	      	}



	 	} catch (PDOException $e) {
	 		die('Query Error' . $e->getMessage());
	 	}

	}