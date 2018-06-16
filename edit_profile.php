<?php 
session_start();
include("config.php");
include("navbar.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon/hospital.png" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 	<title>Edit Profile</title>
 </head>
 <body style="background-color: #D7DBDD">
 	<div class="container" style="background-color: white">
 		<div class="col-md-12" style="margin-top: 10px;">
 			<table class="table">
 			
 			<?php 
 				$username = $_SESSION["username"];
 				$sltfun = "SELECT * FROM medi_register WHERE email = '$username'";
 				if ($result = mysqli_query($localconnect,$sltfun)) 
 				{
 					$row = mysqli_fetch_array($result);
 					echo "<tr>";
 					echo "<td>Name</td>";
 					echo "<td><input type='text' class='form-control' name='uname' value='".$row["name"]."' readonly></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td>Email</td>";
 					echo "<td><input type='text' class='form-control' name='email' value='".$row["email"]."' readonly></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td>Gender</td>";
 					echo "<td><input type='text' class='form-control' name='gender' value='".$row["gender"]."' readonly></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td>Contact</td>";
 					echo "<td><input type='text' class='form-control' name='contact' value='".$row["contact"]."' readonly></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td>Date of Birth</td>";
 					echo "<td><input type='text' class='form-control' name='dob' value='".$row["dob"]."' readonly></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<form action='edit_profile.php' method='GET'>";
 					echo "<td>Old password</td>";
 					echo "<td><input type='password' class='form-control' name='inopass'></td>";
 					echo "<input type='hidden' name='oldpass' value='".$row["password"]."'>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td>New Password</td>";
 					echo "<td><input type='password' class='form-control' name='npass'></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td>Re-Password</td>";
 					echo "<td><input type='password' class='form-control' name='rnpass' ></td>";
 					echo "</td>";
 					echo "<tr>";
 					echo "<td colspan='2'><input type='submit' class='btn btn-success' name='submit' ></td>";
 					echo "</td>";
 				}
 			 ?>
 			 </form>
 			 </table>
 		</div>
 	</div>
 </body>
 </html>
 <?php 
if (isset($_GET["submit"]))
{
	$inopass = $_GET["inopass"];
		$passmd5 = md5($inopass);
		$passsha1 = sha1($passmd5);
		$passcrypt = crypt($passsha1,'pk');

	$oldpass = $_GET["oldpass"];
	$npass = $_GET["npass"];
	$rnpass = $_GET["rnpass"];
	if ($passcrypt === $oldpass) 
	{
		if($npass === $rnpass) 
		{
			$md5pass = md5($npass);
			$sha1pass = sha1($md5pass);
			$cryptpass = crypt($sha1pass,'pk');
			echo $cryptpass;
			$insfun = "UPDATE medi_register SET password = '$cryptpass' WHERE email = '$username'";
			if (mysqli_query($localconnect,$insfun))
			{
				echo "<script>alert('Password successfully Updated');</script>";
				echo "<script>window.location.href='edit_profile.php';</script>";
				// echo "Password change";
			}
			else
			{
				echo mysqli_error($localconnect);
			}

		}
		else
		{
			echo "<script>alert('Password did not');</script>";
			echo "<script>window.location.href='edit_profile.php';</script>";
			echo "not match";
		}
	}
	else
	{
		echo "<script>alert('Old password did not match');</script>";
		echo "<script>window.location.href='edit_profile.php';</script>";
	}
}
else
{
	echo mysqli_error($localconnect);
}
?>
