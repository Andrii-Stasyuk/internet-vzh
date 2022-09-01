<?php
$id=$_GET["id"];
// var_dump($id);
require "db_conect.php";
$result = $mysqli->query("SELECT * FROM products WHERE id=".$id);
$product = mysqli_fetch_array($result);
unlink('images/'.$product['image']);
$mysqli->query("DELETE FROM products WHERE id=".$id);
echo '<script>window.location.href="products.php"</script>';
?>