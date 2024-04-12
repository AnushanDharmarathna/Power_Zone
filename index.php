<?php
session_start();

// Check if user is logged in, redirect to login page if not
if (!isset($_SESSION['uname'])) {
    header("Location: login.php");
    exit();
}

// If logout button is clicked, unset session and redirect to login page
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}



include('connection.php');

if(isset($_SESSION['uname'])){
    $username = $_SESSION['uname'];
    
    $query = "SELECT * FROM registration WHERE uname = '$username'";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
        $fname = $row['fname'];
        $lname = $row['lname'];
        $address = $row['address'];
        $tel1 = $row['tel1'];
        $tel2 = $row['tel2'];
        $email = $row['email'];
        $uname = $row['uname'];
        $upass = $row['upass'];
        $plans = $row['plans'];
    }
    else{
        echo "Error retrieving user data";
    }
}
else{
    header("location: login.php");
}
?>

<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" href="doc/index/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<h1>Welcome <?php echo $username; ?>!</h1>
		<table>
			<tr>
				<th>First Name</th>
				<td><?php echo $fname; ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo $lname; ?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo $address; ?></td>
			</tr>
			<tr>
				<th>Telephone 1</th>
				<td><?php echo $tel1; ?></td>
			</tr>
			<tr>
				<th>Telephone 2</th>
				<td><?php echo $tel2; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>User Name</th>
				<td><?php echo $uname; ?></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><?php echo $upass; ?></td>
			</tr>
			<tr>
				<th>Membership Plan</th>
				<td><?php echo $plans; ?></td>
			</tr>
		</table>
	<form method="post">
        <button type="submit" name="logout" class="button-78">Logout</button>
    </form>
	</div>
	<br>
	
</body>
</html>






 