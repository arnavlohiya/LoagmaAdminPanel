
<html>
	
<style>


.a{
border-radius: 20px;
height:600px;
background-color: #D4AC0D;
width: 500px;
margin: 50px 550px;
padding: 100px 0px 0px 20px;

}


</style>


<div class="a">
<h3>Add City</h3>
<form method="POST" action="">
<label>Enter city to add:</label><input type='text' name="add_city" placeholder="Add city"><br><br>
<label>Status:</label>
<select name="add_status">
<option value="1" >Active</option>
<option value="0">Inactive</option>
</select>
<br><Br>
<input type="submit" name="submit" value="submit">

</form>
</div>

<?php
include "connection.php";
$add_city=$_POST['add_city'];
$add_status=$_POST['add_status'];
$add_sql="insert into cities(city,status) values('$add_city','$add_status')";


if(mysqli_query($conn,$add_sql))
{
	echo "<script>alert ('City added'); window.location.href='city.php';</script>" ;
	
	}else{
		
		echo "There was an issue faced.";
		}

?>





















</html>
