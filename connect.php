<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "power_zone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$upass = $_POST['upass'];
$plans = $_POST['plans'];

// Check if the username already exists
   $sql = "SELECT * FROM registration WHERE uname = '$uname'";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      // Username already exists, display an alert
      echo "<script>alert('Username already exists');</script>";
   } else {
      // Username does not exist, insert the user into the database
      $sql = "INSERT INTO registration (fname, lname, address, tel1, tel2, email, uname, upass, plans) VALUES ('$fname', '$lname', '$address', '$tel1', '$tel2', '$email', '$uname', '$upass', '$plans')";
      $result = mysqli_query($conn, $sql);
       if ($result) {
           // Data inserted successfully
           header("Location: success.html");
           exit();
}
   }
// Close the database connection
mysqli_close($conn);
?>
