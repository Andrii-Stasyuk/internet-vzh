<?php session_start() ?>
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
  <!-- <header class="header">
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
  </header> -->

<?php $id = $_GET['id'];
require "db_conect.php";  
$mysql="SELECT * FROM `portfolio_products` WHERE `id`=".$id;

// var_dump("SELECT  `firstname`, `lastname`, `email`, `mobile`, `day_from`, `day_to`, `number_of_people`, `number_of_rooms` FROM `orders` WHERE `id`=".$id);
$result = $mysqli->query($mysql);
$row=mysqli_fetch_array($result);
echo "<pre>";
// var_dump($row["firstname"]);
function if_not_empty($new, $db_name, $row){
  if($new==''){
       return $row[$db_name];
  } else{
       return $new;
  }
}
function update_image($old_image, $new_image, $new_image_name){  
      if($old_image!=$new_image){
        var_dump($old_image, $new_image);
        unlink('image/portfolio/'.$old_image);
        move_uploaded_file($_FILES[$new_image_name]['tmp_name'], 'image/portfolio/'.basename($new_image));
      }
}
?>
<div class="container">
<h2 class="update-title">Редагувати контент номер: <? echo $id; ?></h2>
<form  enctype="multipart/form-data" class="update-form" method="POST" action="content_update.php?id=<?echo $id?>">
     <h2>Id карточки</h2>
     <?php 
           require "db_conect.php";
           $result = $mysqli->query('SELECT `id` FROM products');
           $ids_copy=[];
           while($id_product = mysqli_fetch_array($result)){
              $ids[]=$id_product;    
           }
           foreach($ids as $key=>$value)
           if($value['id']==$row['product_id']){
             array_unshift($ids_copy, $value['id']);
           } else{
             $ids_copy[]=$value['id'];
           }
        ?>
        <select name='product_id'>
        <?php foreach($ids_copy as $key=>$value):  ?>
            <option><?php 
            echo $value;?></option>
            <?php 
             endforeach;
           ?>
        </select>
    <h2>Teкст</h2>
    <input  name="text" type="text"  value="<?php echo $row["text"];?>">
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image1"];?>">
    <h2>Картинка 1</h2>
    <input name="img1"  type="file"/>
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image2"];?>">
    <h2>Картинка 2</h2>
    <input name="img2" type="file"/>
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image3"];?>">
    <h2>Картинка 3</h2>
    <input name="img3" type="file" />
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image4"];?>">
    <h2>Картинка 4</h2>
    <input name="img4" type="file"/>
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image5"];?>">
    <h2>Картинка 5</h2>
    <input name="img5" type="file"/>
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image6"];?>">
    <h2>Картинка 6</h2>
    <input name="img6" type="file"/>
    <h2>Минула</h2>
    <input  readonly value="<?php echo $row["image7"];?>">
    <h2>Картинка 7</h2>
    <input name="img7" type="file"/>


    <button class="button-form" name="button" value=true> Оновити </button>
  </form>



</div>
<?php

  if($_POST["button"]==true){
    $card_id=$_POST["product_id"]; // Відправлення оновлених даних
    $text=$_POST["text"];
    $first = if_not_empty($_FILES["img1"]['name'], 'image1', $row);
    $second = if_not_empty($_FILES["img2"]['name'], 'image2', $row);
    $third = if_not_empty($_FILES["img3"]['name'], 'image3', $row);
    $fourth = if_not_empty($_FILES["img4"]['name'], 'image4', $row);
    $fifth = if_not_empty($_FILES["img5"]['name'], 'image5', $row);
    $six = if_not_empty($_FILES["img6"]['name'], 'image6', $row);
    $seven = if_not_empty($_FILES["img7"]['name'], 'image7', $row);
    $text_db = "UPDATE portfolio_products SET product_id='$card_id',text='$text',image1='$first',
    image2='$second',image3='$third',image4='$fourth',image5='$fifth',image6='$six',image7='$seven' WHERE id='$id'";
    $mysqli->query($text_db);
    update_image($row['image1'], $first, 'img1');
    update_image($row['image2'], $second, 'img2');
    update_image($row['image3'], $third, 'img3');
    update_image($row['image4'], $fourth, 'img4');
    update_image($row['image5'], $fifth, 'img5');
    update_image($row['image6'], $six, 'img6');
    update_image($row['image7'], $seven, 'img7');
     echo '<script>window.location.href="card_info.php"</script>';
 }



?>



</body>