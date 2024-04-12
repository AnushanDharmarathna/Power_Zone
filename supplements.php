<html>
    <head>
    <link rel="stylesheet" href="cart_style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Power Zone Fitness - Suplements</title>
<link rel="stylesheet" type="text/css" href="doc/navigation.css">
<link rel="stylesheet" type="text/css" href="doc/Supplements/style.css">
<link rel="shortcut icon" type="image/x-icon" href="doc/icon.png">
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

<section>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="doc/Supplements/img1.png" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="doc/Supplements/img2.png" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="doc/Supplements/img3.png" style="width:100%">
 
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>



<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<!-- MAIN (Center website) -->
<div class="main">

<h1 style="font-size:5vw;">SUPPLEMENTS</h1>
<p style="color:white; font-size:1vw;">Take your training to the next level with supplements designed to help boost energy, endurance, strength and performance.</p>
<hr width="1000vw" align="center">


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">

</div>

<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$conn,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:white;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

<?php
$cart_count = 0;
if(isset($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
?>
<div class="cart_div">
    <a href="cart.php"><img src="cart-icon.jpg" width='60' height='60' /> View Cart 
        <span><?php echo $cart_count; ?></span>
    </a>
</div>

<?php
$query = "SELECT * FROM products";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
        <form method='post' action=''>
            <input type='hidden' name='code' value=".$row['code']." />
            <div class='product_image'><img src='".$row['image']."' width='200' height='200' /></div>
            <div class='name'>".$row['name']."</div>
            <div class='price'>$".$row['price']."</div>
            <button type='submit' class='buy'>Buy Now</button>
        </form>
    </div>";
}
mysqli_close($conn);

?>



    </body>
</html>