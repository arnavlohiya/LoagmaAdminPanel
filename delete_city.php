<?php
include "connection.php";
$id=$_GET['id'];
$sql="delete from cities where id=$id";
if (mysqli_query($conn,$sql)){
	echo "<script>alert ('City has been deleted');window.location.href='city.php';</script>";
	}
	else{
		echo "there has been an issue";
			}


?>
