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
header("Location: <?=BASEURL?>user_list.php");
}


$id=$_GET['id'];
$sql="select * from RegisteredUsers where id='$id'";
$query_obj=mysqli_query($conn,$sql);
$user_info=mysqli_fetch_assoc($query_obj);

if (isset($_POST['submit']))
	{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$country=$_POST['country'];
$city=$_POST['city'];
$image_details=$_FILES['image'];
$document_details=$_FILES['document'];
$imageFile=$_FILES['image'];
$docFile=$_FILES['document'];
	echo "<br>".$user_info['city'];
	echo $sql_edit_query= "update RegisteredUsers set first_name='$first_name',  last_name='$last_name', email='$email',dob=$dob, country='$country',city='$city' where id=$id" ;

	
	if (($imageFile['size']>0) && ($imageFile['type']=='image/png' or $imageFile['type']=='image/jpg') && $imageFile['size']<2000000 && $imageFile['error']==0)

		{

			$imguniq=uniqid();
			$image_extension= explode('.',$_FILES['image']['name']);
			$img_name=$imguniq.".".end($image_extension);
			
			if( mysqli_query($conn,"update RegisteredUsers set image_details='$img_name' where id=$id"))		{
				move_uploaded_file($_FILES['image']['tmp_name'],'userImages/'.$img_name);
				
			}else{
			echo"There is an issue with the image.";}
		
		}
		
	if($docFile['size']>0 && ($docFile['type']=='application/pdf' or $docFile['type']=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'))

		{
			$docuniq=uniqid();
			$doc_ext=explode('.',$docFile['name']);
			$doc_name=$docuniq.".".end($doc_ext);
			if (mysqli_query($conn,"update RegisteredUsers set document_details='$doc_name' where id=$id"))

			{
				move_uploaded_file($docFile['tmp_name'],'userDocuments/'.$doc_name);
			}
		





		}






	if(mysqli_query($conn,$sql_edit_query))
		{
		echo "<script>alert('Edited profile successfully.');window.location.href='user_list.php';</script>";
			

			
			
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

<form name="ToCreateLogin" id="" method="POST" action=""  enctype="multipart/form-data">

<label>First Name:</label><input type="text" value=<?=$user_info['first_name']?> placeholder="Enter your name" id="" name="first_name"><br><br>
<label>Last Name:</label><input type="text" value=<?=$user_info['last_name']?> placeholder="Enter your name" id="" name="last_name"><br><br>

<label>Email:</label></label><input type="email" value=<?=$user_info['email']?> placeholder="Enter your email" id="" name="email"><br><br>

<label>DOB:</label></label><input type="numerical"  value= <?=$user_info['dob']?>  name="dob"><br><br>


<label>Country:</label>
  <select id="country" name="country">
    <option value=<?=$user_info['country']?> ><?=$user_info['country']?></option>
	<?php
	$country_query="select country from countries";
	$country_obj=mysqli_query($conn,$country_query);
	while ($country = mysqli_fetch_assoc($country_obj)){?>
    <option value="<?=$country['country']?>"><?=$country['country']?></option>
	<?php }?>
    
  </select><br><br>

<label>City:</label>
  <select id="city" name="city">
    <option value=<?=$user_info['city']?> ><?=$user_info['city']?></option>
	<?php
	$city_query="select city from cities";
	$city_obj=mysqli_query($conn,$city_query);
	while ($city = mysqli_fetch_assoc($city_obj)){?>
    <option value="<?=$city['city']?>"><?=$city['city']?></option>
	<?php }?>
    
  </select><br><br>

<label>Image:</label></label><input type="file"  id="fileToUpload" name="image">
<img style="width:150px ;height: 150px;" src="<?=BASEURL?>userImages/<?=$user_info['image_details']?>">


	
<label>Upload document:</label><input type="file" name='document'><br><br>

<a href=<?=BASEURL?>userDocuments/<?=$user_info['document_details']?>>Click to view current document</a><bR>
<input type="submit" name="submit" value="submit"><br><br>
<a style="margin:20px;" href="<?=BASEURL?>user_list.php">Cancel edit</a>




</div>



</html>