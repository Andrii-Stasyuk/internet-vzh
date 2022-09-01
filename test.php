<?php session_start(); ?> 
<?php
 require "db_conect.php";
// $num_of_room = $_POST['num_of_room'];
// if($_SESSION['status']!=="1"){
//     echo "<script>window.location.href='/'</script>";
//  }



// // $mysqli->query("INSERT INTO `orders`(`id`, `firstname`, `lastname`, `email`, `mobile`, `day_from`, `day_to`, `number_of_people`,  `number_of_rooms`) VALUES (null,'$firstname','$lastname','$email','$phone','$from','$to','$number_of_people','$number_of_rooms')");

// var_dump($_SESSION['arr']);
$num_of_room  = $_GET['numOfRoom'];
$date_arr = $_POST['arr'];
$date_str = $_POST['date_str'];

// var_dump($num_of_room);
// if(!empty($_POST['arr'])){
$_SESSION['arr'] = $date_arr;
$_SESSION['date_str'] = $date_str;
$new_arr = explode(',', $date_arr);
//   $number_arr=[];
//   foreach($new_arr as $key=>$value){
    
//     $number_arr[]=strtotime(mb_substr($value, 0, 33));
    
//   }
//   asort($number_arr);
  
// $str = 'з '.date("d-m-Y", $number_arr[0]).' по '.date("d-m-Y", $number_arr[count($number_arr)-1]);
// }
$_SESSION['num_of_room'] = $_POST['num_of_room']; 
// $_SESSION['date_str'] = $str;
$all = $mysqli->query("SELECT * FROM `orders`");
$three = $mysqli->query("SELECT  `firstname`, `lastname`, `email`, `mobile`, `dates`, `number_of_people`, `number_of_rooms`, `date_str` FROM `orders` WHERE `number_of_rooms`=".'"'.'3x двохмісний'.'"');
$other = $mysqli->query("SELECT  *  FROM `orders` WHERE `number_of_rooms`="."'".$num_of_room."'");
// var_dump("SELECT * FROM `orders` WHERE `number_of_rooms`=".'"'.$num_of_room.'"');
while($one=mysqli_fetch_array($all)){
    $new_array[]=$one['dates'];
  
}
  
  // var_dump("SELECT  `firstname`, `lastname`, `email`, `mobile`, `dates`, `number_of_people`, `number_of_rooms` FROM `orders` WHERE `number_of_rooms`=".'3x двохмісний');
  if(!empty(mysqli_fetch_array($three))||$num_of_room=='3х двохмісний'){
     
    echo json_encode($new_array, true);
  } else{
    // var_dump($other->num_rows);
    for($i = 1; $i<=$other->num_rows; $i++){
      
      $arr[]=mysqli_fetch_array($other)['dates'];
    }
    echo json_encode($arr, true);
  } 
?>