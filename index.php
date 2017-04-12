<?php
	session_start();
	include("config.inc.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ajax Shopping Cart</title>
	<link href="style/style2.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/cart.js"></script>
</head>

<body>

<div id="kepala">
	<div id="tajuk">The Lipstick Shop</div>
</div>

<div id="mainbox">
<a href="#" class="cart-box" id="cart-info" title="View Cart">
<?php 
	if(isset($_SESSION["products"])) {
		echo count($_SESSION["products"]); 
	}
	else {
		echo 0; 
	}
?>
</a>


<div class="shopping-cart-box">
	<a href="#" class="close-shopping-cart-box" >Close: X</a>
	<h3>Shopping Cart</h3>
	<div id="shopping-cart-results"></div>
</div>

<?php
//List products from database
$results = $mysqli_conn->query("SELECT product_name, product_desc, product_code, product_image, product_price FROM products_list");
//Display fetched records as you please

$products_list =  '<ul class="products-wrp">';

while($row = $results->fetch_assoc()) {
$products_list .= <<<EOT
<li>
<form class="form-item">
<div class="namaprod">{$row["product_name"]}</div>
<div class="product"><img src="images/{$row["product_image"]}"></div>
<div class="priceprod">Price : $currency {$row["product_price"]}</div>
<div class="subprod">{$row["product_desc"]}</div>
<div class="item-box">
	
	<div>
    Qty :
    <select name="product_qty">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
	</div>
	
	
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit">Add to Cart</button>
</div>
</form>
</li>
EOT;

}
$products_list .= '</ul></div>';

echo $products_list;
?>


<div id="kakinya">siti zulaikha for web programming exercise  number three</div>

</body>
</html>