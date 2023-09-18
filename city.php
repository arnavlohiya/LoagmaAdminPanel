
<html>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.a{
border-radius: 20px;
height:700px;
background-color: #D4AC0D;
width: 375px;
margin: 50px 500px;
padding: 30px 0px 0px 20px;

}


</style>

<?php



include "header.php";
if(!isset($_SESSION['id'])){ 
echo "<script> alert('you have unauthorized access to this page.');window.location.href='index.php'";
}
// initializing pagination variables
$qr1_obj=mysqli_query($conn,"select * from cities");
$perpage=6;
$total_rows=$qr1_obj->num_rows;

$total_pages=ceil($total_rows/$perpage);
$pagenum=1;
//

//initializing sorting variables
$sortby='id';
$ascdesc='asc';

if (isset($_GET['sortby']) && isset($_GET['ascdesc'])){
	$ascdesc=$_GET['ascdesc'];
	$sortby=$_GET['sortby'];
	
	}
if (isset($_GET['page'])){
	
	$pagenum=$_GET['page'];
	}

$offset=($pagenum-1)*$perpage;

?>

<!--Start of search form -->
<div style="height:15%; background:#D4AC0D;">
	<form name="search_cities" action="searched_for_city.php" method="POST">
		<h2>Search records:</h2>
		<label>City:</label><input type="text" name="city_search" placeholder="Enter the country name">
		<label>Status:</label>
		<select name="status_search">
			<option value='0,1'>Both</option>
			<option value=0> Inactive</option>
			<option value=1>Active</option>
			
		<input type="submit" name="search_submit" value="submit" >
	</form>
		
</div>
<!-- end of search form-->

<table>
<th><a href="city.php?sortby=id&ascdesc=<?php if($ascdesc=='asc'){echo "desc";}else{echo"asc";}?>&page=<?=$pagenum?>">ID</a></th>
<th><a href="city.php?sortby=city&ascdesc=<?php if ($ascdesc=='asc'){echo "desc";}else{echo "asc";}?>&page=<?=$pagenum?>">City</a></th>
<th>Status</th>
<th>Action</th>
<?php
$qry_ob=mysqli_query($conn,"select * from cities order by $sortby $ascdesc limit $perpage offset $offset");
while ($city= mysqli_fetch_assoc($qry_ob)){ ?>
<tr>
	<td><?=$city['id']?></td>
	<td><?=$city['city']?></td>
	<td><a href="change_status_city.php?id=<?=$city['id']?>"><?php if($city['status']==1){echo "Active";}else{echo "Inactive";}?></a></td>
	<td><a href="edit_city.php?id=<?=$city['id']?>">Edit</a> | <a href="delete_city.php?id=<?=$city['id']?>">Delete</a></td>
	
	

</tr>
<?php
}
?>

</table>
<br>
<a href="add_city.php"><b>Add City</b></a>
<br><br><a href="city.php">Return to home</a>
</div>

<?php





if (isset($_POST['delete']) && isset($_POST['city_to_delete']))
	{
	$city_to_delete=$_POST['city_to_delete'];
	$delq= "delete from cities where city='$city_to_delete' ";
	if(mysqli_query($conn,$delq))
		{
		echo "<script>alert('City deleted.');window.location.href='city.php'</script>";
		}else{echo "Not deleted..";}
	
	}
if(isset($_POST['add']) && isset($_POST['city_to_add']))
	{
		echo $_POST['city_to_add'];
		$city_to_add=$_POST['city_to_add'];
		$addq="insert into cities values ('$city_to_add')";
		if(mysqli_query($conn,$addq))
			{
				echo "<script>alert('City added');window.location.href='city.php'</script>";
			}
	}

if(isset($_POST['edit']) && isset($_POST['current_name']) && isset($_POST['new_name']))
	{	
		$new_name=$_POST['new_name'];
		$current_name=$_POST['current_name'];
		echo $edit_city="update cities set city='$new_name' where city='$current_name'";
		if(mysqli_query($conn,$edit_city))
			{echo "<script>alert('Names changed successfuly');window.location.href='city.php'</script>";
			}
	}
	echo "<br><Br>";
for ($i=1;$i<=$total_pages;$i++)
	{ ?>
	<a href="city.php?sortby=<?=$sortby?>&ascdesc=<?=$ascdesc?>&page=<?=$i?>"><?=$i?></a>
	<?php
	}


include "footer.php";
?>

</html>
