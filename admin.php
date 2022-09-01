<?php session_start(); 
   
  //  if(!$_SESSION['status']){
  //    $_SESSION['open'] = 'yes';
  //  }
  //  if($_SESSION['status']){
  //   $_SESSION['open'] = 'no';
  // }
   if($_SESSION['status']!=="1"){
    echo "<script>window.location.href='/'</script>";
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <header class="header">
    <div class="container">
      <nav class="header-nav">
        <ul>
          <li>
            <a href="/">Головна</a>
          </li>
          <li>
            <a href="orders.php">Замовлення</a>
          </li>
          <li>
            <a href="products.php">Продукти</a>
          </li>
          
          <li>
          <a href='price.php'>Ціни</a>
          </li>
          <li>
          <a href='card_info.php'>Карточки</a>
          </li>
          <li>
          <a href='exit.php' class="register-href"><p class="login-off-user-button a-paragrap">Вийти</p></a>
          </li>
          
        </ul>
      </nav>
    </div>
  </header>
<?php
  require "db_conect.php";
  $mysql="Select * FROM users"; // Cправа від = запит на мові SQL users назва таблиці в базі даних vzh
  // echo "<pre>";  
  $result = $mysqli->query($mysql); // Надсилання запиту до бази даних і збереження його результату в змінну result
  //  var_dump($result); //Вивід результату запиту (загальної інформації про таблицю з користувачами к-сть стовпців та рядків)
  while($row=mysqli_fetch_array($result)){
        // print("Ім’я " . $row["firstname"] . "; ІД . " . $row["Id"] . "<br>");
        $new_array[]=$row;
  }
   ?>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(!empty($new_array)){
    foreach($new_array as $key=>$value): ?>
      <tr>
        <!-- <th scope="row">1</th> -->
        <td><?php echo $value["Id"]; ?></td>
        <td><?php echo $value["firstname"]; ?></td>
        <td><?php echo $value['lastname']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['password']; ?></td>
        <td><?php echo $value['phone']; ?></td>
        <td> <a href='u-users.php?id=<?php echo $value["Id"]; ?>'>Редагування</a> </td>
        <td> <a href='d-users.php?id=<?php echo $value["Id"]; ?>'>Видалення</a> </td>
      </tr>
      <?php
       endforeach;
      }
      
     ?>
  
   


</table>   
</body>
</html>
