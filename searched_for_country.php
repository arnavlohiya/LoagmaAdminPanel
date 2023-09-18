
<html>
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

<!--Start of search form -->
<div style="height:15%; background:#D4AC0D;">
	<form name="search_countries" action="" method="POST">
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
	
	
	
<?php

include "header.php";
if (!isset($_SESSION['id']) && !isset($_SESSION['username'])){
	header("Location: index.php");
	}

if (isset($_POST['search_submit']))
	{
	$country_search=$_POST['country_search'];
	$status_search=$_POST['status_search'];
	echo $search="select * from countries where country like '%$country_search%' and status in ($status_search) ";      // no issues with query
	$search_obj=mysqli_query($conn,$search);
	
?>
	<table>
	<tr>
	<th>ID</th>
	<th>Country</th>
	<th>Status</th>
	<th>Action</th>
	</tr>
	
<?php

	while($data=mysqli_fetch_assoc($search_obj))
		{?>
			<tr>
			<td><?=$data['id']?></td>
			<td><?=$data['country']?></td>
			<td><?php if($data['status']==1){echo "Active";}else{echo "Inactive";} ?></td>
			<td><a href="edit_country.php?id=<?=$data['id']?>">Edit</a>&nbsp |&nbsp <a href="delete_country.php?id=<?=$data['id']?>">Delete</a></td>
			</tr>
		<?php }
	
	?> </table>
<?php
}
include "footer.php";
?>



</html>


