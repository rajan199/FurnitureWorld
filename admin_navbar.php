<?php 
session_start();
error_reporting(0);
include("config.php");
if (isset($_SESSION["admin"])) 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Control Panel</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WOODSTOCK</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin_manage.php">USER</a></li>
      <li class="active"><a href="admin_furniture.php">FURNITURE</a></li>
      <li class="active"><a href="order_status.php">ORDER STATUS</a></li>
      <li class="active"><a href="admin_order.php">ORDER TABLE</a></li>
      <li class="active"><a href="admin_status.php">PAYMENT</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["admin"]; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>LOGOUT </a></li>
    </ul>
  </div>
</nav>
  


</body>
</html>
<?php 
}
else
{
	echo "<script>alert('please login')</script>";
	echo "<script>window.location.href='index.php'</script>";
	// echo mysqli_error($localconnect);
}

 ?>
