<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 20:34
 */

include_once("config.php");

$name = $_POST['product_name'];
$code = $_POST['product_code'];
$image = $_POST['product_img_name'];
$price = $_POST['price'];
$desc = $_POST['product_desc'];







$sql = "INSERT INTO `products` (`product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
( '$code', '$name', '$desc', '$image',$price)";



$results = $mysqli->query($sql);

//echo $sql . '</br> ';
//echo 'data ulozene'  . '</br> ';
//echo $results;
//echo '<a href="productList.php">product list</a>'  . '</br> ';
//echo '<a href="addProduct.html">add product</a>';
header("location:/eshop/productList.php");
exit;