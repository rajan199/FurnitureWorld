<?php 
session_start();
include("config.php");
if (isset($_SESSION["admin"])) 
{
	if (isset($_GET["u_submit"])) 
                {
                  $c_id = $_GET["cid"];
                  $name = $_GET["iname"];
                  $description = $_GET["description"];
                  $cost = $_GET["cost"];
                  $color = $_GET["color"];
                  $total = $_GET["total"];
                  $category = $_GET["category"];

                  // $f_name = $_FILES['image']['name'];
                  // $f_temp = $_FILES['image']['tmp_name'];
                  // $f_size = $_FILES['image']['size'];
                  // $f_shaperate = explode('.',$f_name);
                  // $f_extension = strtolower(end($f_shaperate));
                  // $f_newfile = uniqid().'.'.$f_extension;
                  // $f_store = "store_images/".$f_newfile;

                  // if ($f_extension =='jpg' || $f_extension=='jpeg'||$f_extension=='png') 
                  // {
                  //     if($f_size>=5000000)
                  //     {
                  //       echo "file size overload";          
                  //     }
                  //     else
                  //     {
                  //       move_uploaded_file($f_temp, $f_store);
                  //       echo "<script>alert('file moved');</script>";
                  //     }
                  // }
                  	$updtfun = "UPDATE furniture SET c_id = '$c_id', name = '$name', description='$description',cost = '$cost',color='$color', total = '$total',category = '$category'";
                  	mysqli_query($localconnect,$updtfun);
                    echo "<script>alert('Table updated');</script>";
                    echo "<script>window.location.href='admin_furniture.php';</script>";
                }
}
else
{
	echo "<script>alert('please login');</script>";
}
?>