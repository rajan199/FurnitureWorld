<?php 
session_start();
include("config.php");
include("navbar.php");
if (isset($_SESSION["username"])) 
{
	$username = $_SESSION["username"];
	// echo "$username";
	$sltcrt = "SELECT * FROM medi_register WHERE email='$username'";
	$cart_nm='';
	$order_table = '';
	if ($localconnect->query($sltcrt)) 
	{
		$result = mysqli_query($localconnect,$sltcrt);
		$row=mysqli_fetch_array($result);
		$cart_nm = $row["cart_nm"];
		$sltitem = "SELECT * FROM $cart_nm where status='cart'";
	}
	 ?>
	 <!DOCTYPE html>
	 <html lang="en">
	 <head>
	 	<meta charset="UTF-8">
	 	<title>Cart</title>
		
<link href="bootstrap3.css" rel="stylesheet"> 
	 </head>
	 <body>
	 	<div class="container" style="background-color: #FBFCFC">
	 		<div class="row" style="overflow-x: auto;">
	 			<div class="col-md-12">
	 				<table class="table col-xs-12 col-sm-12" >
	 					<tbody>
	 								<?php 
	 								$item_t_cost=0;
	 									if ($localconnect->query($sltitem)) 
										{
											$result2=mysqli_query($localconnect,$sltitem);
											while ($row2 = mysqli_fetch_array($result2)) 
											{
												echo "<tr>";
												$id = $row2["itemid"];
												$sltimg = "SELECT * FROM furniture WHERE c_id = '$id'";
												$result3 = mysqli_query($localconnect,$sltimg);
												$row3 = mysqli_fetch_array($result3);
												$aprice = $row3["cost"]; 
												echo "<td><a href='woodstock.php?id=$id'>".$row2["iname"]."</a></td>";
												echo "<td>".$row2["IPRICE"]."</td>";
												echo "<form action='cart.php' method='GET'>";
												echo "<td><input type='number' min='0' name='qty' class='col-md-3' value='".$row2["QTY"]."'>";
												echo "&nbsp;<input type='submit' name='update' value='Edit quentity' class='btn btn-secondary'></td>";
												echo "<input type='hidden' value='$id' name='iid'>";
												echo "</form>";
												echo "<td><a href='cart.php?del=$id'>
													<img src='images/delete-button.png' width='50px' height='50px'>
												</a></td>";
												echo "<td><img src='".$row3["image"]."' width=200px height=130px></td>";
												echo "</tr>";
												
												//$item_t_cost= $item_t_cost+$row3["cost"];
												$item_t_cost= $item_t_cost+$row2["IPRICE"];
												
											//	echo "<h3>".$row2["IPRICE"]."</h3>";
											//	echo "<h3> final amount".$item_t_cost."</h3>";
											}
										}
	 								 ?>
	 						</tr>
	 					</tbody>
	 				</table>
	 			<?php 
	 				$sltrow = "SELECT * FROM $cart_nm where status='cart'";
	 				$result4 = mysqli_query($localconnect,$sltrow);
	 				if (mysqli_num_rows($result4)==0) 
	 				{
	 					echo "<h3 class='text-center'>Cart is empty</h3>";
	 				}
	 				else
	 				{
	 					echo "<a href='order.php?t_cost=$item_t_cost'><button class='btn btn-secondary'>Next</button></a>";
	 				}
	 			 ?>
	 			</div>
	 		</div>
	 	</div>

	 <div class="container" style="background-color: #FBFCFC">
	 	<h2 class="text-center"><u>Your order</u></h2>
	 	<div class="row">
	 		<div class="col-sm-12">
	 			<table class="table" style="overflow-x: auto;">
	 				<?php 
	- 				$order_table = $row["order_tbl_id"];
	 				$sltorder = "SELECT * FROM $order_table";
	 				if ($result5 = mysqli_query($localconnect,$sltorder)) 
		 			{
		 				if (mysqli_num_rows($result5)==0) 
		 				{
		 					echo "<br><h3 class='text-center' style='color:red;background-color:#CACFD2;'>You dont have any order yet</h3>";
		 				}
		 				else
		 				{
		 					echo "<tr>";
			 				echo "<th>Item Name</th>";
			 				echo "<th>Quentity</th>";
			 				echo "<th>Price</th>";
			 				echo "<th>Status</th>";
			 				echo "<th>Delivery Date</th>";
			 				echo "<th>EDIT ORDER</th>";
			 				echo "</tr>";
			 				while ($row4 = mysqli_fetch_array($result5)) 
			 				{
			 					$cncl = $row4["serialid"];
			 					echo "<tr>";
			 					echo "<td>".$row4["iname"]."</td>";
			 					echo "<td>".$row4["QTY"]."</td>";
			 					echo "<td>".$row4["IPRICE"]."</td>";
			 					echo "<td>".$row4["status"]."</td>";
			 					echo "<td>".$row4["delivery_date"]."</td>";
								
								//$d=date("YYYY-MM-DD");
								$d="2018-05-29";
			 					if (isset($row4["delivery_date"]) AND $row4["status"]=='Order return') 
			 					{
			 						echo "<td>Request accepted</td>";
									// echo "<script>window.location.href='cart.php'</script>";
			 						// echo "<td><a href='cart.php?retn=$cncl'>Return order</a></td>";	
			 					}
			 					else if(isset($row4["delivery_date"]))
			 					{
										//echo "<td><a href='cart.php?retn=$cncl'>Return order</a></td>";	
			 					}
			 					else
			 					{
			 						echo "<td><a href='cart.php?cncl=$cncl'>Cancel order</a></td>";
			 					}
			 					echo "</tr>";
			 				}	
		 				}
	 				}
	 				else
	 				{
	 					echo mysqli_error($localconnect);
	 				}
	 				if (isset($_GET["cncl"])) 
	 				{
	 					$cncl = $_GET["cncl"];
	 					$delord = "DELETE FROM $order_table WHERE serialid='$cncl'";
	 					if ($localconnect->query($delord)) 
	 					{
	 						echo "<script>alert('Item canceled');</script>";
	 						echo "<script>window.location.href='cart.php';</script>";
	 					}
	 					else
	 					{
	 						echo mysqli_error($localconnect);
	 					}
	 					// mysqli_query($localconnect,$delord);
	 				}
	 				if (isset($_GET["retn"])) 
	 				{
	 					$retid = $_GET["retn"];
	 					echo $order_table;
	 					$retord = "UPDATE $order_table SET status = 'Order return'";
	 					if(mysqli_query($localconnect,$retord))
	 					{
	 						echo "<script>alert('order return ')</script>";
	 					}
	 				}
	 				 ?>
	 			</table>
	 		</div>
	 	</div>
	 </div>
	 </body>
	 </html>
	 <?php 
}
else
{
	echo "<script>alert('please login');</script>";
	echo "<script>window.location.href='loginview.php'</script>";
}
if (isset($_GET["del"])) 
{
	$delid = $_GET["del"];
	$delcrt = "DELETE FROM $cart_nm WHERE itemid = '$delid'";
	if ($localconnect->query($delcrt)) ;
	{
		echo "<script>alert('item deleted');</script>";
		echo "<script>window.location.href='cart.php';</script>";
	}

}
if (isset($_GET["update"])) 
{
	$iid = $_GET["iid"];
	$qty = $_GET["qty"];
	$sltfur = "SELECT * FROM furniture WHERE c_id = '$iid'";
 	$row3 = mysqli_fetch_array(mysqli_query($localconnect,$sltfur));
 	$price = $row3["cost"];
 	$totalcost = $price*$qty;
	$updtcrt = "UPDATE $cart_nm SET QTY='$qty',IPRICE='$totalcost' WHERE itemid = '$iid'";
	if ($localconnect->query($updtcrt))
	{
		echo "<script>alert('Item Updated');</script>";
		echo "<script>window.location.href='cart.php';</script>";
	}
	else
	{
		echo $qty;
		echo "hello <br>";
		echo mysqli_error($localconnect);
	}
}
?>
<style>
	body
	{
		background-color: #EAEDED;
	}
</style>