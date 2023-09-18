<html>

<?php

include "header.php";

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

foreach($_POST['hobbies']as $hobby){$hobbies.=  ucwords($hobby).",";}


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

	
	}

}
?>

<html>
<style>

.a{
border-radius: 20px;
height:750px;
background-color: #D4AC0D;
width: 300px;
margin: 50px 550px;

}

.input_form{
margin:35px;
}
</style>
<body>



<div class="a">
<br>
<p style=" margin: 30px; font-size:25px" >Create an ID with us!</p>


<div class="input_form">

<form name="ToCreateLogin" id="" method="POST" action=""  enctype="multipart/form-data">
<label>First Name:</label><input type="text" placeholder="Enter your name" id="" name="first_name"><br><br>
<label>Last Name:</label><input type="text"  placeholder="Enter your name" id="" name="last_name"><br><br>
<label>Email:</label></label><input type="email" placeholder="Enter your email" id="" name="email"><br><br>
<label>DOB:</label></label><input type="date"  value='0' placeholder="DDMMYYYY" id="" name="dob"><br><br>
<label>Username:</label></label><input type="text" placeholder="Enter your username" id="" name="username" required><br><br>
<label>Password:</label></label><input type="password" placeholder="Enter your password" id="" name="password" required><br><br>
<label for="cars">Country:</label>
  <select id="country" name="country">
<?php
	$query_country="select country from countries";
	$qcountry=mysqli_query($conn,$query_country);
	while($country_registration = mysqli_fetch_assoc($qcountry))
		{
	?>
	
    <option value="<?=$country_registration['country']?>"><?=$country_registration['country']?></option>
   <?php }?>
  </select><br><br>



		<label>City:</label>
		<select name="city">
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
		</select><br><Br>
		
		



<label>Hobbies:</label><br>

<input type="checkbox" name="hobbies[]" value="books"> Books

<input type="checkbox" name="hobbies[]" value="movies"> Movies

<input type="checkbox" name="hobbies[]" value="music"> Music

<input type="checkbox" name="hobbies[]" value="shop"> Shop

<input type="checkbox" name="hobbies[]" value="sports"> Sports

<input type="checkbox" name="hobbies[]" value="coding"> Coding


<br><br>

<label>Image:</label></label><input type="file"  id="fileToUpload" name="image"><br><br>
<label>Upload document:</label><input type="file" name='document'><br><br>
<input type="submit" name="submit" value="submit"><br><br>
<a style="margin:20px;" href="index.php">Go to Login Page</a>




</div>
</div>
</body>
<?php include "footer.php"; ?>


</html>
