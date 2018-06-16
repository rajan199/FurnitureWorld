<?php 
session_start();
include("config.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Payment completed</title>
 </head>
 <body>
 	<center>	
 	<table border="1" align="center">
 		<label for="title"><h4>WOOD STOCK BILL</h4></label>
 	<?php 
 	$total_price=0;
 	$username = $_SESSION["username"];
 		if (isset($_SESSION["username"])) 
 		{
 			echo "<tr>";
 			echo "<td>Item name</td>";
 			echo "<td>Item total Price</td>";
 			echo "<td>Quentity</td>";
 			echo "</tr>";
 			$slt = "SELECT * FROM medi_register WHERE email = '$username'";
 			if ($result = mysqli_query($localconnect,$slt)) 
 			{
 				$row = mysqli_fetch_array($result);
 				$cart_name = $row["cart_nm"];
 				$sltcrt = "SELECT * FROM $cart_name";
 				if ($result2 = mysqli_query($localconnect,$sltcrt)) 
 				{
 					while ($row2 = mysqli_fetch_array($result2)) 
 					{
 						echo "<tr>";
 						echo "<td>".$row2["iname"]."</td>";
 						echo "<td>".$row2["QTY"]."</td>";
 						echo "<td>".$row2["IPRICE"]."</td>";
 						echo "</tr>";
 						$total_price += $row2["IPRICE"];
 					}
 				}
 				echo "<tr>";
 				echo "<td colspan='3' align='right'>Total price:<b> ".$total_price."</b></td>";
 				echo "</tr>";
 			}
 			echo "</table>";
 		}
 	 ?>
 	 <h4>Note: Please save the page or take a screenshot to keep the bill</h4>
 	 <a href="index.php" target="_blank"><button>Home</button></a>
 	</center>
 </body>
 </html>