<?php
session_start();

require "db_conect.php";
$email=$_POST["email"];

$result = $mysqli->query('SELECT * FROM users WHERE `email`='.'"'.$email.'"');
   // $pass = $mysqli->query("SELECT  *  FROM `users` WHERE `password`=".'"'.md5($password).'"');
   //
   // $result_password = $mysqli->query("SELECT * FROM users WHERE `email` LIKE '%".$password."%'"
   $user = mysqli_fetch_array($result);
   echo '<pre>';
   var_dump($user, md5($password));
       var_dump($result->num_rows);
      if(!empty($user['email'])){
               $_SESSION['once_reg'] = false;
            $firstname=$_POST["firstname"];
            $lastname=$_POST["lastname"];
            $email=$_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $_SESSION['same_email'] = true;
            $_SESSION['open_register'] = 'yes';
            $_SESSION['email_reg'] = $email;
            $_SESSION['first_reg'] = $firstname;
            $_SESSION['last_reg'] = $lastname;
            $_SESSION['pass_reg'] = $password;
            $_SESSION['phone_reg'] = $phone;
            echo "<script>window.location.href='/'</script>";
         
         }     
   else{
      if(!empty($_POST["button-users"])==true){
         $firstname=$_POST["firstname"];
         $lastname=$_POST["lastname"];
         $email=$_POST["email"];
         $password = md5($_POST["password"]);
         $phone = $_POST["phone"];
         $_SESSION['email'] = $email;
         $_SESSION['status'] = '0';
         var_dump($phone);
         $mysqli->query("INSERT INTO users(`Id`, `firstname`, `lastname`, `email`, `password`, `role`, `phone`) VALUES(null,'$firstname','$lastname','$email','$password','0', '$phone')");
         $result = $mysqli->query("SELECT * FROM users WHERE `email` LIKE '%".$email."%'");
         if ($result->num_rows > 0) {
               echo "<script>window.location.href='cabinet.php'</script>";
         }
                 else
                 
                 
                 
                 
                 {
                     echo "<script>window.location.href='/'</script>";
                 }
           }
   } 
   
 
?>