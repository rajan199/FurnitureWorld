<?php 
include("admin_navbar.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 </head>
 <body>
 	<!-- -------------------------------------------------insert furniture------------------------------- -->
 	<div style="overflow-x: auto;">
 		<h3>Insert Furniture</h3>
      <br>
        <div class="container-fluid" >
          <table class="table">
          <thead>
            <tr>
              <th>C_ID</th>
              <th>NAME</th>
              <th>DESCRIPTION</th>
              <th>COST</th>
              <th>COLOR</th>
              <th>TOTAL</th>
              <th>CATEGORY</th>
              <th>IMAGE</th>
              <th>SUBMIT</th>
            </tr>
          </thead>
          <tbody>
            <form action="admin_furniture.php" method="POST" enctype="multipart/form-data">
            <tr>
              <td><input type="text" name="mid" id="mid" placeholder="Furniture ID" disabled=""></td>
              <td><input type="text" name="mname" id="mname" placeholder="Name"></td>
              <td><input type="text" name="description" id="description" placeholder="Description"></td>
              <td><input type="text" name="cost" id="cost" placeholder="Cost"></td>
              <td><input type="text" name="exp_date" id="exp_date" placeholder="Color"></td>
              <td><input type="number" name="mfg_date" min="0" id="mfg_date" placeholder="Total"></td>
              <td><select name="composition">
                <option value="bed">Bed</option>
                <option value="sofa">Sofa</option>
                <option value="dining_table">Dining Table</option>
                <option value="office_table">Office table</option>
                <option value="popular">Popular</option>
                <option value="computer_table">Computer tables</option>
              </select></td>
              <!-- <td><input type="text" name="composition" id="composition" placeholder="Category"></td> -->
              <td><input type="file" name="image" id="image"></td>
              <td><input type="submit" class="btn btn-primary" name="p_submit"></td>
            </tr>
            </form>
          </tbody>
        </table>
        <?php 
          if (isset($_POST["p_submit"])) 
          {
            $m_name=$_POST["mname"];
            $m_desc=$_POST["description"];
            $m_cost=$_POST["cost"];
            $m_exp=$_POST["exp_date"];
            $m_mfg=$_POST["mfg_date"];
            $m_comp=$_POST["composition"];
            // $m_image=$_POST["image"]["name"];
            // $quentity=$_POST["quentity"];
            // $symptoms=$_POST["symptoms"];
            // $type=$_POST["type"];

              // $saveloc = "store_img/".basename($_FILE["image"]["name"]);
              $f_name = $_FILES['image']['name'];
              $f_temp = $_FILES['image']['tmp_name'];
              $f_size = $_FILES['image']['size'];
              $f_shaperate = explode('.',$f_name);
              $f_extension = strtolower(end($f_shaperate));
              $f_newfile = uniqid().'.'.$f_extension;
              $f_store = "store_images/".$f_newfile;

              if ($f_extension =='jpg' || $f_extension=='jpeg'||$f_extension=='png') 
              {
                  if($f_size>=5000000)
                  {
                    echo "file size overload";          
                  }
                  else
                  {
                    move_uploaded_file($f_temp, $f_store);
                  }
              }
              if (empty($m_name)) 
              {
                echo "M ID is empty";
              }
              else if (empty($m_desc)) {
                echo "Desc is empty";
              }
              else if (empty($m_cost)) {
                echo "Cost is Empty";
              }
              else if (empty($m_exp)) {
                echo "Expire date is empty";
              }
              else if (empty($m_mfg)) {
                echo "mfg date is empty";
              }
              else if (empty($m_comp)) {
                echo "Composition is empty";
              }
              else if(empty($f_store))
              {
                echo "image is empty";
              }
              else
              {
                $m_id = uniqid();
                $insrtmed = "INSERT INTO furniture (c_id,name,description,cost,color,total,category,image)
                  values('$m_id','$m_name','$m_desc','$m_cost','$m_exp','$m_mfg','$m_comp','$f_store')";
                  if ($localconnect->query($insrtmed)) 
                  {
                    echo "<script>alert('Item successfully added to the table');</script>";
                    echo "<script>window.location.href='admin_furniture.php?'</script>";
                  }
                  else
                  {
                    echo $localconnect->error;
                    echo mysqli_error($localconnect);
                  }
              }
          }
         ?>
        </div>
 	</div>
 	<hr>

  <div class="container-fluid" style="overflow-x: auto;">
    <form action="admin_furniture.php" method="GET">
      <input type="text" name="search" placeholder="Search.." class="col-md-6">
      <button>Search</button>
    </form>
    <br>
    <div class="container-fluid">
      <table class="table" style="background-color: #82E0AA;color: black;">
        <thead>
        <?php 
          if (isset($_GET["search"])) 
          {
              $search = $_GET["search"];
              $sltmed = "SELECT * FROM furniture WHERE c_id LIKE '$search' OR name LIKE '$search' OR color LIKE '$search' OR category LIKE '$search'";
              $result3 = mysqli_query($localconnect,$sltmed);
            if ($count = mysqli_num_rows($result3) > 0) 
            {
              echo "<tr>";
              echo "<th>C_ID</th>";
              echo "<th>NAME</th>";
              echo "<th>DESCRIPTION</th>";
              echo "<th>COST</th>";
              echo "<th>COLOR</th>";
              echo "<th>TOTAL</th>";
              echo "<th>CATEGORY</th>";
              echo "<th>IMAGE</th>";
              echo "<th colspan='2'>EDIT</th>";
              echo "</tr>";
              while ($row3 = mysqli_fetch_array($result3))
              {
               echo "<tr>";
               echo "<td>'".$row3["c_id"]."'</td>";
               echo "<td>'".$row3["name"]."'</td>";
               echo "<td>'".$row3["description"]."'</td>";
               echo "<td>'".$row3["cost"]."'</td>";
               echo "<td>'".$row3["color"]."'</td>";
               echo "<td>'".$row3["total"]."'</td>";
               echo "<td>'".$row3["category"]."'</td>";
               echo "<td><img src='".$row3["image"]."' style='width:100px;height:100px;'></img></td>";
               echo "<td><a href='admin_furniture.php?dfun=".$row2["c_id"]."'>DELETE</a></td>";
               echo "<td><a href='admin_furniture.php?efun=".$row2["c_id"]."'>Edit</a></td>";
               echo "</tr>";
              }
            }
            else
            {
              echo "<h4 class='text-center'><br><br>No search result found</h4>";
            }
          }
         ?>
         </thead>
      </table>
    </div>
  </div>
  <hr/>
  <?php
  if (isset($_GET["efun"])) 
              {
				  echo "<h3>Edit Item</h3>";
                echo "<table class='table'>";
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th>C_ID</th>";
                  echo "<th>NAME</th>";
                  echo "<th>DESCRIPTION</th>";
                  echo "<th>COST</th>";
                  echo "<th>COLOR</th>";
                  echo "<th>TOTAL</th>";
                  echo "<th>CATEGORY</th>";
                  echo "<th>IMAGE</th>";
                  echo "<th colspan='2'>EDIT</th>";
                  echo "</tr>";
                  echo "</thead>";
                  $c_id = $_GET["efun"];
                  $sltmed = "SELECT * FROM furniture WHERE c_id='$c_id'";
                  $result2 = mysqli_query($localconnect,$sltmed);
                  $row2 = mysqli_fetch_array($result2);
                    echo "<tbody>";
                    echo "<form action='admin_furniture.php' method='POST' enctype='multipart/form-data'>";
                    echo "<tr>";
                    echo "<td><input type='text' name='cid' value='".$row2["c_id"]."' readonly></td>";
                    echo "<td><input type='text' name='iname' value='".$row2["name"]."' required></td>";
                    echo "<td><input type='text' name='description' value='".$row2["description"]."' required></td>";
                    echo "<td><input type='text' name='cost' value='".$row2["cost"]."' required></td>";
                    echo "<td><input type='text' name='color' value='".$row2["color"]."' required></td>";
                    echo "<td><input type='text' name='total' value='".$row2["total"]."' required></td>";
                    echo "<td><select name='category'>";
                    echo "<option value='bed'>Bed</option>";
                    echo "<option value='sofa'>Sofa</option>";
                    echo "<option value='dining_table'>Dining Table</option>";
                    echo "<option value='office_table'>Office table</option>";
                    echo "<option value='popular'>Popular</option>";
                    echo "<option value='computer_table'>Computer Table</option>";
                    echo "</select></td>";
                    echo "<td><input type='file' name ='image1' id='image' value='".$row2["image"]."' ></td>";
					$pic=$row2["image"];
                    echo "<td><input type='submit' value='submit' name='u_submit'></td>";
                    echo "</tr>";
                    echo "</form>";
                    echo "</tbody>";     
                    echo "</table>";
                }
                if (isset($_POST["u_submit"])) 
                {
                  $c_id = $_POST["cid"];
                  $name = $_POST["iname"];
                  $description = $_POST["description"];
                  $cost = $_POST["cost"];
                  $color = $_POST["color"];
                  $total = $_POST["total"];
                  $category = $_POST["category"];

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
				  $photo=$pic;
				  if($_FILES["image1"]["name"]!="")
                            {
                                unlink($pic);
              //                  $photo="../images/".basename($_FILES["txt_img"]["name"]);
								$f_name1 = $_FILES['image1']['name'];
              
								$f_shaperate1 = explode('.',$f_name1);
								$f_extension1 = strtolower(end($f_shaperate1));
								$f_newfile1 = uniqid().'.'.$f_extension1;
								$f_store1 = "store_images/".$f_newfile1;		

                                move_uploaded_file($_FILES["image1"]["tmp_name"],$f_store1);
                                
                            }   

				  
                  $updtfun = "UPDATE furniture SET name = '$name', description='$description',cost = '$cost',color='$color', total = '$total',category = '$category', image='$f_store1' WHERE c_id = '$c_id'";
                  if (mysqli_query($localconnect,$updtfun)) 
                  {
                    echo "<script>alert('Table updated');</script>";
                    echo "<script>window.location.href='admin_furniture.php';</script>";
                  }
                  else
                  {
                    echo mysqli_error($localconnect);
                    echo "<script>alert('already inserted')</script>";
                    // echo "<script>window.location.href='admin_furniture.php';</script>";
                  }
                    // echo "<script>window.location.href='admin_furniture.php';</script>";
                }
  
  
  ?>
  	<!-- ---------------------------------------display furniture----------------------- -->
 	<div style="overflow-x: auto;">
 		<h3>Furniture Table</h3>
      <br>
      <div class="container-fluid" >
        <table class="table">
          <thead>
            <tr>
              <th>C_ID</th>
              <th>NAME</th>
              <th>DESCRIPTION</th>
              <th>COST</th>
              <th>COLOR</th>
              <th>TOTAL</th>
              <th>CATEGORY</th>
              <th>IMAGE</th>
              <th colspan="2">EDIT</th>
            </tr>
          </thead>
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
		  
            $sltmed = "SELECT * FROM furniture order by c_id desc limit $start,$perpage";
            $result2 = mysqli_query($localconnect,$sltmed);
            while ($row2 = mysqli_fetch_array($result2))
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>'".$row2["c_id"]."'</td>";
              echo "<td>'".$row2["name"]."'</td>";
              echo "<td>'".$row2["description"]."'</td>";
              echo "<td>'".$row2["cost"]."'</td>";
              echo "<td>'".$row2["color"]."'</td>";
              echo "<td>'".$row2["total"]."'</td>";
              echo "<td>'".$row2["category"]."'</td>";
              echo "<td><img src='".$row2["image"]."' style='width:100px;height:100px;'></img></td>";
              echo "<td><a href='admin_furniture.php?dfun=".$row2["c_id"]."'>DELETE</a></td>";
              echo "<td><a href='admin_furniture.php?efun=".$row2["c_id"]."'>Edit</a></td>";
              echo "</tr>";
              echo "</tbody>";
            }
            if (isset($_GET["dfun"])) 
              {
                  $dfun = $_GET["dfun"];
                  $sltfun = "DELETE FROM furniture WHERE c_id = '$dfun'";
                  if ($localconnect->query($sltfun)) 
                  {
                    echo "<script>alert('Item successfully deleted');</script>";
                    echo "<script>window.location.href='admin_furniture.php'</script>";
                  }
                  else
                  {
                    echo mysqli_error($localconnect);
                  }
              }
              
           ?>
        </table>
      </div>
    </div>
	
	<?php
if(isset($page))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("woodstock",$con);
	$result = mysql_query($con,"select Count(*) As Total from furniture");
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
echo "<span><a id='page_a_link' href='admin_furniture.php?page=$j'>< Prev</a></span>";
}
for($i=1; $i <= $totalPages; $i++)
{
	if($i<>$page)
	{
		echo "<span><a id='page_a_link' href='admin_furniture.php?page=$i'>$i</a></span>";
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
	echo "<span><a id='page_a_link' href='admin_furniture.php?page=$j'>Next> </a></span>";
}


}

?>

 
 </body>
 </html>