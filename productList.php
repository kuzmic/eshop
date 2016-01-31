<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>cooder | productList</title>


    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--skuska boostrap--------------------->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -
    <link href="css/shop-homepage.css" rel="stylesheet">
    --koniec skusky boostrap------------------->

</head>
<body>
<div class="container">
<img src="images/cooder.png">
<div>
 <a href="index.html">preview</a>


</div>


<div class="container">
    <div class="table-responsive">
        <table class="table">
            <?php


            include_once("config.php");


            echo '<tr>';
            echo '<td>id cislo </td>';
            echo '<td>Nazov </td>';
            echo '<td>Popis </td>';


            echo '<td>img</td>';
            echo '<td>cena</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '</tr>';


            ?>
        </table>
    </div>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <?php
            $results = $mysqli->query("SELECT id,product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");  //vyber produktov z tabulky produkty zoradit podla zostupu
            if ($results) {

                while ($obj = $results->fetch_object()) {


                    echo '<tr>';

                    echo '<td>' . $obj->product_code . '</td>';                             //
                    echo '<td>' . $obj->product_name . '</td>';
                    echo '<td>' . $obj->product_desc . '</td>';
                    echo '<td>' . $obj->product_img_name . '</td>';
                    echo '<td>' . $obj->price . '</td>';
                    echo '<td><a href="delete.php?id=' . $obj->id . '"><i class="fa fa-times"></i></a></td>';     //zobrazenie presmerovania delete
                    echo '<td><a href="edit.php?id=' . $obj->id . '"><i class="fa fa-pencil-square-o"></i></a></td>';         // zobrazenei presmerovania edit

                    echo '</tr>';


                }

                echo '</table>' . '</br>';

                echo '<table>';
                echo '<tr>';
                echo '<td><a href="addProduct.html"><i class="fa fa-plus"></i> add product</a></td>';


                echo '</tr>';


            }
            ?>
        </table>
    </div>

</div>
</head>
</body>
</html>