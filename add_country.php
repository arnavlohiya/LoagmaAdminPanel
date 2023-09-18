
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
<h3>Add Country</h3>
<form method="POST" action="">
<label>Enter country to add:</label><input type='text' name="add_country" placeholder="Add country"><br><br>
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
$add_country=$_POST['add_country'];
$add_status=$_POST['add_status'];
 echo $add_sql="insert into countries(country,status) values('$add_country','$add_status')";


if(mysqli_query($conn,$add_sql))
{
	echo "<script>alert ('Country added'); window.location.href='country.php';</script>" ;
	
	}

?>





















</html>
