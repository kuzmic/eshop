<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shopping Cart</title>


    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--skuska boostrap--------------------->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <!----koniec skusky boostrap------------------->



</head>
<body>
<div class="container">
<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 04.01.16
 * Time: 10:27
 */


//$name = $_get['product_name'];

//UPDATE products SET product_name='toyota' WHERE product_name='audi';


$id = $_GET['id'];


include_once("config.php");
$results = $mysqli->query("SELECT product_name , product_code , price , product_img_name  FROM products WHERE id=$id");
if ($results) {
    echo '<table>';
    while ($obj = $results->fetch_object()) {

        echo '
<form name="" method="post" action="editSave.php" role="form" >
<div class="form-group">

    <div class="form-group">

        <label for="product_name">Nname</label>
        <input id="product_name" value="' . $obj->product_name . '" type="text" class="form-control" name="product_name"></br>


        <label for="product_name">Code</label>
        <input id="product_code" value="' . $obj->product_code . '" type="text" class="form-control" name="product_code"></br>

        <label for="price">Price</label>
        <input id="price" value="' . $obj->price . '" type="text" class="form-control" name="price"></br>

        <label for="product_desc">Description</label>
        <input id="product_desc" value="' . $obj->product_desc . '" type="text" class="form-control" name="product_desc"></br>

        <label for="product_img_name">Image name</label>
        <input id="product_img_name" value="' . $obj->product_img_name . '" type="text" class="form-control" name="product_img_name"></br>


       <div style="display:none;"> <input name="id" value="' . $id . '"></div>

    </div>

    <button type="submit" class="btn btn -default">edit</button>
 </div>
</form>';

    }
}




$results = $mysqli->query("select product_desc  FROM products WHERE id = " . $id);
echo  $obj->product_desc ;
?>

    </div>
</body></html>
