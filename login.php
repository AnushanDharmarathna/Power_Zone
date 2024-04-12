<?php
session_start();
include("connection.php");
include("functions.php");

$error_msg = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    if(isset($_POST['uname']) && isset($_POST['upass'])) {
        $uname = $_POST['uname'];
        $upass = $_POST['upass'];

        if(!empty($uname) && !empty($upass) && !is_numeric($uname)) {
            //read from database
            $query = "select * from registration where uname = '$uname' limit 1";
            $result = mysqli_query($conn, $query);

            if($result) {
                if($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['upass'] === $upass) {
                        $_SESSION['uname'] = $user_data['uname'];
                        header("Location: index.php");
                        die;
                    } else {
                        $error_msg = "Invalid username or password!";
                    }
                } else {
                    $error_msg = "Invalid username or password!";
                }
            } else {
                $error_msg = "Error: " . mysqli_error($conn);
            }
        } else {
            $error_msg = "Invalid username or password!";
        }
    } else {
        $error_msg = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page in HTML</title>
	<link rel="stylesheet" href="doc/login/login_style.css">
	<link rel="stylesheet" type="text/css" href="doc/navigation.css">
	
<style>
body 
{
  font-family:Arial; 
  background: url("doc/login/bg.jpg")no-repeat;
  background-size: cover;
  color:whitesmoke;
}
.content
{
	position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
	}
	
input[type=text], input[type=password]{
    width: 100%;
    margin: 10px 0;
    border-radius: 5px;
    padding: 15px 18px;
    box-sizing: border-box;
  }
button {
    background-color: #030804;
    color: white;
    padding: 14px 20px;
    border-radius: 5px;
    margin: 7px 0;
    width: 100%;
    font-size: 18px;
  }

button:hover {
    opacity: 0.6;
    cursor: pointer;
  }
  
form{
    width:35rem;
	margin:auto;
	background: transparent;
	border: 2px solid rgba(255,255,255,0.5);
	border-radius: 20px;
	backdrop-filter: blur(15px);	
}

.headingsContainer{
    text-align: center;
}
.mainContainer{
    padding: 16px;
}
.subcontainer{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}

.subcontainer a{
    font-size: 16px;
    margin-bottom: 12px;
}
span.forgotpsd a {
    float: right;
    color: whitesmoke;
    padding-top: 16px;
  }

.forgotpsd a{
    color: rgb(74, 146, 235);
  }
  
.forgotpsd a:link{
    text-decoration: none;
  }

  .register{
    color: white;
    text-align: center;
  }
  
  .register a{
    color: rgb(74, 146, 235);
  }
  
  .register a:link{
    text-decoration: none;
  }
@media screen and (max-width: 600px) {
  form{
    width: 25rem;
  }

}

@media screen and (max-width: 400px) {
  form{
    width: 20rem;
  }
	

</style>
</head>
<body>

<div class="topnav">
    <img class="logo" src="doc/logo.png" width="130" height="25">
    <a class="active" href="registration.php">Registration</a>
    <a href="contact.html">Contact</a>
    <a href="about.html">About</a>
    <a href="membership_plans.html">Membership</a>
    <a href="image_gallery.html">Gallery</a>
    <a href="supplements.php">Supplements</a>
    <a href="Equipments.html">Workout Machine</a>
    <a href="home.html">Home</a>
</div>
  </div>
  
    <div class="content">
    <form method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h1>Log in</h1>
            <p>Log in with your username and password</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="uname">Your username</label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <br><br>

            <!-- Password -->
            <label for="upass">Your password</label>
            <input type="password" placeholder="Enter Password" name="upass" required>

            <!-- sub container for the checkbox and forgot password link -->
            <div class="subcontainer">
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                
            </div>


            <!-- Submit button -->
            <button type="submit">Login</button>

            <!-- Sign up link -->
            <p class="register">Not a member?  <a href="registration.php">Register here!</a></p>

        </div>

    </form>
	</div>
	<?php if(!empty($error_msg)): ?>
        <p><mark><?php echo $error_msg; ?></p></mark>
    <?php endif; ?>
</body>
</html>
