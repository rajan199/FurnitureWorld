<?php 
session_start();
include ("config.php");
if (isset($_POST["submit"])) 
{
	$email = $_POST["uname"];
	$pass = $_POST["pass"];
	//$md5pass=md5($pass);
	//$sha1pass=sha1($md5pass);
	//$cryptpass=crypt($sha1pass,'pk');

		$con=mysql_connect("localhost","root","");
		mysql_select_db("woodstock",$con);
		$res=mysql_query("SELECT * FROM admin where username='$email' and password='$pass'",$con);
	//$localconnect = new mysqli("localhost", "root", "", "woodstock");
	$cnt=mysql_num_rows($res);
	if($cnt==1){
			echo "<script>alert('Rajan')</script>";
			header("location:admin_manage.php");
			$_SESSION["admin"] = $email;
		
	}
	else{
			echo "<script>alert('Invalid username and password')</script>";
			// echo "<script>window.location.herf='admin.html'</script>";
			echo "<script>window.location.href='admin1.php';</script>";
		
	}
	//$sltadmin = "SELECT * FROM admin";
	/*if ($localconnect->query($sltadmin)) 
	{
		$sltrow = mysqli_fetch_array($localconnect->query($sltadmin));
		$remail = $sltrow["username"];
		$rpass = $sltrow["password"];
		if (($remail === $email ) and ($rpass === $pass)) 
		{
			header("location:admin_manage.php");
			$_SESSION["admin"] = $sltrow["username"];
		}
		else
		{
			echo "<script>alert('Invalid username and password')</script>";
			// echo "<script>window.location.herf='admin.html'</script>";
			echo "<script>window.location.href='admin.html';</script>";
		}
		// echo "<script>window.location.href='admin_manage.php'<script>";
	}*/
}
 ?>