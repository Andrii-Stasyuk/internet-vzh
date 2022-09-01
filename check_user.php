<?php session_start(); ?>
<?php
   if($_SESSION['status']!=="1"){
      // echo "<script>window.location.href='/'</script>";
   }
   require 'db_conect.php';
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   $result = $mysqli->query('SELECT * FROM users WHERE `email`='.'"'.$email.'"');
   // $pass = $mysqli->query("SELECT  *  FROM `users` WHERE `password`=".'"'.md5($password).'"');
   var_dump("SELECT * FROM users WHERE `email`=".$email);
   // $result_password = $mysqli->query("SELECT * FROM users WHERE `email` LIKE '%".$password."%'"
   $user = mysqli_fetch_array($result);
   // if(empty($_SESSION['once'])){
      
   //    if($result->num_rows > 0){
   //       $_SESSION['same_email'] = true;
   //       $_SESSION['open'] = 'yes';
   //    } else{
   //       $_SESSION['same_email'] = false;
   //       $_SESSION['open'] = 'no';
   //    }
   // }
   
   
if ($result->num_rows == 1&&$user['password']==md5($password)) {
   $_SESSION['email'] = $user['email'];
   $_SESSION['status'] = $user['role']; 
   if($user['role'] == 1){
      echo "<script>window.location.href='admin.php'</script>";
   }
   else{
      echo "<script>window.location.href='cabinet.php'</script>";
   }
}
        else{
         $_SESSION['once_log'] = false;
         $_SESSION['wrong'] = true;
         $_SESSION['open'] = 'yes';
         $_SESSION['wrong_email'] = $email;
         $_SESSION['wrong_password'] = $password;
          echo "<script>window.location.href='/'</script>";
        }

    ?>
    </thead>
    <tbody>

        
            
  </body>
</html>
    
