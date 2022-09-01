<?php session_start(); 
   if($_SESSION['status']!=="1"){
      echo "<script>window.location.href='/'</script>";
   }
  //  if(!$_SESSION['status']){
  //     $_SESSION['open']='yes';
  //  }
  //  if($_SESSION['status']){
  //   $_SESSION['open'] = 'no';
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header class="header">
    <div class="container">
      <nav class="header-nav">
        <ul>
          <li>
            <a href="/">Перейти до головного сайту</a>
          </li>
          <li>
            <a href="orders.php">Замовлення</a>
          </li>
          <li>
            <a href="products.php">Продукти</a>
          </li>
          <li>
            <a href="admin.php">Користувачі</a>
          </li>
          <li>
            <a href="portfolio-content.php">Додати контент</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
    <?php
       require 'db_conect.php';
       $result = $mysqli->query('SELECT * FROM portfolio_products');
       $contents=[];
       
       while($content=mysqli_fetch_array($result)){
           $contents[] = $content;
       }
     ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product id</th>
      <th scope="col">Text</th>
      <th scope="col">Img1</th>
      <th scope="col">Img2</th>
      <th scope="col">Img3</th>
      <th scope="col">Img4</th>
      <th scope="col">Img5</th>
      <th scope="col">Img6</th>
      <th scope="col">Img7</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(!empty($contents)){
    foreach($contents as $key=>$value): ?>
      <tr>
        <!-- <th scope="row">1</th> -->
        <td><?php echo $value["Id"]; ?></td>
        <td><?php echo $value["product_id"]; ?></td>
        <td><?php echo $value['text']; ?></td>
        <td><?php echo $value['image1']; ?></td>
        <td><?php echo $value['image2']; ?></td>
        <td><?php echo $value['image3']; ?></td>
        <td><?php echo $value['image4']; ?></td>
        <td><?php echo $value['image5']; ?></td>
        <td><?php echo $value['image6']; ?></td>
        <td><?php echo $value['image7']; ?></td>
        <td> <a href='content_update.php?id=<?php echo $value["Id"]; ?>'>Редагування</a> </td>
        <td> <a href='content_delete.php?id=<?php echo $value["Id"]; ?>'>Видалення</a> </td>
      </tr>
      <?php
       endforeach;
      }
      
     ?>
  
</table>  


</body>
</html>