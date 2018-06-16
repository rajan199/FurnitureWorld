<?php 
  include("admin_navbar.php")
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 </head>
 <style>
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
#search
{
  background-color: red;
}
 </style>
 <body>
 	<div class="container-fluid">
  <h3>Registration table</h3>
      <br>
      <?php 
	  	$perpage = 5;
	if(isset($_GET["page"])){
	$page = intval($_GET["page"]);
	}
	else {
		$page = 1;
		}
		$calc = $perpage * $page;
		$start = $calc - $perpage;

	
        $slt_reg = "SELECT * FROM medi_register limit $start,$perpage";
        $result = mysqli_query($localconnect,$slt_reg);
        ?>
        <div class="container-fluid">
          <div class="row">
            <form>
              <input type="text" name="search" placeholder="Search..">
            </form>
            <br>

          </div>
            <?php 
              if (isset($_GET["search"])) 
              {
                "<div class='container-fluid'>";

                $search = $_GET["search"];
                $sltuser = "SELECT * FROM medi_register WHERE name LIKE '$search%' OR gender LIKE '$search%' OR contact LIKE '$search%' OR 
                dob LIKE '$search*'";
                if ($result2 = mysqli_query($localconnect,$sltuser)) 
                {
                  if ($count = mysqli_num_rows($result2)) 
                  {
                      echo "<label for='search'>Search result</label>";
                      echo "<table class='table' style='background-color:#82E0AA;color:black;'>";
                      echo "<thead>";
                      echo "<tr>";
                      echo "<th>NAME</th>";
                      echo "<th>EMAIL</th>";
                      echo "<th>GENDER</th>";
                      echo "<th>CONTACT</th>";
                      echo "<th>DOB</th>";
                      echo "<th>PASSWORD</th>";
                      echo "<th>CART TABLE</th>";
                      echo "<th>ORDER TABLE</th>";
                      echo "<th colspan='2'>EDIT ENTRY</th>";
                      echo "</tr>";
                      echo "</thead>";

                      echo "<tbody>";
                      while ($row2 = mysqli_fetch_array($result2)) 
                      {
                          echo "<tr>";
                          echo "<td>".$row2["name"]."</td>";
                          echo "<td>".$row2["email"]."</td>";
                          echo "<td>".$row2["gender"]."</td>";
                          echo "<td>".$row2["contact"]."</td>";
                          echo "<td>".$row2["dob"]."</td>";
                          echo "<td>".$row2["password"]."</td>";
                          echo "<td>".$row2["cart_nm"]."</td>";
                          echo "<td>".$row2["order_tbl_id"]."</td>";
                          echo "<td><a href='admin_manage.php?dltid=".$row["email"]."'>Delete</a></td>";
                          echo "</tr>";
                      }
                      echo "</tbody>";
                  }
                  else
                  {
                    echo "<h4 class='text-center'>No search result found</h4>";
                  }

                }
              }
             ?>
             </table>
             <a href='admin_manage.php'><button>Refresh</button></a>
             <br><br><br>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>GENDER</th>
                <th>CONTACT</th>
                <th>DOB</th>
                <th>PASSWORD</th>
                <th>CART TABLE</th>
                <th>ORDER TABLE</th>
                <th colspan="2">EDIT ENTRY</th>
              </tr>
            </thead>
            <?php 
			
			while($row = mysqli_fetch_array($result)) 
            {	
              ?>
            <tbody>
              <tr>
                <?php 
                  echo "<td>".$row["name"]."</td>";
                  echo "<td>".$row["email"]."</td>";
                  echo "<td>".$row["gender"]."</td>";
                  echo "<td>".$row["contact"]."</td>";
                  echo "<td>".$row["dob"]."</td>";
                  echo "<td>".$row["password"]."</td>";
                  echo "<td>".$row["cart_nm"]."</td>";
                  echo "<td>".$row["order_tbl_id"]."</td>";
                  echo "<td><a href='admin_manage.php?dltid=".$row["email"]."'>Delete</a></td>";
                }
                if (isset($_GET["dltid"])) 
                {
                	$dltid = $_GET["dltid"];
                	$qrydlt = "DELETE FROM medi_register WHERE email='$dltid'";
                	if ($localconnect->query($qrydlt)) 
                	{
                		echo "<script>alert('User deleted');</script>";
                		echo "<script>window.location.href='admin_manage.php';</script>";
                	}
                }
                
                 ?>
              </tr>
            </tbody>
          </table>
        </div>
</div>
<?php
if(isset($page))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("woodstock",$con);
	$result = mysql_query($con,"select Count(*) As Total from medi_register");
	$rows = mysql_num_rows($result);
if($rows)
{
 
	$rs = mysql_fetch_assoc($result);
 
	$total = $rs["Total"];
}

$totalPages = ceil($total / $perpage);
if($page <=1 ){
	echo "<span id='page_links' style='font-weight: bold;'>Prev</span>";
}
else{
	
	$j = $page - 1;
echo "<span><a id='page_a_link' href='admin_manage.php?page=$j'>< Prev</a></span>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
		echo "<span><a id='page_a_link' href='admin_manage.php?page=$i'>$i</a></span>";
	}
	else{
		echo "<span id='page_links' style='font-weight: bold;'>$i</span>";

	}
}
if($page == $totalPages )
{
echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";
}
else{
	$j = $page + 1;
	echo "<span><a id='page_a_link' href='admin_manage.php?page=$j'>Next> </a></span>";
}


}

?>

 </body>
 </html>