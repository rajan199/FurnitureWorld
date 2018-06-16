<?php 
session_start();
error_reporting(0);
include("config.php");
include("admin_navbar.php");
if (isset($_SESSION["admin"])) 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/simplePagination.css" />
  <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="dist/jquery.simplePagination.js"></script>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
<body>
	<label for="search">Search</label>
<form action="admin_order.php" method="GET">
	<input type="text" name="search" class="col-md-6">
	<input type="submit" name="submit" value="Search">
</form> 
<br>
<table class="table" style="background-color: #82E0AA;color: black;">
<?php 
if (isset($_GET["search"])) 
{
	$sltorder = "SELECT * FROM order_table";
	if ($result = mysqli_query($localconnect,$sltorder)) 
	{
		if ($count = mysqli_num_rows($result) > 0) 
		{
			echo "<tr>";
			echo "<td colspan='10'>Search result</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Order id</td>";
			echo "<td>Username</td>";
			echo "<td>Name</td>";
			echo "<td>Address</td>";
			echo "<td>City</td>";
			echo "<td>State</td>";
			echo "<td>Pincode</td>";
			echo "<td>Emailid</td>";
			echo "<td>Phone number</td>";
			echo "<td>Status</td>";
			while ($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>".$row["order_id"]."</td>";
				echo "<td>".$row["username"]."</td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["address"]."</td>";
				echo "<td>".$row["city"]."</td>";
				echo "<td>".$row["state"]."</td>";
				echo "<td>".$row["pincode"]."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["phone"]."</td>";
				echo "<td>".$row["status"]."</td>";
				echo "</tr>";
			}	
		}
	}
}
 ?>
</table>
<table class="table table-striped">
<form action="get">
	<tr>
		<td>Order id</td>
		<td>Username</td>
		<td>Name</td>
		<td>Address</td>
		<td>City</td>
		<td>State</td>
		<td>Pincode</td>
		<td>Emailid</td>
		<td>Phone number</td>
		<td>Status</td>
		<td>Action</td>
		<?php 
		$oid;
		$perpage = 5;
	if(isset($_GET["page"])){
	$page = intval($_GET["page"]);
	}
	else {
		$page = 1;
		}
		$calc = $perpage * $page;
		$start = $calc - $perpage;

			$sltorder = "SELECT * FROM order_table order by order_id desc limit $start,$perpage";
			if ($result = mysqli_query($localconnect,$sltorder)) 
			{
					$i=0;
				
				while ($row = mysqli_fetch_array($result)) 
				{
					echo "<tr>";
					echo "<td>".$row["order_id"]."</td>";
					$oid=$row["order_id"];
					echo "<td>".$row["username"]."</td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["address"]."</td>";
					echo "<td>".$row["city"]."</td>";
					echo "<td>".$row["state"]."</td>";
					echo "<td>".$row["pincode"]."</td>";
					echo "<td>".$row["email"]."</td>";
					echo "<td>".$row["phone"]."</td>";
					echo "<td>".$row["status"]."</td>";
					echo "<td><a href='admin_order.php?efun=".$row["order_id"]."'>Verify</a></td>";
					echo "</tr>";
				}
				
			}
		 ?>
	</tr>
	</form>
</table>	
<?php
if(isset($page))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("woodstock",$con);
	$result = mysql_query($con,"select Count(*) As Total from order_table");
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
echo "<span><a id='page_a_link' href='admin_order.php?page=$j'>< Prev</a></span>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
		echo "<span><a id='page_a_link' href='admin_order.php?page=$i'>$i</a></span>";
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
	echo "<span><a id='page_a_link' href='admin_order.php?page=$j'>Next> </a></span>";
}


}

?>

</body>
</html>
<?php 
}
if(isset($_GET["efun"])){
	
						$o_id = $_GET["efun"];
						$con=mysql_connect("localhost","root","");
                        mysql_select_db("woodstock",$con);
                        $res=mysql_query("update order_table set status='Verified' where order_id='$o_id'",$con);
						$cnt=mysql_num_rows($res);
						if($res==1){
								echo "<script>alert('Verified details');</script>";
								echo "<script>window.location.href='admin_order.php'</script>";
						}
                      
}


 ?>
