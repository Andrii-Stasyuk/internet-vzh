<?php session_start(); ?>

<?php
// if($_SESSION['status']!=="1"){
//   var_dump("<script>window.location.href='/'</script>");
// } 
if($_GET['id']){
  $_SESSION['id'] = $_GET['id'];
  $_SESSION['open_update'] = true;
} else{
  $_SESSION['open_update'] = false;
}

require "db_conect.php";  


// var_dump("SELECT  `firstname`, `lastname`, `email`, `mobile`, `day_from`, `day_to`, `number_of_people`, `number_of_rooms` FROM `orders` WHERE `id`=".$id);
$result = $mysqli->query("SELECT  `firstname`, `lastname`, `email`, `mobile`, `dates`, `number_of_people`, `number_of_rooms` FROM `orders` WHERE `id`=".$_SESSION['id']);
$row=mysqli_fetch_array($result);
echo json_encode($row, true);



// var_dump($row["firstname"]);
?>
<?php
if($_SESSION['open_update']){
  echo '<script>window.location.href="index.php"</script>';
}


?>
