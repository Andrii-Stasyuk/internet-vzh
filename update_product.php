<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
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
$mysql="SELECT  `title`, `image`, `text`, `fade` FROM `products` WHERE `id`=".$id;

// var_dump("SELECT  `firstname`, `lastname`, `email`, `mobile`, `day_from`, `day_to`, `number_of_people`, `number_of_rooms` FROM `orders` WHERE `id`=".$id);
$result = $mysqli->query($mysql);
$row=mysqli_fetch_array($result);

// var_dump($row["firstname"]);
?>
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
          <li>
            <a href="orders.php">Замовлення</a>
          </li>
          <li>
            <a href="products.php">Продукти</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
<div class="container">
<h2 class="update-title">Редагувати продукт номер <? echo $id; ?></h2>
<form  enctype="multipart/form-data" class="update-form" method="POST" action="update_product.php?id=<?echo $id?>">
     <h2>Заголовок</h2>
    <input  name="title" type="text" value="<?php echo $row["title"]?>">
    <h2>Текст</h2>
    <input  name="text" type="text"  value="<?php echo $row["text"]?>">
    <h2>Fade</h2>
    <input  name="fade" type="text"  value="<?php echo $row["fade"]?>">
    <h2>Картинка</h2>
    <h3>Минула</h3>
    <input  name="image" readonly  value="<?php echo $row["image"]?>">
    <h3>Оновити на</h3>
    <input name="userfile" type="file" />
    
    <button class="button-form" name="button" value=true> Оновити </button>
  </form>
 



</div>
<?php $name_file = 'images/'.$row['image'];?>
<img src="<?php echo $name_file; ?>" alt="picture">
<?php
$title=$_POST["title"]; // Відправлення оновлених даних
$text=$_POST["text"];
$image=$_FILES['userfile']['name'];
$fade = $_POST['fade'];
$db_img = $row['image'];
if($image == ''){
  $text_db = 'UPDATE products SET title='.'"'.$title.'"'.','.'text='.'"'.$text.'"'.','.'image='.'"'.$db_img.'"'.','.'fade='.'"'.$fade.'"'."WHERE id='$id'";
} else{
  $text_db = 'UPDATE products SET title='.'"'.$title.'"'.','.'text='.'"'.$text.'"'.','.'image='.'"'.$image.'"'.','.'fade='.'"'.$fade.'"'."WHERE id='$id'";
}
// var_dump("UPDATE products SET title='$title',text='$text',image='$image' WHERE id='$id'");
 

// $uploaddir = 'images/';
// $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if(!empty($_POST['button'])){
  if (rename('images/'.$row['image'], 'images/'.$image)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
}



// var_dump($text);
// exit();
  if($_POST["button"]==true){
    $mysqli->query($text_db);
    echo '<script>window.location.href="products.php"</script>';
 }



?>