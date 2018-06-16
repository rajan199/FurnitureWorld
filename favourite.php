<?php 
session_start();

?>
<?php

$fid=$_REQUEST["fid"];
$email=$_SESSION["username"];
//echo $email;

	$con=mysql_connect("localhost","root","");
	mysql_select_Db("woodstock",$con);
	$res=mysql_query("SELECT * FROM favourite_tbl WHERE email_id='$email' and c_id='$fid'",$con);
	$cnt=mysql_num_rows($res);

if($cnt==0){
		
 $res1=mysql_query("select * from furniture where c_id='$fid'",$con); 
	

while($row=mysql_fetch_array($res1))
{
	$nm=$row["name"];
	$amt=$row["cost"];
	
}

echo $nm;
echo $amt;

//$res3=new database();
//$res=$res3->fav_add($fid,$nm,$amt);

//$con=mysql_connect('localhost','root','');
  //  mysql_select_db('medicine',$con);
  $res3=mysql_query("insert into favourite_tbl values('NULL','$fid','$nm','$amt','$email')",$con); 
	

if($res3==1)
{
			echo "<script>alert('Item added to favourite');</script>";
 					echo "<script>window.location.href='woodstock.php?id=$fid';</script>";
 			
//header('location:user_profile.php');
}
else
{
//	echo 'not ';

	echo '<script language=javascript>
	alert("Not added to the favourite");
	window.location.href="woodstock.php?id=$fid"
	</script>';


}
}
else{
	
	echo '<script language=javascript>
	alert("Already added to the favourite");
	window.location.href="woodstock.php?id=$fid"
	</script>';
}
?>