<?php 
session_start();
include("navbar.php");
include("consfig.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>WOODSTOCK</title>
 </head>
 <body>
 	<div class="container">
 		<div class="row">
 	<?php 
 	$name='';
 	$price='';
 		if (isset($_GET["id"])) 
 		{
 			$id = $_GET["id"];
			$sltitem = "SELECT * FROM furniture WHERE c_id = '$id'";
			if ($localconnect->query($sltitem)) 
			{
				$result = mysqli_query($localconnect,$sltitem);
				$row = mysqli_fetch_array($result);
				$quentity = $row["total"];
				$name = $row["name"];
				$price = $row["cost"];
				echo "<div class='col-md-6 col-sm-6'>";
				echo "<br>";
				echo "<img src='".$row["image"]."' alt='' style='max-width:100%;max-height:100%' class='img-responsive'>";
				echo "</div>";
				echo "<div class='col-sm-6'>";
				echo "<h3>".strtoupper($row["name"])."</h3><hr>";
				echo "<h4><b>DESCRIPTION:&nbsp;&nbsp;&nbsp;</b>".$row["description"]."</h4>";
				echo "<h4><b>RS.</b>&nbsp;&nbsp;&nbsp;".$row["cost"]."</h4>";
				echo "<h4><b>COLOR:</b>&nbsp;&nbsp;&nbsp;".$row["color"]."</h4>";
				echo "<h4><b>CATEGORY:</b>&nbsp;&nbsp;&nbsp;".$row["category"]."</h4>";
				echo "<hr>";
				echo "<form action='woodstock.php' method='GET'>";
				echo "<input type='number' name='qty' min='1' class='col-md-2 col-xs-2' value='1'><br><br>";
				echo "<input type='hidden' value='$id' name='id'>";
				echo "<br>Left items:".$quentity."<br><br>";
				if ($quentity==0) 
				{
					echo "<input type='submit' name='submit' value='Item not available' class='btn btn-danger' disabled>";
					echo "<br/>";
					echo "<br/>";
		
					echo '<a href="favourite.php?fid='.$row["c_id"].'"><button type="button" style="" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-heart" style="color: red;" aria-hidden="true">Add to Favourite</span>
				</button></a>';
				}
				else
				{
					echo "<input type='submit' name='submit' value='ADD TO CART' class='btn btn-success'>";
					echo "<br/>";
					echo "<br/>";
					echo '<a href="favourite.php?fid='.$row["c_id"].'"><button type="button" style="" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-heart" style="color: red;" aria-hidden="true">Add to Favourite</span>
</button></a>
';

			}
				echo "</form>";
				echo "</div>";
			}
 		}
 		else
 		{
 			// header("location:404.html");
 			// echo "window.location.href='404.html'";
 			echo mysqli_error($localconnect);

 		}
 		if (isset($_GET["submit"])) 
 		{
 			 if (isset($_SESSION["username"])) 
 			 {
 			 	$id = $_GET["id"];
 			 	$username = $_SESSION["username"];
 			 	$qty = $_GET["qty"];
 			 	$sltcart = "SELECT * FROM medi_register WHERE email='$username'";
 			 	$result = mysqli_query($localconnect, $sltcart);
 			 	$row2 = mysqli_fetch_array($result);
 			 	$cart_nm = $row2["cart_nm"];
 			 	$sltfur = "SELECT * FROM furniture WHERE c_id = '$id'";
 			 	$row3 = mysqli_fetch_array(mysqli_query($localconnect,$sltfur));
 			 	$price = $row3["cost"];
 			 	$totalcost = $price*$qty;
 				$insrtcrt = "INSERT INTO $cart_nm (itemid,iname,QTY,IPRICE,status) VALUES ('$id','$name','$qty','$totalcost','cart')";
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
 			 	
 			 }
 			 else
 			 {
 			 	echo "<script>alert('Please login.');</script>";
 			 	echo "<script>window.location.href='loginview.php'</script>";
 			 }
 		}
 	 ?>
 	 	</div>
 	</div>
 </body>
 </html>