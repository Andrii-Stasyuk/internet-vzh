<?php
 require 'db_conect.php';
 
 $arr = $_POST['arr_month'];
 if(!empty($arr)){
    $all = $mysqli->query("SELECT * FROM `closed_month`");
    if(!empty(mysqli_fetch_array($all))){
       $mysqli->query("UPDATE closed_month SET arr='$arr'");
    } else{
       $mysqli->query("INSERT INTO closed_month(`arr`)  VALUES('$arr')");
    }
   
    
 }
 $all_updated = $mysqli->query("SELECT * FROM `closed_month`");
 echo json_encode(mysqli_fetch_array($all_updated), true);

?>