<?php

session_start();

if(isset($_POST['submit'])){

   $fname = $_POST['fname'];
   $fname = filter_var($fname, FILTER_SANITIZE_STRING);
   $lname = sha1($_POST['lname']);
   $lname = filter_var($lname, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $tel1 = sha1($_POST['tel1']);
   $tel1 = filter_var($tel1, FILTER_SANITIZE_STRING);
   $tel2 = $_POST['tel2'];
   $tel2 = filter_var($tel2, FILTER_SANITIZE_STRING);
   $email = sha1($_POST['email']);
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $uname = sha1($_POST['uname']);
   $uname = filter_var($uname, FILTER_SANITIZE_STRING);
   $upass = sha1($_POST['upass']);
   $upass = filter_var($upass, FILTER_SANITIZE_STRING);
   $plans = sha1($_POST['plans']);
   $plans = filter_var($plans, FILTER_SANITIZE_STRING);

}
 ?>


<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="doc/registration/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="doc/icon.png">
	<link rel="stylesheet" type="text/css" href="doc/navigation.css">
</head>

<body>

<div class="topnav">
    <img class="logo" src="doc/logo.png" width="130" height="25">
    <a class="active" href="login.php">Log in</a>
    <a href="contact.html">Contact</a>
    <a href="about.html">About</a>
    <a href="membership_plans.html">Membership</a>
    <a href="image_gallery.html">Gallery</a>
    <a href="supplements.php">Supplements</a>
    <a href="Equipments.html">Workout Machine</a>
    <a href="home.html">Home</a>
</div>

<section>

<div class='form-box'>
<div class='form-value'>

<form action="connect.php" method="post">

<h2>Registration Form</h2>

<div class="inputbox">
<label for="">First Name : </label>
<input type="text" name="fname" required>
</div>

<div class="inputbox">
<label for="">Last Name : </label>
<input type="text" name="lname" required>
</div>

<div class="inputbox">
<label for="">Address : </label>
<input type="address" name="address" required>
</div>

<div class="inputbox">
<label for="">Telephone 1 : </label> <ion-icon name="call-outline"></ion-icon>
<input type="text" name="tel1" required>

</div>

<div class="inputbox">
<label for="">Telephone 2 : </label> <ion-icon name="call-outline"></ion-icon>
<input type="text" name="tel2" >

</div>

<div class="inputbox">
<label for="">Email : </label> <ion-icon name="mail-outline"></ion-icon>
<input type="email" name="email"  required>

</div>

<div class="inputbox">
<label for="">User Name : </label>
<input type="input" name="uname"  required>

</div>

<div class="inputbox">
<label for="">Password : </label>
<input type="password" name="upass"  required>

</div>


Plans: 
<select name="plans">
<option>Basic</option>
<option>Standard</option>
<option>Premium</option>
</select>


<div class="forget"><button type="submit" class="button-73" name="submit">submit this form</button></div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</section>
<script>
  <?php
  // Check if the session variable is set
  if (isset($_SESSION['alert'])) {
    // Display the alert message using JavaScript
    echo "alert('{$_SESSION['alert']}');";
    // Unset the session variable
    unset($_SESSION['alert']);
  }
  ?>
</script>
</body>
</html>
