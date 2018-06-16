<?php 
session_start();
include("config.php");
error_reporting(0);
if (isset($_SESSION["username"])) 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Select a payment method</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--	<div class="container">
		<h2 class="text-center">SELECT A PAYMENT METHOD</h2>
		<div class="row">
			<div class="col-md-6" style="background-color: #EAEDED">
				<h3 class="text-center">Credit card</h3>
				<ul>
					<li><img src="images/visa.png" width="80px" height="80px" class="img-responsive" alt=""></li> <br>
					<li><img src="images/mastercard.gif" width="80px" height="80px" class="img-responsive" alt=""></li>
				</ul>
				<p>Section</p>
				<?php 
					$orderid = $_GET["order"];
				 ?>
				<form action="payment.php" class="form-group" method="POST">
					<b>Name on Card</b><input type="text" name="name"  class="form-control" required>
				<b>Card number</b><input type="text" name="cardnum" class="form-control" required maxlength="16" minlength="16">
					<b>Expiration date</b><input type="date" name="exdate" class="form-control" required>
					<b>Pin number</b><input type="text" name="pin" class="form-control" required><br>
					<?php 
						echo "<input type='hidden' name='order' value='".$orderid."'>"
					 ?>
					<input type="submit" name="submit" value="Make payment" class="btn btn-success">
					<br>
				</form>
			</div>
			<div class="col-md-6" style="background-color:#BFC9CA;min-height: 436px">
				<h3 class="text-center">Debit card</h3>
				<?php 
					$orderid = $_GET["order"];
				 ?>
				<form method="POST" action="payment.php">
					<?php 
					echo "<input type='hidden' name='order' value='".$orderid."'>";
					 ?>
  				  	<div class="form-group">
      					<label for="sel1">Select list (select one):</label>
      					<select class="form-control" id="sel1">
        					<option>Choose an option</option>
        					<option name='master'>All visa/masterCard Debit Card</option>
        					<option >All Rupay debit Card</option>
      					</select>
      							<br>
      						<b>Name on Card</b><input type="text" name="name"  class="form-control" required>
							<b>Card number</b><input type="text" name="cardnum" class="form-control" required maxlength="16" minlength="16">
							<b>Expiration date</b><input type="date" name="exdate" class="form-control" required>
							<b>CVV</b><input type="text" name="cvv" maxlength="3" minlength="3" class="form-control" required maxlength="3" minlength="3">
							<b>Pin number</b><input type="text" name="pin" class="form-control" required><br>
							<input type="submit" name="submit1" value="Make payment" class="btn btn-success">
					</div>
  				</form>
			</div>
		</div>-->
		<hr>
		<div class="row">
			
			<div class="col-md-12" style="background-color: #EAEDED;min-height: 170px" >
				<h3>Cash on delivery</h3>
					<br><br>
					<?php 
						$orderid = $_GET["order"];
					echo "<a href='payment.php?submitoi=$orderid'>"
					 ?>
					<button class="btn btn-success" name="submito" value="place order">Place order</button><br><br>
					</a>
					<p>Makr Payment when your order reaches you.</p>
				
			</div>
		</div>
	</div>
	<hr>
	<div class="container" style="min-height: 100px;">
<!--		<a href="index.php"><button name="h1" class="btn btn-warning">Home</button></a>
		<a href="cart.php"><button name="c1" class="btn btn-danger">cancel</button></a>
-->
		<br>
	</div>
</body>
</html>





<!-- $inspymnt = "INSERT INTO payment (order_id,username,nameOnCard,cardNumber,exp_date,cvv,transection_id) 
		values('$orderid','$username','$name','$cardnum','$expdate','$cvv','$transection_id')";


		$cvv = $_POST["cvv"];
 -->




<?php 
}
$cart_name;
$order_table;
$count;
if (isset($_POST["submit"])) 
{
	if (isset($_POST["cvv"])) 
	{
		$count = 0;
		$name = $_POST["name"];
		$cardnum = $_POST["cardnum"];
		$expdate = $_POST["exdate"];
		$cvv = $_POST["cvv"];
		$pin = $_POST["pin"];
		// echo $cvv."<br>";
		$orderid = $_POST["order"];
		$username = $_SESSION["username"];
		$transection_id = uniqid();

		$sltbank = "SELECT * FROM bank";
		if ($result4 = mysqli_query($localconnect,$sltbank)) 
		{
			while($row4 = mysqli_fetch_array($result4))
			{
				
				if (($row4["card_num"]===$cardnum) AND ($row4["c_holder_nm"]==$name) AND ($row4["cvv"]===$cvv) AND ($row4["pin"]===$pin) AND ($row4["exp_date"]==$expdate) )
				{
					$count +=1;
					// ------------------
					// echo $row4["card_num"];
					$slt_reg = "SELECT * FROM medi_register WHERE email = '$username'";
					if ($result = mysqli_query($localconnect,$slt_reg)) 
					{
						$row = mysqli_fetch_array($result);
						
						$cart_name = $row["cart_nm"];
						$order_table = $row["order_tbl_id"];
						$sltcrt = "SELECT * FROM $cart_name";
						if ($result2 = mysqli_query($localconnect,$sltcrt)) 
						{	
							// $row2 = mysqli_fetch_array($result2);
							while ($row2 = mysqli_fetch_array($result2)) 
							{
								$orderid;
								$iid = $row2["itemid"];
								$iname = $row2["iname"];
								$QTY = $row2["QTY"];
								$iprice = $row2["IPRICE"];
								$username;
								$serialid = uniqid();
								$insrt_order = " INSERT INTO $order_table (serialid,orderid,iid,iname,QTY,IPRICE,username) 
								VALUES ('$serialid','$orderid','$iid','$iname','$QTY','$iprice','$username')";
								if ($localconnect->query($insrt_order)) 
								{
									// echo "<script>alert('6th if block executed');</script>";
									// echo "<script>alert('success');</script>";
									// echo mysqli_error($localconnect);
									// echo "<br><br><br>";
								}
								else
								{
									echo mysqli_error($localconnect);
								}
								// mysqli_query($localconnect,$insrt_order);

							}
						}
						else
						{
							echo mysqli_error($localconnect);
						}
					}
					else
					{
						echo mysqli_error($localconnect);
					}
					// ------------------
				}
				else
				{
					// echo "<script>alert('Wrong user details');</script>";
					// echo "<script>alert('Please do not refresh the page');</script>";
					echo mysqli_error($localconnect);
				}
			}
				if ($count==1)
				{
					$inspymnt = "INSERT INTO payment (order_id,username,nameOnCard,cardNumber,exp_date,cvv,transection_id,pin) 
					values('$orderid','$username','$name','$cardnum','$expdate','$cvv','$transection_id','$pin')";
					if ($localconnect->query($inspymnt) AND ($count==1))
					{
						echo "<script>alert('your order has been successfully placed');</script>";
						echo "<script>window.location.href='paymentdone.php';</script>";
					}
					else
					{
						// echo "hello";
						echo mysqli_error($localconnect);
						// echo die("else paymeny");
					}		
				}
				else
				{
					echo "<script>alert('Wrong user details');</script>";
					// echo "<script>alert('Please do not refresh the page');</script>";
					echo "<script>window.location.href='payment.php?order=$orderid'</script>";
				}
			
		}
		else
		{
			echo mysqli_error($localconnect);
		}
	}
	else if(!isset($_POST["cvv"]))
	{
		$name = $_POST["name"];
		$cardnum = $_POST["cardnum"];
		$expdate = $_POST["exdate"];
		// $cvv = $_POST["cvv"];
		$orderid = $_POST["order"];
		$pin = $_POST["pin"];
		$username = $_SESSION["username"];
		$transection_id = uniqid();
		
		$sltbank = "SELECT * FROM bank";
		if ($result4 = mysqli_query($localconnect,$sltbank)) 
		{
			$count = 0;
			while($row4 = mysqli_fetch_array($result4))
			{
				// echo "card number org:".$row4["card_num"]."<br>";
				// echo "card number inp:".$cardnum."<br>";
				// echo "card name org:".$row4["c_holder_nm"]."<br>";
				// echo "card number inp:".$name."<br>";
				// // echo "card cvv org:".$row4["cvv"]."<br>";
				// echo "card cvv inp:".$cvv."<br>";
				if ( ($row4["card_num"]===$cardnum) AND ($row4["c_holder_nm"]==$name) AND ($row4["pin"]===$pin)) 
				{
					$count=$count+1;
					// -----------------------------------------------
					$slt_reg = "SELECT * FROM medi_register WHERE email = '$username'";
					if ($result = mysqli_query($localconnect,$slt_reg)) 
					{
						$row = mysqli_fetch_array($result);
						
						$cart_name = $row["cart_nm"];
						$order_table = $row["order_tbl_id"];
						$sltcrt = "SELECT * FROM $cart_name";
						if ($result2 = mysqli_query($localconnect,$sltcrt)) 
						{
							// $row2 = mysqli_fetch_array($result2);
							while ($row2 = mysqli_fetch_array($result2)) 
							{
								$orderid;
								$iid = $row2["itemid"];
								$iname = $row2["iname"];
								$QTY = $row2["QTY"];
								$iprice = $row2["IPRICE"];
								$username;
								// echo "Order ID: ".$orderid."<br>";
								// echo "ITEM ID: ".$iid."<br>";
								// echo "ITEM name: ".$iname."<br>";
								// echo "Qty: ".$QTY."<br>";
								// echo "price: ".$iprice."<br>";
								// echo "Username: ".$username."<br>";
								$serialid = uniqid();
								// echo "Serial: ".$serialid."<br><br>";
								// echo "Cart name: ".$cart_name."<br>";
								// echo "Order table: ".$order_table."<br><br>";
								$insrt_order = " INSERT INTO $order_table (serialid,orderid,iid,iname,QTY,IPRICE,username,status) 
							VALUES ('$serialid','$orderid','$iid','$iname','$QTY','$iprice','$username','prepare for dispatch')";
								if ($localconnect->query($insrt_order)) 
								{
									// echo "<script>alert('success');</script>";
									// echo mysqli_error($localconnect);
									// echo "<br><br><br>";
								}
								// mysqli_query($localconnect,$insrt_order);

							}
						}
					}
					// -----------------------------------------------
				}
				else{
					$count=$count+1;
					// -----------------------------------------------
					$slt_reg = "SELECT * FROM medi_register WHERE email = '$username'";
					if ($result = mysqli_query($localconnect,$slt_reg)) 
					{
						$row = mysqli_fetch_array($result);
						
						$cart_name = $row["cart_nm"];
						$order_table = $row["order_tbl_id"];
						$sltcrt = "SELECT * FROM $cart_name";
						if ($result2 = mysqli_query($localconnect,$sltcrt)) 
						{
							// $row2 = mysqli_fetch_array($result2);
							while ($row2 = mysqli_fetch_array($result2)) 
							{
								$orderid;
								$iid = $row2["itemid"];
								$iname = $row2["iname"];
								$QTY = $row2["QTY"];
								$iprice = $row2["IPRICE"];
								$username;
								// echo "Order ID: ".$orderid."<br>";
								// echo "ITEM ID: ".$iid."<br>";
								// echo "ITEM name: ".$iname."<br>";
								// echo "Qty: ".$QTY."<br>";
								// echo "price: ".$iprice."<br>";
								// echo "Username: ".$username."<br>";
								$serialid = uniqid();
								// echo "Serial: ".$serialid."<br><br>";
								// echo "Cart name: ".$cart_name."<br>";
								// echo "Order table: ".$order_table."<br><br>";
							$insrt_order = " INSERT INTO $order_table (serialid,orderid,iid,iname,QTY,IPRICE,username,status) 
								VALUES ('$serialid','$orderid','$iid','$iname','$QTY','$iprice','$username','prepare for dispatch')";
								if ($localconnect->query($insrt_order)) 
								{
									 echo "<script>alert('success');</script>";
									 	echo "<script>window.location.href='paymentdone.php';</script>";
		
									// echo mysqli_error($localconnect);
									// echo "<br><br><br>";
								}
								// mysqli_query($localconnect,$insrt_order);

							}
						}
					}
				}
				if ($count==1) 
				{
				//	$inspymnt = "INSERT INTO payment (order_id,username,nameOnCard,cardNumber,exp_date,transection_id,pin) 
				//	values('$orderid','$username','$name','$cardnum','$expdate','$transection_id','$pin')";
			//		if ($localconnect->query($inspymnt)) 
				//	{
				//		echo "<script>alert('your order has has been successfully placed');</script>";
		//				echo "<script>window.location.href='paymentdone.php';</script>";
			//		}
				//	else
				//	{
				//		echo mysqli_error($localconnect);
					//}
				}
				else
				{
					echo "<script>alert('Wrong user details');</script>";
					// echo "<script>alert('Please do not refresh the page');</script>";
					echo "<script>window.location.href='payment.php?order=$orderid'</script>";
				}	
			}
		}
		


		
	}
	// else
	// {
	// 	echo mysqli_error($localconnect);
	// }
}
if (isset($_GET["submitoi"])) 
{
		// $name = $_POST["name"];
		// $cardnum = $_POST["cardnum"];
		// $expdate = $_POST["exdate"];
		// // $cvv = $_POST["cvv"];
		$orderid = $_GET["submitoi"];
		$username = $_SESSION["username"];
		// $transection_id = uniqid();
		$slt_reg = "SELECT * FROM medi_register WHERE email = '$username'";
		if ($result = mysqli_query($localconnect,$slt_reg)) 
		{
			$row = mysqli_fetch_array($result);
			$cart_name = $row["cart_nm"];
			$order_table = $row["order_tbl_id"];
			$sltcrt = "SELECT * FROM $cart_name";
			if ($result2 = mysqli_query($localconnect,$sltcrt)) 
			{
				while ($row2 = mysqli_fetch_array($result2)) 
				{
					$orderid;
					$iid = $row2["itemid"];
					$iname = $row2["iname"];
					$QTY = $row2["QTY"];
					$iprice = $row2["IPRICE"];
					// echo "Order ID: ".$orderid."<br>";
					// echo "ITEM ID: ".$iid."<br>";
					// echo "ITEM name: ".$iname."<br>";
					// echo "Qty: ".$QTY."<br>";
					// echo "price: ".$iprice."<br>";
					// echo "Username: ".$username."<br>";
					$serialid = uniqid();
					// echo "Serial: ".$serialid."<br><br>";
					// echo "Cart name: ".$cart_name."<br>";
					// echo "Order table: ".$order_table."<br><br>";
					$insrt_order = " INSERT INTO $order_table (serialid,orderid,iid,iname,QTY,IPRICE,username,status) 
					VALUES ('$serialid','$orderid','$iid','$iname','$QTY','$iprice','$username','prepare for dispatch')";
					if ($localconnect->query($insrt_order)) 
					{
						// echo "<script>alert('success');</script>";
							$sltfun = "SELECT * FROM furniture WHERE c_id = '$iid'";
							if ($result3 = mysqli_query($localconnect,$sltfun))
							{
								$row3 = mysqli_fetch_array($result3);
								echo "Total item".$row3["total"]."<br>";
								$t_fun = $row3["total"];
								$fun_tem = $t_fun-$QTY;
								echo "Item id :".$iid;
								echo "<br>Deducted:".$fun_tem;
								$sltupdt = "UPDATE furniture SET total = '$fun_tem' WHERE c_id = '$iid'";
								if (mysqli_query($localconnect,$sltupdt)) 
								{
									echo "item updated";
								}
								else
								{
									echo mysqli_error($localconnect);
								}
								
							}
						echo "<br><br><br>";
					}
					else
					{
						echo mysqli_error("Dublicate".$localconnect);
						echo "if 3 error";
					}
				}
					$inspymnt = "INSERT INTO payment (order_id,username,nameOnCard) 
					values('$orderid','$username','Cash on delivery')";
			
					
					if ($localconnect->query($inspymnt)) 
					{
						
						
						echo "<script>alert('your order has has been successfully placed');</script>";
						echo "<script>window.location.href='paymentdone.php';</script>";
					}
					else
					{
						echo "payment dublicate:";
						echo mysqli_error($localconnect);
					}
						// echo "<script>alert('Order has been successfully placed');</script>";
						// echo "<script>window.location.href='paymentdone.php';</script>";
			}
			else
			{
				echo "if 2 error";
				echo mysqli_error($localconnect);
			}
		}
		else
		{
			echo "if 1 error";
			echo mysqli_error($localconnect);
		}	
}
?>
<style>
li {list-style-type: none;}
</style>