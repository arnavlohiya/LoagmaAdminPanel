
<html>
	
	<?php include "header.php"; ?>
 
<style>

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




</style>

<?php


if(!isset($_SESSION['id'])){ 
echo "<script> alert('you have unauthorized access to this page.');window.location.href='index.php'";
}


?>





<?php
$sql="select * from countries ";
$qry_obj=mysqli_query($conn,$sql);
$total_country_rows=$qry_obj->num_rows;
$perpage=8;
$total_pages=ceil($total_country_rows/$perpage);

if(isset($_GET['page'])){
	$page=$_GET['page'];
	}else{
		$page=1;
		}

$offset=($page-1)*$perpage;
$order='asc';
$sortby='id';
?>

<!--Start of search form -->
<div style="height:15%; background:#D4AC0D;">
	<form name="search_countries" action="searched_for_country.php" method="POST">
		<h2>Search records:</h2>
		<label>Country:</label><input type="text" name="country_search" placeholder="Enter the country name">
		<label>Status:</label>
		<select name="status_search">
			<option value='0,1'>Both</option>
			<option value=0> Inactive</option>
			<option value=1>Active</option>
			
		<input type="submit" name="search_submit" value="submit" >
	</form>
		
</div>
<!-- end of search form-->

<div>
<table>
<th><a href="country.php?page=<?=$page?>&sortby=id&order=<?php if(isset($_GET['order']) && $_GET['order']=='asc'){echo "desc";}else{echo "asc";} ?>">ID</a></th>
<th><a href="country.php?page=<?=$page?>&sortby=country&order=<?php if(isset($_GET['order']) && $_GET['order']=='asc'){echo "desc";}else{echo "asc";} ?>">Country</a></th>
<th>Status</th>
<th>Action</th>
<?php

if (isset($_GET['order'])){
	$order=$_GET['order'];
	}
if(isset($_GET['sortby'])){
	$sortby=$_GET['sortby'];
	}


$main_sql="select * from countries order by $sortby $order limit $perpage OFFSET $offset";
$paged_obj= mysqli_query($conn, $main_sql);
while ($country= mysqli_fetch_assoc($paged_obj)){ ?>
<tr>
	<td><?=$country['id']?></td>
	<td><?=$country['country']?></td>
	<td><a href="change_status_country.php?id=<?=$country['id']?>"><?php if ($country['status']==0){echo "Inactive";}else{echo "active";}?></a></td>
	<td><a href="edit_country.php?id=<?=$country['id']?>&edit=country">Edit</a>&nbsp |&nbsp <a href="delete_country.php?id=<?=$country['id']?>&delete=country">Delete</a></td>
</tr>
<?php
}
?>

</table>
<br><br><a href="user_list.php">Return to Home</a>

<a href="add_country.php"><h3>Add country</h3></a>
</div>

<!--pagination pages-->
<div style="text-align:center;">
<?php
for($i=1;$i<=$total_pages;$i++)
	{ 
		?>
		
		<a href="country.php?page=<?=$i?>&sortby=<?=$sortby?>&order=<?=$order?>"><?=$i?> </a>
		
	<?php
	}
?>
</div>


<?php
include "footer.php";

?>

</html>





