<?php
session_start();
include("config.php");

				$id = $_GET["pid"];
 			 	$username = $_SESSION["username"];
 			 	
				$sltcart = "SELECT * FROM medi_register WHERE email='$username'";
 			 	$result = mysqli_query($localconnect, $sltcart);
 			 	$row2 = mysqli_fetch_array($result);
 			 	$cart_nm = $row2["cart_nm"];
 			 	$sltfur = "SELECT * FROM furniture WHERE c_id = '$id'";
 			 	$row3 = mysqli_fetch_array(mysqli_query($localconnect,$sltfur));
 			 	$price = $row3["cost"];
				$name=$row3["name"];
				$qty=1;
 			 	//$totalcost = $price*$qty;
 				$insrtcrt = "INSERT INTO $cart_nm (itemid,iname,QTY,IPRICE) VALUES ('$id','$name','$qty','$price')";
 			
			
				if ($localconnect->query($insrtcrt)) 
 				{
 					echo "<script>alert('Insert successfully');</script>";
 					echo "<script>window.location.href='woodstock.php?id=$id'</script>";
 				}
 				else
 				{
 					// echo mysqli_error($localconnect);
 					echo "<script>alert('Item already added');</script>";
 					echo "<script>window.location.href='woodstock.php?id=$id';</script>";
 				}
 		


?>