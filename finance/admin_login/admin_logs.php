<?php 

   $errors = array("username" => "", "password" => "");
   if($_SERVER["REQUEST_METHOD"] == "POST"){

     try {
          function dataInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          $username = dataInput($_POST['username']);
          $password = dataInput($_POST['password']);

          $query = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
          $query->bindParam(":username", $username, PDO::PARAM_STR);
          $query->execute();
          $result = $query->fetch(PDO::FETCH_ASSOC);


          if(!$result) {
             $errors["username"] = "username not found";
          } else {
             if(password_verify($password, $result["password"])) {
                if($result["user_type"] == "admin") {
                      $_SESSION["admin_id"] = $result["id"];
                      header('location:../admin/dashboard/dash.php');
                   } 
              } else {
                $errors["password"] = "incorrect password";
                }
          }

     } catch(PDOException $e) {
          die("Connection failed" . $e->getMessage());
       }
   }  
