



<?php
session_start();

include "connection.php";

$user=$_POST['username'];
$pass_form=$_POST['password'];

$sql="select * from RegisteredUsers where username= '$user' && password = '$pass_form' ";

$query_result=mysqli_query($conn,$sql);
$numRows=$query_result->num_rows;

if (!($_POST['submit']=='submit')){
	//header("Location: registration.php");
	console.log("submit is not set");
}
//console.log('2');



if($numRows>0)
	{

	$row_data= mysqli_fetch_assoc($query_result);
	$_SESSION['id']=$row_data['id'];
	$_SESSION['dob']=$row_data['dob'];
	$_SESSION['first_name']=$row_data['first_name'];
	$_SESSION['last_name']=$row_data['last_name'];
	$_SESSION['username']=$row_data['username'];
	$_SESSION['password']=$row_data['password'];
	$_SESSION['email']=$row_data['email'];
	$_SESSION['image_details']=$row_data['image_details'];
	$_SESSION['document_details']=$row_data['document_details'];
	$_SESSION['country']=$row_data['country'];
	

	//echo "<script>alert('you have been logged in');window.location.href='".BASEURL."user_list.php?sortby=first_name&ascdesc=asc';</script>" ;
	///header("Location: ".BASEURL."user_list.php?sortby=first_name&ascdesc=asc");
	echo 1;
	}else
		echo "2";
	{
	//echo "Please make sure you have entered the correct credentials";
	//echo 2;
	}
	//echo 1;

?>
