<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 22:08
 */

include_once("config.php");
$id = $_GET['id'];
if($id==''){
$id = $_POST['id'];

}
///$sql = "DELETE FROM `products` WHERE (`ID`) VALUES ('ID')";



$sql = ("DELETE FROM `products`WHERE id = " . $id);
$results = $mysqli->query($sql);

header("location:/eshop/productList.php");
exit;