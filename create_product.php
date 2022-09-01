
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<?php
  require "db_conect.php";
  $image = $_FILES['userfile']['name'];
  $title = $_POST['title'];
  $text = $_POST['text'];
  $fade = $_POST['fade'];
  
//   var_dump("INSERT INTO `products`(`Id`, `image`, `title`, `text`)  VALUES (null,"$image",'$title','$text')");
  if(!empty($_POST['button'])){
    $result = $mysqli->query('INSERT INTO `products`(`Id`, `image`, `title`, `text`, `fade`)  VALUES (null,'.'"'.$image.'"'.','.'"'.$title.'"'.','.'"'.$text.'"'.','.'"'.$fade.'"'.")");
	  echo 'INSERT INTO `products`(`Id`, `image`, `title`, `text`, `fade`)  VALUES (null,'.'"'.$image.'"'.','.'"'.$title.'"'.','.'"'.$text.'"'.','.'"'.$fade.'"'.")";
  }
  // var_dump("INSERT INTO `products`(Id', 'image', 'title', 'text')  VALUES (null,'$image','$title','$text')");
//   echo "<pre>";
//   var_dump($_POST);
//   var_dump($_FILES);
?>
<div class="container">
    <form class="file-form" enctype="multipart/form-data" action="" method="POST">
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <input type="hidden"/>
        <label for="exampleInputEmail1">Title</label>
        <input  name="title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <label for="exampleInputEmail1">Text</label>
        <input  name="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <label for="exampleInputEmail1">Fade</label>
        <input  name="fade"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        <div class="mb-3">
      <label for="formFile" class="form-label">Отправить этот файл:</label>
      <input class='file' name='userfile' class="form-control" type="file" id="formFile">
        <input type='submit' class="file-button" name='button' value="Відправити">
    </form>
</div>
<div class="div"></div>
</body>
</html>
<?php
$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
if(!empty($_POST['button'])){
      echo '<script>window.location.href="products.php"</script>';
}

?>
<?php
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

// echo 'Некоторая отладочная информация:';
// print_r($_FILES);
?>

