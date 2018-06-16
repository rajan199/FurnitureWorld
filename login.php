<?php 
session_start();
error_reporting(-1);
$localconnect = new mysqli("localhost", "root", "", "woodstock");

if($localconnect->connect_error)
	{
		die("connection failed". $localconnect->connect_error);		
	}
$email = $_POST["log_email"];
$password = $_POST["log_pass"];

	$md5pass = md5($password);
	$sha1pass = sha1($md5pass);
	$cryptpass = crypt($sha1pass,'pk');
 if (isset($_POST["log_submit"]))
 {
 	$reg_slt = "SELECT * FROM medi_register WHERE email = '$email' and password = '$cryptpass' and status='true'";
 	if ($localconnect->query($reg_slt)) 
 	{
 		$row = mysqli_fetch_array($localconnect->query($reg_slt));
 		if (($row["email"] === $email) and ($row["password"] === $cryptpass))
	 	{
	 		$_SESSION["username"] = $row["email"];
	 		echo "<script>window.location.href='index.php';</script>";
	 	}
	 	else
	 	{
	 		echo "<script>alert('Did not logged in because Invalid Username or Password')</script>";
	 		echo "<script>window.location.href='index.php';</script>";
	 	}
 	}
	else{
			echo "<script>alert('You should have to verify your account through email to use the website')</script>";
	 		echo "<script>window.location.href='loginview.php';</script>";
	 	
	}
 }
 ?>