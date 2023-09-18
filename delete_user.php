<html>
<style>
.a{
border-radius: 20px;
height:200px;
background-color: #D4AC0D;
width: 300px;
margin: 50px 550px;
padding: 100px 0px 0px 20px;
}
</style>
<?php

session_start();

include "connection.php";
$id_to_delete='';
//assigning value to id_to delete from url
if(isset($_GET['id']))
	{
	$id_to_delete=$_GET['id'];
	}

// session validation
if (!isset($_SESSION['id'])){
	echo "<script>alert('You dont have access to this page.');window.location.href='index.php'</script>";die;
	}

$sql_query="delete from RegisteredUsers where id=$id_to_delete";

if(isset($_POST['delete']))
{
	if (mysqli_query($conn,$sql_query))
	{
		echo "<script>alert('User has been deleted.');window.location.href= $BASEURL user_list.php'</script>";
		
	}
	else
	{
		echo "The delete command has not worked.";
	}
}

if (isset($_POST['cancel']))
{
	header("Location: $BASEURL user_list.php");
}
?>

<div class="a">
<form action="" method="POST" name="are_you_sure_form">

<label>Are you sure you want to delete this row? </label>
<input type="submit" placeholder="delete" value="delete" name="delete">
<input type="submit" placeholder="cancel" value="cancel" name="cancel">
</form>
</div>
</html>
