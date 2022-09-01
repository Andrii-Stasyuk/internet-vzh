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
  <header class="header">
    <div class="container">
      <nav class="header-nav">
        <ul>
          <li>
            <a href="/admin.php">Головна</a>
          </li>
          <li>
            <a href="/">Перейти до головного сайту</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

<?php 
if($_SESSION['status']!=="1"){
  echo "<script>window.location.href='/'</script>";
}
$id = $_GET['id'];
require "db_conect.php";  
$mysql="SELECT  `firstname`, `lastname`, `email`, `password`, `phone` FROM `users` WHERE `id`=".$id;

var_dump("SELECT  * FROM `users` WHERE `id`=".$id);
$result = $mysqli->query($mysql);
$row=mysqli_fetch_array($result);
// var_dump($row["firstname"]);
echo '<pre>';
?>
<div class="container">
<h2 class="update-title">Редагувати замовника номер <? echo $id; ?></h2>
<form  class="update-form" method="POST" action="u-users.php?id=<?echo $id?>">
     <h2>Ім'я</h2>
    <input  name="firstname" type="text" value="<?php echo $row["firstname"]?>">
    <h2>Прізвище</h2>
    <input  name="lastname" type="text"  value="<?php echo $row["lastname"]?>">
    <h2>Емейл</h2>
    <input name="email" type="email"  value="<?php echo $row["email"]?>">
    <h2>Пароль</h2>
    <input name="password"   value="<?php echo $row["password"]?>">
    <h2>Номер телефону</h2>
    <input name="phone"   value="<?php echo $row["phone"]?>">
    <button class="button-form" name="button" value=true> Оновити </button>
  </form>



</div>
<?php
$firstname=$_POST["firstname"]; // Відправлення оновлених даних
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$password=md5($_POST["password"]);
$phone = $_POST["phone"];

$text = "UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',
password='$password', phone='$phone' WHERE id='$id'";




// var_dump($text);
// exit();
  if($_POST["button"]==true){
    $mysqli->query($text);
    echo '<script>window.location.href="admin.php"</script>';
 }

?>



</body>