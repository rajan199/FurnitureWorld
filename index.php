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
<div id="home_img">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 class="display-2" style="color: lightblue">&nbsp;</h1>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 class="display-2" style="color: lightblue">&nbsp;</h1>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1 class="display-2" style="color: lightblue">WOOD STOCK</h1>
		</div>
	</div>
</div>
</div>
<div id="home_img2">
	<div class="container">

		<div class="row">
			<div class="col-md-12"><br><h2 class="text-center">WHAT IS POPULAR IN FURNITURE</h2></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6 " >
				<div><a href="furniture.php?name=sofa"><img src="image/background1.jpg" width="100%" alt=""><br><br>
					<p class="text-center">SOFAS & LOUNGERS</p></a></div>
			</div>
			<div class="col-md-6">
				<div><a href="furniture.php?name=bed"><img src="image/beds1.jpg" width="100%" height="304px" alt="">
					<br><br>
					<p class="text-center">BED'S</p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div><a href="furniture.php?name=computer_table"><img src="image/chair1.jpg" width="100%" height="304px" alt="">
					<br><br>
					<p class="text-center">CHAIR</p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div><a href="furniture.php?name=dining_table"><img src="image/kitchen1.jpg" width="100%" height="304px" alt="">
					<br><br>
					<p class="text-center">KITCHEN</p></a>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
<hr>
<!--<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center">WHAT’S HANDPICKED</h2><br><br>	
		</div>
		<div class="col-md-7">
			<div><a href="furniture.php?name=popular"><img src="image/sofa1.jpg" width="600px" height="300px" alt=""></a></div>
		</div>
		<div class="col-md-4">
			<h3 class="text-center">ABOUT THE ITEM</h3>
		</div>
	</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-1">
			<h3 class="text-center">ABOUT THE ITEM</h3>
		</div>
		<div class="col-md-7">
			<div><a href="furniture.php?name=popular"><img src="image/sofa1.jpg" width="600px" height="300px" alt=""></a>     </div>
		</div>
	</div>
</div>	-->
<br>
<hr>
<br>
<div class="container">
	<h2 class="text-center">NEW DESIGN</h2>
	<br>

	<div class="row">
		<div class="col-md-3">
			<a href="furniture.php?name=popular"><img src="image/sofa2.jpg" alt="" width="200px" height="300px"></a>
		</div>
		<div class="col-md-3">
			<a href="furniture.php?name=popular"><img src="image/table set1.jpg" alt="" width="200px" height="300px"></a>
		</div>
		<div class="col-md-3">
			<a href="furniture.php?name=popular"><img src="image/table set2.jpg" alt="" width="200px" height="300px"></a>
		</div>
		<div class="col-md-3">
			<a href="furniture.php?name=popular"><img src="image/outside2.jpg" alt="" width="200px" height="300px"></a>
		</div>
	</div>
</div>
<br>
<hr>
<br>
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