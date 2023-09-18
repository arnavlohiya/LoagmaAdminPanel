

<html>
<head>
<script src="https://kit.fontawesome.com/ce13a1b87e.js" crossorigin="anonymous"></script>
</head>
<style>

a.bc {
    color: inherit;
    text-decoration: none;
    
}




.subHeading{
background-color: #D4AC0D;
height:100px;


}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.pagination {
  margin: 0px 600px;
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a:hover{
background:#FFD433;
}

.pagination a.active{
background: #D4AC0D;
}
</style>


<?php

include "header.php";




function changeBool()
{
	if(!isset($_GET['ascdesc']) or $_GET['ascdesc']=='desc')
	{
		return "asc";
	}else{

		return "desc";
	}



}



if (!isset($_SESSION['username']))
{
	header("Location: index.php");

}
	//initializing the sortby and ascdesc variables.
	$sortby="first_name";
	$ascdesc="asc";
	

	//Over riding the values of the variables with those according to the URL if mentioned. 
	if(isset($_GET['sortby']) && isset($_GET['ascdesc']))
	{	
		$ascdesc=$_GET['ascdesc'];
		$sortby=$_GET['sortby'];
		
		
	}
	$perpage=6;
	$obj=mysqli_query($conn,"select * from RegisteredUsers");
	$obj_rows=$obj->num_rows;
	$total_pages=ceil(($obj_rows)/$perpage);
		
	
	if (isset($_GET['page'])){$pagenum=$_GET['page'];}else{$pagenum=1;}
	$offset=($pagenum-1)*$perpage;
	
		


	$sql3="Select * from RegisteredUsers order by $sortby $ascdesc limit $perpage offset $offset";
	
	$q2=mysqli_query($conn,$sql3);
	$numrows=$q2->num_rows;

	
	?>
	    <div class="subHeading">		
		<p style="font-size:35px; font-family:Copperplate;">Total registered users: <?=$obj_rows?></p>

		<form name="search_form" method="POST" action="searchedForPage.php">
			<label style="font-size:25px; font-family:Copperplate;">First name:</label><input type="text" placeholder="Enter name" name="userName" value="">
			<label style="font-size:25px; font-family:Copperplate;">DOB:</label><input type="date" placeholder="DDMMYYYY" name="DOB">
			<label style="font-size:25px; font-family:Copperplate;">Minimum year of DOB: (1940-2030)</label><input type='range' name="date" min="1940" max="2030" value="2000" step="5">
			<input type="submit" name="search_submit" value="submit">
		<a href=<?=BASEURL?>user_list.php>Show All Records</a>
		</form>
		
		
	    </div>

	<br><br><br>
		
		<table>
		<tr>
		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=first_name&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">First Name <?php if(isset($_GET['sortby'])&& $_GET['sortby']=='first_name' && $_GET['ascdesc']=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif(isset($_GET['sortby']) && $_GET['sortby']=='first_name' && $_GET['ascdesc']=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?></a></th>
		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=last_name&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Last Name <?php if(isset($_GET['sortby']) && $_GET['sortby']=='last_name' && $_GET['ascdesc']=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif(isset($_GET['sortby']) && $_GET['sortby']=='last_name' && $_GET['ascdesc']=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=email&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Email <?php if($sortby=='email' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php } elseif($sortby=='email' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=dob&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">DOB <?php if( $sortby=='dob' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif ($sortby=='dob' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=username&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Username <?php if($sortby=='username' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif ($sortby=='username' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=country&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Country <?php if($sortby=='country' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif($sortby=='Country' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?></a></th>

		<th><a class="bc" href="<?=BASEURL?>user_list.php?sortby=city&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">City <?php if($sortby=='city' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif($sortby=='city' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>
		<th>Hobbies</th>		
		<th>Image</th>
		<th>Document</th>
		<th>Action</th>
		<th>Status</th>
		</tr>
	<?php
	while ($row=mysqli_fetch_assoc($q2)) 

		{
		
		
		?>
		<tr>
		
		<td> <?=$row['first_name']?> </td>
		<td> <?=$row['last_name']?> </td>
		<td> <?=$row['email']?> </td>
		<td> <?=$row['dob']?> </td>
		<td> <?=$row['username']?> </td>



		<td>
		<form method="POST" action="">	
		<select name="country_drop_down" onchange="this.form.submit()">
		<option value="<?=$row['country']?>"><?=$row['country']?></option>
		<?php
			$query= "select country from countries";
			$qryobj1=mysqli_query($conn,$query);
			while($country_row= mysqli_fetch_assoc($qryobj1)){
		?>
		<option value="<?=$country_row['country'].",".$row['id']?>"><?=$country_row['country']?></option>
    			
  			
		<?php
			}
		?>
		</select>
			</form>
	
		</td>
	
		<td>
			<form name="cityDropDown" action="" method="POST">
			<select name="city_dropdown" onchange="this.form.submit()">
			<option value="<?=$row['city']?>"><?=$row['city']?></option>
			<?php
				$city_query="select city from cities";
				$qcity=mysqli_query($conn,$city_query);
				while($city_row = mysqli_fetch_assoc($qcity))
				{
			?>
					<option value= "<?=$city_row['city'].",".$row['id']?>"><?=$city_row['city']?></option>
				<?php
				}
				?>	
			</select>
			</form>
		</td>

		<td><?=$row['hobbies']?></td>



		<td> <img style="width:60px;" src="userImages/<?=$row['image_details']?>" </td>
		<td> <a href="userDocuments/<?=$row['document_details']?>">Click To View Doc</a></td>
		<td><a href="edit.php?id=<?=$row['id']?>">Edit</a> |&nbsp <a href="delete_user.php?id=<?=$row['id']?>">Delete</a></td>

		<td><a class="bc" href="change_status.php?id=<?=$row['id']?>"><b><?php if ($row['status']==0){echo "Inactive";}else{echo"active";}?></b></a></td>
</td>
		</tr>
		
		<?php
		

		}	

		if (isset($_POST['country_drop_down'])){
		$arr=explode(',',$_POST['country_drop_down']);
		$country_dropdown=current($arr);
		$id=end($arr);
		
		if(mysqli_query($conn,"update RegisteredUsers set country='$country_dropdown' where id=$id"))
			{
			}else{echo"There was in issue updating the city value";}
		}
		
		if(isset($_POST['city_dropdown'])){
		
			$city_arr=explode(',',$_POST['city_dropdown']);
			$city_name=current($city_arr);
			$cityid=end($city_arr);
			echo $qry="update RegisteredUsers set city='$city_name' where id=$cityid";
			if(mysqli_query($conn,$qry))
			{
			echo "<script>window.location.href='user_list.php?sortby=$sortby&ascdesc=$ascdesc&page=$pagenum';</script>";
			     //"<script>alert('Registration Successful, you are being redirected to the Login page');window.location.href='user_list.php';</script>";

			}else{echo"There was an issue updating the city";}
			
		}
		?>

		</table>
		<br>
<div class="pagination">
<a href="<?=BASEURL?>user_list.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?php if($pagenum==1){echo"1";}else{echo ($pagenum-1);} ?>">&laquo;</a>
<?php
  
for($i=1;$i<=$total_pages;$i++)
	{
	?> <a class="<?php if(isset($_GET['page']) && $_GET['page']==$i){echo "active";}?>"  href="<?=BASEURL?>user_list.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?= $i ?>"><?=$i?></a>
	<?php

	}
?>
  <a href="<?=BASEURL?>user_list.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?=($pagenum+1)?>">&raquo;</a>
	
</div>

		
<?php include "footer.php"; ?>
</html>
