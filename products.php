<?php session_start(); 
   if($_SESSION['status']!=="1"){
      echo "<script>window.location.href='/'</script>";
   }
   if(!$_SESSION['status']){
    $_SESSION['open']='yes';
 }
 if($_SESSION['status']){
  $_SESSION['open'] = 'no';
}
?>
<?php
  require "db_conect.php";
  $result = $mysqli->query("SELECT * FROM `products`");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<header class="header">
    <div class="container">
      <nav class="header-nav">
        <ul>
          <li>
            <a href="/admin.php">Адмінка</a>
          </li>
          <li>
            <a href="/">Перейти до головного сайту</a>
          </li>
          <li>
            <a href="orders.php">Замовлення</a>
          </li>
          <!-- <li>
            <a href="products.php">Продукти</a>
          </li> -->
          <li>
            <a href="create_product.php">Додати продукт</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
<body>
    <table class="table">
      <?php
       while($product=mysqli_fetch_array($result)){
        // print("Ім’я " . $row["firstname"] . "; ІД . " . $row["Id"] . "<br>");
        $new_array[]=$product;
  }
  ?>
  <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Text</th>
            <th scope="col">Fade</th>
            </tr>
        </thead>
        <?php
        if(!empty($new_array)){
          foreach($new_array as $key=>$value):
        
      ?>
        
             <!-- <th scope="row">1</th> -->
            <td><?php echo $value['Id']; ?></td>
            <td><?php echo $value['image']; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $value['text']; ?></td>
            <td><?php echo $value['fade']; ?></td>
          <td> <a href='update_product.php?id=<?php echo $value["Id"]; ?>'>Редагування</a> </td> 
        <td> <a href='delete_product.php?id=<?php echo $value["Id"]; ?>'>Видалення</a> </td>
     
    <tbody>
    <?php
       endforeach;
      }
       ?>
</body>
</html>
