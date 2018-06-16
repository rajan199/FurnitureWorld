<?php 
$localconnect = mysqli_connect("localhost","root","","woodstock");
if ($localconnect->connect_error) 
{
	die("Connection error".$localconnect->local_error);
}
 ?>