<?php 
// session_start();
error_reporting(0);
include("config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon/hospital.png" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- footer -->	
	<!-- footer end -->
	<script src="javapage.js" type="text/javascript">
	</script>
</head>
<body>
	<!-- ----------------------------------------nav block start--------------------------------- -->
	<nav class="navbar navbar-expand-md bg-info navbar-light sticky-top" >
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    		<span class="navbar-toggler-icon"></span>
	    		</button>

				<a class="navbar-brand" href="index.php">
	    			<img src="icon/hospital.png" alt="logo" width="50px" height="50px"><br>
	  			</a>
	  			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			  <ul class="navbar-nav" >
			    <li class="nav-item">
			      <a class="nav-link" style="color:white;" href="index.php">HOME</a>
			    </li>
			    <li class="nav-item dropdown">
			      <a class="nav-link dropdown-toggle" style="color:white;" data-toggle="dropdown" href="#">FURNITURE</a>
			      <div class="dropdown-menu">
			      	<a class="dropdown-item" href="furniture.php?name=bed">BED'S</a>
			      	<a class="dropdown-item" href="furniture.php?name=sofa">SOFA</a>
			      	<a class="dropdown-item" href="furniture.php?name=dining_table">DINING TABLE</a>
			      	<a class="dropdown-item" href="furniture.php?name=office_table">OFFICE TABLE</a>
			      	<a class="dropdown-item" href="furniture.php?name=computer_table">COMPUTER TABLE</a>
			      </div>
			  	</li>
			  	<li class="nav-item">
			      <a class="nav-link" style="color:white;" href="furniture.php?name=popular">POPULAR</a>
			    </li>
			    <?php 
			    	if (isset($_SESSION["username"]))
			    	{
			    ?>
			    <li class="nav-item">
			    <a class="nav-link" href="cart.php" style="max-width:50px; "><img src="image/shopping-cart.png" alt="cart" width="100%" height="90%"></a>
			    </li>
							  	<li class="nav-item">
			      <a class="nav-link" style="color:white;" href="dis_fav.php">Your Favourite</a>
			    </li>

			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <!-- <li class="nav-item">
			      <a class="nav-link" href="logout.php">Logout</a>
			    </li> -->
			    
			    	
			    	
			    	<?php 
			    	}
			     ?>
				</ul>
				<!-- -----------------------------profile pic block start--------------------------------- -->
					<!-- <div class="row">
						<div class="col-md-9 offset-md-4"> -->
				<?php
			if (isset($_SESSION["username"])) 
			{
				echo "<div class='container-fluid ' style='float: right;max-width: 300px;margin-left: 40px;' >";
				?>
				<!-- <div class="col-md-6" style="background: blue;">
					<div class="container-fluid" style="background: yellow;"> -->
						<?php 
							$sltreg="SELECT * from medi_register where email='".$_SESSION["username"]."'";
							$result = mysqli_query($localconnect,$sltreg);
							$row1 = mysqli_fetch_array($result);
							if ($row1["gender"]=='male') 
							{
								?>
									
									<div class="container-fluid" style="min-height: 63px; background: #17a2b8;float: right;min-width: 400px;" id="test">
					<!-- <img src="image/man.png" class="img-responsive float-right"  alt="profile pic" height="5%" width="16%"> --><br>
	           						<a href="edit_profile.php" class="fontlang" style="text-decoration: none;">
	           							<h6 class="fontlang text-right">
	           								<?php echo "Hi, ".$_SESSION["username"];?>
	           							</h6>
	           						</a>
								</div>
								<?php 
							}
							else if ($row1["gender"]=='female')
							{

								?>
								<div class="container-fluid" style="min-height: 63px; background-color:#17a2b8;float: right; min-width: 400px;">
			<!-- <img src="image/woman.png" class="img-responsive float-right" style="" alt="profile pic" height="5%" width="16%"> --><br>
	           						<a href="edit_profile.php" class="fontlang" style="text-decoration: none;">
	           							<h6 class="fontlang text-right">
	           								<?php echo "Hi, ".$_SESSION["username"];?>
	           							</h6>
	           						</a>
								</div>
								<?php 
							}


						 ?>

						
					<!-- </div>
				</div> -->
				<?php 
            }
            else
			{
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<div class='container-fluid text-right' style='float:right; max-width: 300px;margin-left:200px;' >";
			      echo "<a style='padding:20px;color:white;' class='nav-link text-right' href='loginview.php'>
			      Login/Register
			      </a>";
			    echo "</div>";
			}
		 ?>
						<!-- </div>
					</div> -->
				</div>
				<!-- ------------------------------profile pic block end--------------------------  	 -->
			</div>
			<?php if(isset($_SESSION["username"])){ ?>
			<li class="nav-item" style="list-style-type: none;">
			      <a class="nav-link text-right" href="logout.php">Logout</a>
			    </li>
			    <?php } ?>
			</nav>
	<!-- ---------------------------------------nav block end----------------------------------- -->
</body>
</html>
<style>
	.fontlang
	{
		font-family: Verdana,sans-serif;
	}
	ul{
		list-style-type: none;
	}

	/*-----------------scriollbar start-----------------*/
	/* width */
	::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; 
}
/*---------------------scrollbar end------------------------*/
</style>