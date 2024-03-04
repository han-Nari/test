<?php 
	$errors = array("username" => "", "password" => "", "email" => "", "img" => "");

	if(isset($_GET["id"])) {
		try {
			$admin_id = htmlspecialchars($_GET["id"]);

			$query = "SELECT * FROM admins WHERE id = :admin_id";
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":admin_id", $admin_id);
			$stmt->execute();

			$results = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			die("Error" . $e->getMessage());
		}
	}

	if(isset($_POST["update"])) {
		function dataInput($data) {
	       $data = trim($data);
	       $data = stripslashes($data);
	       $data = htmlspecialchars($data);
	       return $data;
	    }

       $username = dataInput($_POST['username']);
       $password = dataInput($_POST["password"]);
	   $email = dataInput($_POST['email']);
	   
	   $query = "UPDATE `admins` SET username = :username, password = :password, email = :email WHERE id = :admin_id";
	   $stmt = $pdo->prepare($query);
	   $stmt->bindParam(":username", $username);
	   $stmt->bindParam(":password", $password);
	   $stmt->bindParam(":email", $email);
	   $stmt->bindParam(":admin_id", $admin_id);
	   $stmt->execute();
	   if($query) {
	   	  $_SESSION["success"] = "Update Sucessful!";
	   }
	   header('location:admins.php');

	   $imageFiles = $_FILES['image'];
       $image = $_FILES['image']['name'];
       $image_tmp_name = $_FILES['image']['tmp_name'];
       $image_size = $_FILES['image']['size'];
       $image_folder = '../uploads/'.$image;   

	   if(!empty($image)){

	      if($image_size > 2000000){
	         $errors["img"] = 'image size is too large';
	      }else{
	         $update_image = "UPDATE `admins` SET image_profile = :image_profile WHERE id = :admin_id";
	         $stmt = $pdo->prepare($update_image);
	         $stmt->bindParam(":image_profile", $image);
	         $stmt->bindParam(":admin_id", $admin_id);
	         $stmt->execute();

	         if($update_image){
	            move_uploaded_file($image_tmp_name, $image_folder);
	            $_SESSION["success"] = "Update Sucessful!";
	            header('location:admins.php');
	         }
	      }

	   }
	}
