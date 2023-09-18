<html>
	<head>
		
		<script src="https://kit.fontawesome.com/ce13a1b87e.js" crossorigin="anonymous"></script>
<style>
a.bc {
    color: inherit;
    text-decoration: none;
    
}

.loggedInBanner{
height: 100px;
background-color: FFD433 ;
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
</head>
<?php 
session_start();

if (!isset($_SESSION['username'])){
	header("Location: index.php");
}



include "header.php";

$sql2="Select * from RegisteredUsers";
$query_result2=mysqli_query($conn,$sql2);
$numrows=$query_result2->num_rows;




?>


	<div class="subHeading">
		<p style="font-size:35px; font-family:Copperplate;">Total no.of Registered Users are:<?=$numrows?>

<form name="search_form" method="POST" action="searchedForPage.php">
	<label style="font-size:25px; font-family:Copperplate;">First name:</label><input type="text" placeholder="Enter name" name="userName" value="">
	<label style="font-size:25px; font-family:Copperplate;">DOB:</label><input type="date" placeholder="DDMMYYYY" name="DOB">
	<label style="font-size:25px; font-family:Copperplate;">Minimum year of DOB: (1940-2030)</label><input type='range' name="date" min="1940" max="2030" value="2000" step="5">
	<input type="submit" name="search_submit" value="submit"> 
<a href=<?=BASEURL?>user_list.php>Show All Records</a>
	</form>
	
		
		</div>



<?php
	
		////initializing query variables
		if (isset($_POST['search_submit'])){
		$_SESSION['userName']=$_POST['userName'];
		$_SESSION['DOB']=$_POST['DOB'];
		$_SESSION['date']=$_POST['date'];
	}
		$username_search=$_SESSION['userName'];
		$DOB=$_SESSION['DOB'];
		$year=$_SESSION['date'];
		
		$ascdesc='asc';
		$sortby='first_name';
		
		function changeBool(){
	
		if (isset($_GET['ascdesc']) && $_GET['ascdesc'] == 'asc')
		{
			echo "desc";
			}
		else{
			
			echo "asc";
		}
	
		}
		
		
		
		
		if (isset($_GET['ascdesc']) && isset($_GET['sortby']))
		{
			$ascdesc=$_GET['ascdesc'];
			$sortby=$_GET['sortby'];
			
			}
			
			
		$perpage=6;
		$pagenum=1;
		
		if(isset($_GET['page'])){
			$pagenum=$_GET['page'];
			}
		$offset=($pagenum-1)*$perpage;
		$totalrowsQuery="select * from RegisteredUsers where First_name like '%$username_search%' and DOB like '%$DOB%' and year(dob) >= $year order by $sortby $ascdesc";
		$searchQuery="select * from RegisteredUsers where First_name like '%$username_search%' and DOB like '%$DOB%' and year(dob) >= $year order by $sortby $ascdesc limit $perpage offset $offset";
		$resul=mysqli_query($conn,$searchQuery);
		
		$numrows_main=mysqli_query($conn,$totalrowsQuery)->num_rows;
		$total_pages=ceil($numrows_main/$perpage);
		$numRows=$resul->num_rows;
		
		?>
		<br><Br><br>
		<!--<p style="font-size:25px; font-family:georgia;">Showing <?=$numRows?> row(s) for the given command.</p>-->
		<table>

		<tr>
		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=first_name&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">First Name <?php if(isset($_GET['sortby'])&& $_GET['sortby']=='first_name' && $_GET['ascdesc']=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif(isset($_GET['sortby']) && $_GET['sortby']=='first_name' && $_GET['ascdesc']=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?></a></th>
		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=last_name&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Last Name <?php if(isset($_GET['sortby']) && $_GET['sortby']=='last_name' && $_GET['ascdesc']=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif(isset($_GET['sortby']) && $_GET['sortby']=='last_name' && $_GET['ascdesc']=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=email&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Email <?php if($sortby=='email' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php } elseif($sortby=='email' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=dob&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">DOB <?php if( $sortby=='dob' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif ($sortby=='dob' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=username&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Username <?php if($sortby=='username' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif ($sortby=='username' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>

		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=country&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">Country <?php if($sortby=='country' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif($sortby=='Country' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?></a></th>

		<th><a class="bc" href="<?=BASEURL?>searchedForPage.php?sortby=city&ascdesc=<?=changeBool()?>&page=<?=$pagenum?>">City <?php if($sortby=='city' && $ascdesc=='asc'){ ?><i class="fa-solid fa-arrow-up"></i><?php }elseif($sortby=='city' && $ascdesc=='desc'){ ?><i class="fa-solid fa-arrow-down"></i><?php } ?> </a></th>
		<th>Hobbies</th>		
		<th>Image</th>
		<th>Document</th>
		<th>Action</th>
		<th>Status</th>
		</tr>
		<?php
		while($result= mysqli_fetch_assoc($resul)){
		?>
	
		<tr>

		<td><?=$result['first_name']?></td>
		<td><?=$result['last_name']?></td>
		<td><?=$result['email']?></td>
		<td><?=$result['dob']?></td>
		<td><?=$result['username']?></td>


		<td>
			<select id="country" name="country">
	   		<option value="<?=$result['country']?>"><?=$result['country']?></option>
   			<option value="None">None</option>
   			<option value="India">India</option>
    			<option value="USA">USA</option>
    			<option value="UAE">UAE</option>
    			<option value="China">China</option>
    			<option value="Netherlands">Netherlands</option>
  			</select>
		</td>
		<td><?=$result['city']?></td>

		<td><?=$result['hobbies']?></td>
		
		<td><img style="width:60px;" src="userImages/<?=$result['image_details']?>"></td>
		<td><a href="userDocuments/<?=$result['document_details']?>"> Click To View Doc </a></td>
		<td><a href="edit.php/?id=<?=$result['id']?>">Edit</a> |&nbsp <a href="delete_user.php/?id=<?=$result['id']?>">Delete</a></td>
		<td><a class="bc" href="change_status.php?id=<?=$result['id']?>"><b><?php if($result['status']==0){echo"Inactive";}else{echo"active";}?></b></a></td>
		</tr>
		

		<?php
		}
	
		?>
		</table>
		
		
<div class="pagination">
	<a href="<?=BASEURL?>searchedForPage.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?php if($pagenum==1){echo"1";}else{echo ($pagenum-1);} ?>">&laquo;</a>

<?php 

for($i=1;$i<=$total_pages;$i++){
	?>
	<a href="<?=BASEURL?>searchedForPage.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?=$i?>"><?=$i?></a>
	<?php
	 } 
	 ?>
	 <a href="<?=BASEURL?>searchedForPage.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?php if($pagenum==1){echo"1";}else{echo ($pagenum-1);} ?>">&raquo;</a>

	</div>
	
	<?php
include "footer.php";?>

</html>
