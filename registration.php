
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>

.a{
border-radius: 20px;
height:90%;
background-color: #D4AC0D;
width: 55%;
margin: 2% 22.5%;

}

.logo{
margin: 1px 1px;


}
.input_form{
margin:35px;
}

td{
	padding:1% 3%;
	}
</style></head>
<?php
include "connection.php";


if (isset($_POST['submit']))
	{
	
	

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$user=$_POST['username'];
$pass=$_POST['password'];
$country=$_POST['country'];
$city=$_POST['city'];
$imageFile = $_FILES['image'];
$hobbies='';
$docFile=$_FILES['document'];
$image_extension= explode('.',$imageFile['name']);
$doc_extension= explode('.',$docFile['name']);
$imageName=uniqid(). "." .end($image_extension);
$docName=uniqid().uniqid().".".end($doc_extension);

foreach($_POST['hobbies']as $hobby){$hobbies.=ucwords($hobby).",";}


if(strlen($user)<6 or strlen($pass)<6)
{
echo "Username and Password must be more than 5 characters.";
die;
}

$duplicateUsernameCheck="select * from RegisteredUsers where username='$user'";
$result_object=mysqli_query($conn,$duplicateUsernameCheck);
$rowExists=$result_object->num_rows;
if ($rowExists>0){
echo "Username already exists, please try again with different username";
die;
}

if( ($imageFile['type']=='image/png' or $imageFile['type']=='image/jpg') && $imageFile['size']<2000000 && $imageFile['error']==0)
{

	if ($docFile['type']=='application/pdf' or $docFile['type']=='application/vnd.openxmlformats-officedocument.wordprocessingml.document')
	{
		move_uploaded_file($imageFile['tmp_name'],"userImages/".$imageName);
		move_uploaded_file($docFile['tmp_name'],"userDocuments/".$docName);
	}else{
		echo"There is an issue with the given DOCUMENT, please upload a new document.";die;
	}

}else{
	echo "There is an issue with the given FILE, upload a new file. the size of file is:".$docFile['size'];
	die;
}


$sql= "insert into RegisteredUsers(first_name,last_name,email,dob,username,password,country,city,hobbies,image_details,document_details) values('$first_name','$last_name','$email','$dob','$user','$pass','$country','$city','$hobbies','$imageName','$docName')";

if (mysqli_query($conn,$sql))
	{
	echo "<script>alert('Registration Successful, you are being redirected to the Login page');window.location.href='user_list.php';</script>";

	
	}else{
			echo "<script>alert('Registration UnSuccessful')</script>";
		}

}
?>



<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<div class='logo'>
<a href="index.php"> <img style="border-radius: 20px; height:200px; width:200px; margin:0px 595px ;" src="loagma.png"><a>
</div>


<div class="a">
<br>
<center><h3 style=" margin: 30px; font-size:25px" >Create an ID with us!</h3></center>




<!-- Start of Form-->
<div class="input_form">

<form name="ToCreateLogin" id="" method="POST" action=""  enctype="multipart/form-data">
<table>
	<tr>
		<td style="width:45%;">
<label>First Name:</label><input type="text" class="form-control" placeholder="Enter your name" id="" name="first_name"><br>
<label>Last Name:</label><input type="text"  class="form-control" placeholder="Enter your name" id="" name="last_name"><br>
<label>Email:</label></label><input type="email" class="form-control" placeholder="Enter your email" id="" name="email"><br>
<label>DOB:</label></label><input type="date"  class="form-control" placeholder="DDMMYYYY" id="" name="dob" required><br>
<label>Username:</label></label><input type="text" class="form-control" placeholder="Enter your username" id="" name="username" required><br>
<label>Password:</label></label><input type="password" class="form-control" placeholder="Enter your password" id="" name="password" required><br>

</td>
<td style="width:45%;  margin-left:5%; ">
<label for="cars">Country:</label>
  <select class="form-select" id="country" name="country">
<?php
	$query_country="select country from countries";
	$qcountry=mysqli_query($conn,$query_country);
	while($country_registration = mysqli_fetch_assoc($qcountry))
		{
	?>
	
    <option value="<?=$country_registration['country']?>"><?=$country_registration['country']?></option>
   <?php }?>
  </select><br>



		<label>City:</label>
		<select class="form-select" name="city">
		<?php
		$query_city="select city from cities";
		$qcity=mysqli_query($conn,"select city from cities");
		
		while($city_row=mysqli_fetch_assoc($qcity))
			{
		?>
			<option value="<?=$city_row['city']?>"><?=$city_row['city']?></option>
		
		<?php	
			}
		
		?>
		</select><br>
		
		


<label>Hobbies:</label>
<div class="form-check">
	
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Movies
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
Sports
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
    Music
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
    Arts
  </label>
</div><div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
    Horse Riding
  </label>
</div><div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" >
  <label class="form-check-label" for="flexCheckDefault">
    Eating
  </label>
</div>



<br>

<label>Image:</label></label><input type="file"  id="fileToUpload" name="image"><br>
<label>Upload document:</label><input type="file" name='document'><br><br>
<input type="submit" class="btn btn-primary" name="submit" value="submit"><br><br>
</td>
<br><BR>
</tr>
</table>
<center><a style="margin:20px;text-decoration: none;" href="index.php" >Go to Login Page</a></center>

</form>
<!-- end of Form-->



</div>
</div>
</body>
</html>
