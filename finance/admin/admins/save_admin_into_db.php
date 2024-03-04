<?php 

$errors = array("username" => "", "password" => "", "email" => "", "img" => "");

if($_SERVER["REQUEST_METHOD"] == "POST"){

   try {
      function dataInput($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
      }

      $username = dataInput($_POST['username']);
      $email = dataInput($_POST['email']);
      $password = dataInput($_POST['password']);
      $passwordCon = dataInput($_POST['passwordCon']);


      $imageFiles = $_FILES['image'];
      $image = $_FILES['image']['name'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_size = $_FILES['image']['size'];
      $image_folder = '../uploads/'.$image;   

      $users = $pdo->prepare("SELECT * FROM `admins` WHERE username = ?");
      $users->execute([$username]);


      // Errors handler

      // Username Errors Handler
      if($users->rowCount() > 0){
            $errors["username"] = 'username is already taken!';
       }elseif(empty($username)) {
         $errors["username"] = "username is empty!";
      } elseif(!preg_match('/^(?=.*[A-Za-z])[A-Za-z\d]+$/', $username)) {
            $errors["username"] = "invalid username!";
      }


      // Email Errors Handler
      if(empty($email)) {
           $errors["email"] = "email is empty!";
      } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors["email"] = "invalid email!";
      }

      // Password Errors Handler
      if(empty($password)) {
          $errors["password"] = "password is empty!";
      } elseif(strlen($password) < 10) {
            $errors["password"] = "put at least 10 characters!";
      } elseif($password != $passwordCon) {
            $errors["password"] = "password must matched!";
      } elseif(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/', $password)) {
            $errors["password"] = "password consist of letters and numbers only!";
      }

      // Image Erros Handler
      if($image_size > 2000000){
         $errors["img"] = 'image size is too large!';
      }
 
      if(array_filter($errors)) {
            // If there's error the form wont submit!
      } else {
         // If there's no error the form will be submitted
         $query = "INSERT INTO `admins`(username, password, email, image_profile) VALUES(:username, :password , :email,:image_profile)";
         $hashPwd = password_hash($password, PASSWORD_BCRYPT);
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(":username", $username);
         $stmt->bindParam(":password", $hashPwd);
         $stmt->bindParam(":email", $email);
         $stmt->bindParam(":image_profile", $image);
         $stmt->execute();
         if($stmt){
            $_SESSION["data"] = "New Admin has been added";
            move_uploaded_file($image_tmp_name, $image_folder);
            header('location:admins.php');
         }
     }
   } catch(PDOException $e) {
      die("Connection failed" . $e->getMessage());
   }

}


