<html>




<?php
include "connection.php";
session_start();



if (!isset($_SESSION['id']))
{

echo "<script>alert('You dont have authorized access to this page.');window.location.href='<?=BASEURL?>'</script>";
////how to write don't instead of dont without causing error?
}


if(!isset($_GET['id']) or empty($_GET['id'])){
header("Location: ".BASEURL."country.php");
}

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="select * from cities where id='$id'";
$query_obj= mysqli_query($conn,$sql);
$user_info=mysqli_fetch_assoc($query_obj);

if (isset($_POST['submit']))
	{

	$city=$_POST['city_edit'];
	if ($_POST['status_edit']=='active'){
		$status=1;
		}
	else{
		$status=0;
		}
	

	$sql_edit_query= "update cities set city='$city',status='$status' where id=$id" ;

	
	






	if(mysqli_query($conn,$sql_edit_query))
		{
		echo "<script>alert('Edited profile successfully.');window.location.href='city.php';</script>";
			

			
			
		}else{
			echo "hello";
		}

	

	}



?>





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

	<form name="to_edit_city" id="" method="POST" action=""  enctype="multipart/form-data">

		<label>Current name of country:</label><h3><?=$user_info['city']?></h3>
		<label>Edit Country</label><input type="text" name="city_edit" value="<?=$user_info['city']?>">
		<label>Edit status:</label>
			<select name="status_edit">
				<option value="<?=$user_info['status']?>"><?php if($user_info['status']==1){echo "Active";}else{echo"Inactive";}?></option>
				<option value="active">Active</option>
				<option value="inactive">Inactive</option>
			</select>
			<br><br>
		<input type="submit" name="submit" value="submit">
		<a style="margin:20px;" href="country.php">Cancel edit</a>
	</form>

</div>

<?php } 







?>




</html>
