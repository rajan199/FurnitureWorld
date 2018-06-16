<?php 
$code=$_REQUEST["id"];
//require_once("database.php");
//$obj=new database();
//$count=$obj->getuserbycode($code);
$con=mysql_connect("localhost","root","");
mysql_select_db("woodstock",$con);
$res=mysql_query("select * from medi_register where link='$code'",$con);

		$count=mysql_num_rows($res);
		
	//	return $count;

if($count==1)
{
	//$obj=new database();

	//$cnt=$obj->activateuser($code);
	
	$res=mysql_query("update medi_register set status='true' where link='$code'",$con);
	//	return $res;
		header('Location:loginview.php');
	
}
else
{
//echo "invalid";

	echo '<script type="text/javascript">';
 echo "alert('Invalid');";
   echo "</script>";
	


}

?>