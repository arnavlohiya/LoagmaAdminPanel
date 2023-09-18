<?php
include "connection.php";
$id=$_GET['id'];
$sql="delete from countries where id=$id";
if (mysqli_query($conn,$sql)){
	echo "<script>alert ('Country has been deleted');window.location.href='country.php';</script>";
	}
	else{
		echo "there has been an issue";
			}


?>
