<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
  $email = $_SESSION['email'];
 require 'db_conect.php';
  $result = $mysqli->query('SELECT * FROM orders WHERE `email`='.'"'.$email.'"');
  // $new_array=[];
  while($row=mysqli_fetch_array($result)){
        $new_array[]=$row;
  }
  if(empty($new_array)):
  ?>
  <header class="header">
    <div class="container">
      <nav class="header-nav">
            <ul>
              <li>
                <a href="/">Головна</a>
              </li>
              <li>
              <a href='exit.php' class="register-href"><p class="login-off-user-button a-paragrap">Вийти</p></a>
              </li>
      </nav>
    </div>
  </header>
   <h1 style='text-align: center; margin-bottom: 15px; '>На даний момент у вас ще немає бронювань</h1>
   <?php endif; ?>
   <div class="table-responsive">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Ім'я</th>
      <th scope="col">Прізвище</th>
      <th scope="col">Емейл</th>
      <th scope="col">Номер телефону</th>
      <th scope="col">Дати</th>
      <th scope="col">Кількість людей</th>
      <th scope="col">Вид кімнати</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(!empty($new_array)){
    
    foreach($new_array as $key=>$order):
     ?>

      <tr>
        <!-- <th scope="row">1</th> -->
        <td><?php echo $order["firstname"]; ?></td>
        <td><?php echo $order['lastname']; ?></td>
        <td><?php echo $order['email']; ?></td>
        <td><?php echo $order['mobile']; ?></td>
        <td><?php echo $order['date_str']; ?></td>
        <td><?php echo $order['number_of_people']; ?></td>
        <td><?php echo $order['number_of_rooms']; ?></td>
        <td> <a href='update.php?id=<?php echo $order["Id"]; ?>'>Редагування</a> </td>
        <td> <a href='delete-order.php?id=<?php echo $order["Id"]; ?>'>Видалення</a> </td>
      </tr>
      <?php
        endforeach;
      }
      
     ?>
    </tbody>
  </table>
   </div>
  
</body>
</html>