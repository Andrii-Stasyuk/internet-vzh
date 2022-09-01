<?php
session_start();
// if($_SESSION['status']!=="1"){
//    echo "<script>window.location.href='/'</script>";
// }
   require "db_conect.php"; 
   $winter_price = $_POST['winter_price'];
   $summer_price = $_POST['summer_price'];
   $result = $mysqli->query('SELECT * FROM `price`');
   if($winter_price&&$summer_price){
       if(empty(mysqli_fetch_array($result))){
           $mysqli->query("INSERT INTO price(`summer_price`, `winter_price`)VALUES('$summer_price','$winter_price')");
       } else{

           $mysqli->query("UPDATE price SET summer_price='$summer_price',winter_price='$winter_price'");

       }
   }

   // echo '<script>window.location.href="/"</script>';
    
     echo json_encode(mysqli_fetch_array($result), true);
 ?>