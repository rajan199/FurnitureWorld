<?php 
session_start();
error_reporting(0);
if (isset($_POST["r_submit"])) 
{
	$cryptpass = 0;
	$name = $_POST["uname"];
	$email = $_POST["username"];
	$gender = $_POST["r_gender"];
	//$contact = $_POST["phone"];
	if(!empty($_POST["phone"])) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$_POST["phone"])) // phone number is valid
    {
      $contact = '0' . $_POST["phone"];

      // your other code here
    }
    else // phone number is not valid
    {
      //echo 'Phone number invalid !';
	  echo "<script>alert('Phone number invalid');</script>";
  echo "<script>window.location.href='register.php'</script>";
    	
	die();
	}
}
else // phone number is empty
{
	  echo "<script>alert('You must provid a phone number !');</script>";
      echo "<script>window.location.href='register.php'</script>";
    
	die();
	
  //echo 'You must provid a phone number !';
}
	$dob = $_POST["dob"];
	$password = $_POST["pass"];
	$repassword = $_POST["rpass"];

	$localconnect = new mysqli("localhost", "root", "", "woodstock");
	if($localconnect->connect_error)
	{
		die("connection failed". $localconnect->connect_error);	
	}
	if(empty($name) and empty($email) and empty($gender) and empty($contact) and empty($dob) and empty($password) and empty($repassword))
	{
		echo "Empty fields";
		die();
		
	}
	if($password !== $repassword)
	{
		echo "<script>alert('Password did not match');</script>";
		echo "<script>window.location.href='medi_reg.php'</cript>";
	}
	$md5pass = md5($password);
	$sha1pass = sha1($md5pass);
	$cryptpass = crypt($sha1pass,'pk');
	$cartid = uniqid();
	$orderif = uniqid();
	$active="false";
   $random_alpha = md5(rand());
   $captcha = substr($random_alpha, 0, 10);
   $code=$_POST["username"].$captcha;
		
	if($_POST["captcha_code"]==$_SESSION["captcha_code"])
	{
	$reg_order = "CREATE TABLE $orderif (serialid varchar(100) PRIMARY KEY, orderid varchar(100), iid varchar(100), 
	iname varchar(100), QTY int(20) DEFAULT '1', IPRICE int, username varchar(100), 
	status varchar(20) DEFAULT 'prepare for dispatch', delivery_date date null)";
	$reg_insrt = "INSERT INTO medi_register (name , email , gender , contact , dob , password, cart_nm,order_tbl_id,status,link) 
				values ('$name','$email','$gender','$contact','$dob','$cryptpass','$cartid','$orderif','$active','$code')";
	$reg_crt = "CREATE TABLE $cartid (itemid varchar(100) PRIMARY KEY , price varchar(100), iname varchar(100), QTY int DEFAULT '1', IPRICE int,status varchar(100))";
	$reg_slt = "SELECT * FROM medi_register WHERE email = '$email' and password = '$cryptpass'";
	$sltrow1 = mysqli_fetch_array($localconnect->query($reg_slt));
	echo $sltrow1["email"];
	// $reg_updt = "UPDATE medi_register SET 'cart_nm' = '$cartid' WHERE email = '$email' ";
	if ($localconnect->query($reg_insrt)===TRUE)
	{
		if (($localconnect->query($reg_crt)) === TRUE AND ($localconnect->query($reg_order) === TRUE ))
		{
			$v = $_SESSION["username"]= $sltrow1["email"];
			echo "<script>alert('Your are Registered successfully and you shuld have to verify your account through email than you can able to log in to website');</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
		else
		{
			echo "alert('Have some registration problem');";
			echo "<script>window.location.href='index.php'</script>";
		}
	}
	else
	{
	//	echo mysqli_error($localconnect);
		 echo "<script>alert('Email ID already registered.')</script>";
		 echo "<script>window.location.href='register.php'</script>";
		die();
	}
				error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
			require_once "phpmailer/class.phpmailer.php";

				$captcha_code="http://localhost/WOODSTOCK-master/x.php?id=".$code;

				$message = $captcha_code;


			// creating the phpmailer object
			$mail = new PHPMailer(true);

			// telling the class to use SMTP
			$mail->IsSMTP();

			// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
			$mail->SMTPDebug = 0;

			// enable SMTP authentication
			$mail->SMTPAuth = true;

			// sets the prefix to the server
		$mail->SMTPSecure = 'ssl';
		//$mail->SMTPSecure = 'tls';

			// sets GMAIL as the SMTP server
		//	$mail->Host = 'smtp.gmail.com';
			$mail->Host = 'smtp.gmail.com';

			// set the SMTP port for the GMAIL server
			$mail->Port = 465;
//			$mail->Port = 587;

			// your gmail address
			$mail->Username = 'jayjalarammedicine@gmail.com';

			// your password must be enclosed in single quotes
			$mail->Password = 'jjm123456';

			// add a subject line
			$mail->Subject = ' Verification for Website ';

			// Sender email address and name
			$mail->SetFrom('shoppingcart606@gmail.com', 'Furnitures world');

			$email1=$_POST["username"];
			// reciever address, person you want to send
			$mail->AddAddress($email1);

			// if your send to multiple person add this line again
			//$mail->AddAddress('tosend@domain.com');

			// if you want to send a carbon copy
			//$mail->AddCC('tosend@domain.com');


			// if you want to send a blind carbon copy
			//$mail->AddBCC('tosend@domain.com');

			// add message body
			$mail->MsgHTML($message);


			// add attachment if any
			//$mail->AddAttachment('time.png');

			try {
			    // send mail
				
				
			    $mail->Send();
			    $msg = "Mail send successfully";
			} catch (phpmailerException $e) {
			    $msg = $e->getMessage();
				echo $msg;
			} catch (Exception $e) {
			    $msg = $e->getMessage();
				echo $msg;
			}


	}
	else{
		echo '<script type="text/javascript">';
		echo "alert('Please Confirm the correct password');";
 echo "window.location = 'register.php';";

 echo "</script>"; 
	}
}//button
$localconnect->close();
 ?>