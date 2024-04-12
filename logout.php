<?php

session_start();

if(isset($_SESSION['uname']))
{
	unset($_SESSION['uname']);

}

header("Location: login.php");
die;