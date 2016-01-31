<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 04.01.16
 * Time: 15:20

 */
include_once("config.php");

$name = $_POST['product_name'];
$code = $_POST['product_code'];
$price = $_POST['price'];
$id = $_POST['id'];
$desc =$_POST['product_desc'];
$product_img_name =$_POST['product_img_name'];


$sql = " UPDATE products SET product_name = '$name' WHERE id = " . $id ;  //sql prikaz edituj nazov
//

$results = $mysqli->query($sql);  //spustenie sql prikazu pre edituj nazov
echo $sql;


$sql = " UPDATE products SET product_code = '$code' WHERE id = " . $id; //sql prikaz edituj code
//

$results = $mysqli->query($sql);  //spustenie sql prikazu edituj code
echo $sql;

$sql = " UPDATE products SET price = '$price' WHERE id = " . $id; //sql prikaz edituj cenu
//

$results = $mysqli->query($sql);  //spustenie sql prikazu edituj cenu
echo $sql;


$sql = " UPDATE products SET product_desc = '$desc' WHERE id = " . $id; //sql prikaz edituj popis
//

$results = $mysqli->query($sql);  //spustenie sql prikazu edituj popis
echo $sql;


$sql = " UPDATE products SET product_img_name = '$product_img_name' WHERE id = " . $id; //sql prikaz edituj nazov obrazka
//

$results = $mysqli->query($sql);  //spustenie sql prikazu edituj nazov obrazka
header("location:/eshop/productList.php");
exit;