<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>

<html>
    <head>
        <title>Cart</title>
    <link rel="stylesheet" href="doc/registration/styles.css">
	<link rel="stylesheet" type="text/css" href="doc/navigation.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
	
	<div class="topnav">
    <img class="logo" src="doc/logo.png" width="130" height="25">
    <a class="active" href="login.php">Log in / Register</a>
    <a href="contact.html">Contact</a>
    <a href="about.html">About</a>
    <a href="membership_plans.html">Membership</a>
    <a href="image_gallery.html">Gallery</a>
    <a href="supplements.php">Supplements</a>
    <a href="Equipments.html">Workout Machine</a>
    <a href="home.html">Home</a>
</div>
    <div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table" border="1" width="80%">
<tbody>
<tr>
<td></td>
<th>ITEM NAME</th>
<th>QUANTITY</th>
<th>UNIT PRICE</th>
<th>ITEMS TOTAL</th>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="200" height="200" />
</td>
<td align="center"><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" /><br/>
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td align="center">
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
    <?php 
      for($i = 1; $i <= 5; $i++) {
        $selected = ($product["quantity"] == $i) ? "selected" : "";
        echo "<option value='{$i}' {$selected}>{$i}</option>";
      }
    ?>
    </select>
</form>
</td>
<td align="center"><?php echo "$".number_format($product["price"], 2); ?></td>
<td align="center"><?php echo "$".number_format($product["price"]*$product["quantity"], 2); ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]*100);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".number_format($total_price/100, 2); ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</body>
</html>