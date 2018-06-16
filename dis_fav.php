<?php 
session_start();
include("navbar.php");
include("config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WOOD STOCK | HOME</title>

</head>
<body>

<br><br><br>
<hr>
<div class="container">

<div class="row">
<div class="col-md-12">

<?php

$eid=$_SESSION["username"];

//$cnt=new database();
//$res=$cnt->count_Fav($eid);
	$con=mysql_connect("localhost","root","");
	mysql_select_Db("woodstock",$con);
	
	$res=mysql_query("select *  from favourite_tbl where email_id='$eid'",$con);
	

$cntt=mysql_num_rows($res);


?>		
<h1 align="center">Your Favourite Items (<?php  if($cntt==0){ echo "Empty"; }
else{ echo $cntt; } ?>)</h1>
<table class="table table-striped">
		<th>Item Photo</th>
		<th>Item Name</th>
		
		<th>Item Price</th>
		
<th>Add to cart</th>
<th>Action</th>


<?php


//$cnt1=new database();	
//$res1=$cnt1->Favourite_join($eid);
$res1=mysql_query("select p.*,f.* from furniture as p,favourite_tbl as f where p.c_id=f.c_id and f.email_id='$eid'",$con);
	


while($row=mysql_fetch_array($res1,MYSQL_ASSOC))
{
	echo "<tr><td>";
	echo     '<img src="'.$row["image"].'" alt="..." style="height: 145px; width:200px;"></td>';
    echo "<td>". $row["name"]."</td>";
    echo "<td>". $row["cost"]."</td>";
 echo '<td>
<a href="my_cart.php?pid='.$row["c_id"].'"><button type="button" style="width: 200px; background:#323A45; color:white; " name="btncar" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to cart
</button></a></td>';
 
  echo '<td><a href="delet_fav.php?fid='.$row["f_id"].'"><button  type="button" class="btn btn-default btn-lg" style="color: red;" >
  <span class="glyphicon glyphicon-trash" style="color: red;"  aria-hidden="true"></span> Remove 
</button>
</a></td>';
    echo "</tr>";
	echo "</form>";

}

?>
		


<div>
</div>
</div>
		</table>




<!-- ------------------------------------footer------------------------------------------ -->
    <div class="container-fluid " style="background:#17a2b8;color: white; ">
        <br><br>
        <div class="container">
                <footer class="text-left text-justify">
            <div class="row ">
                <div class="col-md-3 myCols">
                    <ul>
                    <li><h5><strong>Get started</strong></h5></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <ul>
                    <li><h5><strong>About us</strong></h5></li>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <ul>
                    <li><h5><strong>Support</strong></h5></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <ul>
                    <li><h5><strong>Legal</strong></h5></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <br><br>
        </footer>       
        </div>
    </div>
    <div class="container-fluid text-center text-justify" style="background: #212F3C;padding: 5px;color: white;">
        <p >@ 2018 Copyright Text</p>
    </div>
<!-- -----------------------------------------tooter end------------------------------------- -->
<style>
    .fontlang
    {
        font-family: Verdana,sans-serif;
    }
    ul{
        list-style-type: none;
    }
</style>
</body>
</html>