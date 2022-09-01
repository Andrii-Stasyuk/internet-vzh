<?php session_start(); ?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Document</title>
</head>
<body>
    <?php 
     
    // if($_SESSION['status']!=="1"){
    //    echo "<script>window.location.href='/'</script>";
    // }


     require "db_conect.php"; 
      $result =  $mysqli->query('SELECT * FROM `price`');
      $fetch_res = mysqli_fetch_array($result);

     ?>
<div class="container">
    <form action="send-price.php" method="POST">
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <label for="exampleInputEmail1">Ціна Влітку</label>
        <input  name="summer_price"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <label for="exampleInputEmail1">Ціна Взимку</label>
        <input  name="winter_price"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <button value='true' type='submit' class="file-button" name='button'>Відправити</button>
    </form>
</div> 
<table class="table">
  <thead>
    <tr>
      <th scope="col">Ціна Влітку</th>
      <th scope="col">Ціна Взимку</th>
      
    </tr>
  </thead>
  <tbody>
      <tr>
        <!-- <th scope="row">1</th> -->
        <td><?php echo $fetch_res['summer_price']; ?></td>
        <td><?php echo $fetch_res['winter_price']; ?></td>
       
      </tr>
</table>
</body>
</html>
<?php 

 

  
 
 ?>
