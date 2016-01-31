<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shopping Cart</title>


    <!--style pre 3 bannery muzi zeny a ostatne ...--->
    <link href="css/footer.css" rel="stylesheet" type="text/css">

    <!--skuska boostrap--------------------->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <!----koniec skusky boostrap------------------->
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

    
       <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">uStore</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Úvod</a>
                    </li>
                    <li>
                        <a href="about.html">O nás</a>
                    </li>
                    <li>
                        <a href="index.php">Obchod</a>
                    </li>
                    <li>
                        <a href="contact.html">Kontakt</a>
                    </li>

                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    
    
    
    
    
    
<h1 align="center">Products </h1>
    
    <!-----skuska----------------->
    
     <div class="container">

        <div class="row">
    <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>
            
           <div class="col-md-9"> 
             <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
             </div>
           </div>
        </div>
                </div>



<div class="container">
       <!-- View Cart Box Start -->
       <?php
       if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
       {
           echo '<div class="cart-view-table-front" id="view-cart">';
           echo '<h3>Your Shopping Cart</h3>';
           echo '<form method="post" action="cart_update.php">';
           echo '<table width="100%"  cellpadding="6" cellspacing="0">';
           echo '<tbody>';

           $total =0;
           $b = 0;
           foreach ($_SESSION["cart_products"] as $cart_itm)
           {
               $product_name = $cart_itm["product_name"];
               $product_qty = $cart_itm["product_qty"];
               $product_price = $cart_itm["product_price"];
               $product_code = $cart_itm["product_code"];
               $product_color = $cart_itm["product_color"];
               $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
               echo '<tr class="'.$bg_color.'">';
               echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
               echo '<td>'.$product_name.'</td>';
               echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
               echo '</tr>';
               $subtotal = ($product_price * $product_qty);
               $total = ($total + $subtotal);
           }
           echo '<td colspan="4">';
           echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
           echo '</td>';
           echo '</tbody>';
           echo '</table>';

           $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
           echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
           echo '</form>';
           echo '</div>';

       }
       ?>
       <!-- View Cart Box End -->
       </div>





<!-- View Cart Box End -->

<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
<form method="post" action="cart_update.php">

 <div class="col-sm-4 col-lg-4 col-md-4">

 <div class="thumbnail">
    <div class="product-thumb"> <img src="images/{$obj->product_img_name}"></div>
<div class="caption">
     <h4><a href="#">{$obj->product_name}</a>
	<h4 class="pull-right">{$obj->price}</h4>
        </h4>
 <p>{$obj->product_desc}</p>
	<div class="product-info">
	<fieldset>


    <label>
        <span>pocet</span>
        <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
        <input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="btn btn-primary">Add</button></div>
    </label>

</fieldset>


    </div>
     </div>
     </div>
     </div>
     
     </div>
       </div>

</div>

	</div></div>
	</form>
	</form>
	</li>

EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>



<!-- Products List End -->
</body>
</html>




<!--

<fieldset>

    <label>
        <span>Color</span>
        <select name="product_color">
            <option value="Black">Black</option>
            <option value="Silver">Silver</option>
        </select>
    </label>

    <label>
        <span>pocet</span>
        <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
    </label>

</fieldset>
-->