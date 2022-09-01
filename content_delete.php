<?php session_start()?>
  $id = $_GET['id'];
  require 'db_conect.php';
  $result = $mysqli->query('SELECT *  FROM `portfolio_products` WHERE Id='.$id);
  $content = mysqli_fetch_array($result);

  function delete_file($image){
      if($image){
        unlink('image/portfolio/'.$image);
      }
       
  }
  delete_file($content['image1']);
  delete_file($content['image2']);
  delete_file($content['image3']);
  delete_file($content['image4']);
  delete_file($content['image5']);
  $mysqli->query('DELETE FROM `portfolio_products` WHERE Id='.$id);
  echo '<script>window.location.href="card_info.php"</script>';


 ?>