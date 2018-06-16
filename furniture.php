<?php 
session_start();
include("navbar.php");
include("config.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>WOODSTOCK | FURNITURE</title>
 </head>
 <body>
 	<div class="container-fluid">
 		<div class="row">
 			<br>
 			<?php
 				if (isset($_GET["name"])) 
 				{
 					$cate = $_GET["name"];
 					$slt = "SELECT * FROM furniture WHERE category='$cate' ORDER BY name";
 					if ($result = $localconnect->query($slt))
 					{

 						while ($row = mysqli_fetch_array($result))
 						{
 							echo "<div class='col-md-4' style='min-height:350px;'>";
 							// echo "hello";
 							echo "<a href='woodstock.php?id=".$row["c_id"]."'><img src='".$row["image"]."' class='img-responsive' style='height:250px;width:400px';  alt=''>";
 							echo "<h5 class='text-center' style='color:black;'>".$row["name"]."</h5></a>";
 							echo "<h5 class='text-center' style='color:black;'>Rs.".$row["cost"]."</h5></a>";
 							echo "</div>";
 						}
						}
 					else
 					{
 						echo mysqli_error($localconnect);
 					}
 				}
 			?>	
 		</div>
 	</div>
 </body>
 </html>