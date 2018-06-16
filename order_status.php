<?php 
session_start();
error_reporting(0);
include("admin_navbar.php");
if (isset($_SESSION["admin"])) 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
<div class="container-fluid">
	<label for="search">Search</label>
<form action="order_status.php" method="GET">
	<input type="text" name="search" placeholder="Search..." class="col-md-6">
	<input type="submit" name="s_submit" value="Search">
</form>
<br><br>
<h4 class="text-center">Search Result</h4>
<table class="table" style="background-color: #82E0AA;color: black;overflow-x: auto;">
<?php 
if (isset($_GET["search"])) 
{
	$search = $_GET["search"];
	$sltreg = "SELECT * FROM medi_register";
	if ($result = mysqli_query($localconnect,$sltreg)) 
	{
		echo "<tr>";
		echo "<td>Serial ID</td>";
		echo "<td>Order ID</td>";
		echo "<td>Item ID</td>";
		echo "<td>Item Name</td>";
		echo "<td>Quentity</td>";
		echo "<td>Price</td>";
		echo "<td>Username</td>";
		echo "<td>Status</td>";
		echo "<td>DELIVERY DATE</td>";
		echo "<td>CHANGE</td>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($result)) 
		{
			$sltuser = $row["email"];
			$order_table = $row["order_tbl_id"];
			// echo "order table :".$order_table."<br>";
			// echo "order table:".$sltuser.":".$order_table."<br>";
				$sltorder = "SELECT * FROM $order_table WHERE serialid LIKE '$search' OR orderid LIKE '$search' OR 
				iid LIKE '$earch' OR iname LIKE '$search' OR QTY LIKE '$search' OR username LIKE '$search' OR 
				status LIKE '$search' OR delivery_date LIKE '$search' OR IPRICE LIKE '$search'";
			if ($result3 = mysqli_query($localconnect,$sltorder))
			{
				// echo "<script>alert('while block');</script>";
				while ($row3 = mysqli_fetch_array($result3))
				{
					// echo "<script>alert('inside while block');</script>";
					echo "<tr>";
					echo "<td>".$row3["serialid"]."</td>";
					$serialid = $row3["serialid"];
					echo "<td>".$row3["orderid"]."</td>";
					echo "<td>".$row3["iid"]."</td>";
					$iid = $row2["iid"];
					echo "<td>".$row3["iname"]."</td>";
					echo "<td>".$row3["QTY"]."</td>";
					echo "<td>".$row3["IPRICE"]."</td>";
					echo "<td>".$row3["username"]."</td>";
					$username = $row3["username"];
					echo "<td>".$row3["status"]."</td>";
					echo "<td>".$row3["delivery_date"]."</td>";
					echo "<td><a href='order_status.php?orderid=$serialid&order_table=$order_table'>Edit status</a></td>";
					echo "</tr>";
				}
			}
			else
			{
				echo mysqli_error($localconnect);
			}
		}
		
	}
	else
	{
		echo mysqli_error($localconnect);
	}
}
 ?>
</table>
<hr><br>
</div>

<hr/>

<?php
		if (isset($_GET["orderid"])) 
				{
					$orderid = $_GET["orderid"];
					$ordtbl = $_GET["order_table"];
					echo "<h3> Edit Order Status for 	</h3>".$ordtbl."<br>";
					// echo "Order table:".$order_table."<br>";
					echo "<div class='container-fluid'>";
					echo "<table class='table' style='overflow-x:auto;'>";
					echo "<form action='order_status.php' method='GET' class='form-control'>";
					echo "<tr>";
					echo "<td><select name='status' class='form-control''>
						<option value='prepare for dispatch'>Prepare for dispatch</option>
						<option value='on the way'>On teh Way</option>
						<option value='out for delivery'>Out for delivery</option>
						<option value='delivered'>Delivered</option>
						<option value='Return'>Return</option>
					</select></td>";
					// echo "<td><input type='date' class='form-control' name='d_date'></td>";
					echo "<input type='hidden' value='$orderid' name='orderid'>";
					echo "<input type='hidden' value='$ordtbl' name='ordtbl'>";
					echo "</tr>";
					echo "<tr>";
					echo "<td><input type='submit' value='submit' name='submit' class='btn btn-success'></td>";
					echo "</tr>";
					echo "</form>";
					echo "</table>";
					echo "</div>";
					if (isset($_GET["submit"])) 
					{
						$orderid = $_GET["orderid"];
						$status = $_GET["status"];
						$ordtbl = $_GET["ordtbl"];
						$d_date = date('y/m/d');
						// echo $orderid."<br>";
						// echo "Order table:".$ordtbl."<br>";
						$updtorder = "UPDATE $ordtbl SET status = '$status', delivery_date = '$d_date' WHERE serialid = '$orderid'";
						
						if($status=="devivered"){
						$con=mysql_connect("localhost","root","");
						mysql_select_db("woodstock",$con);
						
						$res=mysql_query("select * from furniture where c_id='$iid'",$con);
						while($row=mysql_fetch_array($res))
						{
							$tot=$row["total"];
						}
						$cnt=$tot-$qty;
						
					//		echo "<script>alert('.$cnt.')</script>";
						$res1=mysql_query("update furniture set total='$cnt' where c_id='$iid'",$con);
											
						
						}
							if (mysqli_query($localconnect,$updtorder)) 
							{
								echo "<script>alert('Status updated successfully')</script>";
								// echo $status;
								// echo "<br>Order table:".$ordtbl;
								// echo "<br>Order id:".$orderid;
								echo "<script>window.location.href='order_status.php'</script>";
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
				}


?>
<div class="container-fluid">
	<div class="row">
		<table class="table" style="overflow-x: auto;">
			<tr>
				<td>Serial ID</td>
				<td>Order ID</td>
				<td>Item ID</td>
				<td>Item Name</td>
				<td>Quantity</td>
				<td>Price</td>
				<td>Username</td>
				<td>Status</td>
				<td>DELIVERY DATE</td>
				<td>CHANGE</td>
			</tr>
			<?php 
			$username = $_SESSION["username"];
			$iid;
			$qty;
			$order_table;
				$perpage = 5;
	if(isset($_GET["page"])){
	$page = intval($_GET["page"]);
	}
	else {
		$page = 1;
		}
		$calc = $perpage * $page;
		$start = $calc - $perpage;

				$sltreg = "SELECT * FROM medi_register";
				if ($result = mysqli_query($localconnect,$sltreg)) 
				{
					while ($row = mysqli_fetch_array($result)) 
					{
						$sltuser = $row["email"];
						$order_table = $row["order_tbl_id"];
						
						// echo "order table:".$sltuser.":".$order_table."<br>";

						$sltorder = "SELECT * FROM $order_table limit $start,$perpage";
						if ($result2 = mysqli_query($localconnect,$sltorder)) 
						{
							while ($row2 = mysqli_fetch_array($result2)) 
							{
								echo "<tr>";
								echo "<td>".$row2["serialid"]."</td>";
								$serialid = $row2["serialid"];
								echo "<td>".$row2["orderid"]."</td>";
								echo "<td>".$row2["iid"]."</td>";
								$iid = $row2["iid"];
								echo "<td>".$row2["iname"]."</td>";
								echo "<td>".$row2["QTY"]."</td>";
								$qty=$row2["QTY"];
								echo "<td>".$row2["IPRICE"]."</td>";
								echo "<td>".$row2["username"]."</td>";
								$username = $row2["username"];
								echo "<td>".$row2["status"]."</td>";
								echo "<td>".$row2["delivery_date"]."</td>";
								echo "<td><a href='order_status.php?orderid=$serialid&order_table=$order_table'>Edit status</a></td>";
								echo "</tr>";
							}
						}
					}
				}
		
			 ?>
		</table>
	</div>
</div>	
<?php
if(isset($page))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("woodstock",$con);
	$result = mysql_query($con,"select Count(*) As Total from $order_table");
	$rows = mysql_num_rows($result);
if($rows)
{
 
	$rs = mysql_fetch_assoc($result);
 
	$total = $rs["Total"];
}

$totalPages = ceil($total / $perpage);
if($page <=1 ){
	echo "<span id='page_links' style='font-weight: bold;'>Prev</span>";
}
else{
	
	$j = $page - 1;
echo "<span><a id='page_a_link' href='order_status.php?page=$j'>< Prev</a></span>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
		echo "<span><a id='page_a_link' href='order_status.php?page=$i'>$i</a></span>";
	}
	else{
		echo "<span id='page_links' style='font-weight: bold;'>$i</span>";

	}
}
if($page == $totalPages )
{
echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";
}
else{
	$j = $page + 1;
	echo "<span><a id='page_a_link' href='order_status.php?page=$j'>Next> </a></span>";
}


}

?>


</body>
</html>
<?php 
}
else
{
	echo "<script>alert('please login');</script>";
	echo "<script>window.location.href='index.php';</script>";
}
?>
