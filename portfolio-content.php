<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
  
           require "db_conect.php";
           $product_res=$mysqli->query('SELECT * FROM products');
           while($product=mysqli_fetch_array($product_res)){
               $products[]=mysqli_fetch_array($product_res);
           }

           $result = $mysqli->query('SELECT `id` FROM products');
           
           while($id = mysqli_fetch_array($result)){
               $ids[]=$id;
           }
       
        ?>
<?php

   if(!empty($products)):
   
 ?>
<div class="container">
    <form class="file-form" enctype="multipart/form-data" action=" " method="POST">
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <input type="hidden"/>
        <label for="exampleInputEmail1">Text</label>
        <input  name="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        <label for="exampleInputEmail1">Card id</label>
        
      
        <select name='card_id'>
        <?php foreach($ids as $key=>$value):  ?>
            <option><?php echo $value['id'];?></option>
            <?php 
             endforeach;
           ?>
        </select>
        
        <div class="mb-3">
            <label for="formFile" class="form-label">Картинка 1</label>
            <input class='file' name='img1' class="form-control" type="file" id="formFile">
            <label for="formFile" class="form-label">Картинка 2</label>
            <input class='file' name='img2' class="form-control" type="file" id="formFile">
            <label for="formFile" class="form-label">Картинка 3</label>
            <input class='file' name='img3' class="form-control" type="file" id="formFile">
            <label for="formFile" class="form-label">Картинка 4</label>
            <input class='file' name='img4' class="form-control" type="file" id="formFile">
            <label for="formFile" class="form-label">Картинка 5</label>
            <input class='file' name='img5' class="form-control" type="file" id="formFile">
            <label for="formFile" class="form-label">Картинка 6</label>
            <input class='file' name='img6' class="form-control" type="file" id="formFile">
            <label for="formFile" class="form-label">Картинка 7</label>
            <input class='file' name='img7' class="form-control" type="file" id="formFile">
        <input type='submit' class="file-button" name='button' value="Відправити">
    </form>
</div>
<?php
  endif;
  
?>
<?php
  if(empty($products)){
    echo 'Додайте продукт';
   }
  
   
 ?>

</body>
</html>
<?php

 if(!empty($_POST['button'])){
    $text = $_POST['text'];
    $card_id = $_POST['card_id'];
    $first = $_FILES['img1']['name'];
    $second = $_FILES['img2']['name'];
    $third = $_FILES['img3']['name'];
    $fourth = $_FILES['img4']['name'];
    $fifth = $_FILES['img5']['name'];
    $six = $_FILES['img6']['name'];
    $seven = $_FILES['img7']['name'];
    // $_SESSION['tmp1'] = $_FILES['img1']['tmp_name'];
    // $_SESSION['tmp2'] = $_FILES['img2']['tmp_name'];
    // $_SESSION['tmp3'] = $_FILES['img3']['tmp_name'];
    // $_SESSION['tmp4'] = $_FILES['img5']['tmp_name'];
    // $_SESSION['tmp5'] = $_FILES['img6']['tmp_name'];
    // $_SESSION['tmp6'] = $_FILES['img7']['tmp_name'];
    // $_SESSION['tmp7'] = $_FILES['img8']['tmp_name'];
    // var_dump($_SESSION['tmp1'], $_SESSION['tmp2'], $_SESSION['tmp3'], $_SESSION['tmp4']);
    $mysqli->query("INSERT INTO portfolio_products(`Id`, `product_id`, `text`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`) VALUES(null,'$card_id',' $text','$first','$second','$third', '$fourth', '$fifth', '$six', '$seven')");
function upload_image($image_name){
        $upload_dir = 'image/portfolio/'.basename($_FILES[$image_name]['name']);
        move_uploaded_file($_FILES[$image_name]['tmp_name'], $upload_dir);
}
    upload_image('img1');
    upload_image('img2');
    upload_image('img3');
    upload_image('img4');
    upload_image('img5');
    upload_image('img6');
    upload_image('img7');

      echo '<script>window.location.href="card_info.php"</script>';
 }
 
 ?>
