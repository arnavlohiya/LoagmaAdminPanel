<html>
	<?php
	include "header.php";
	?>
<style>


.a{
border-radius: 20px;
height:300px;
background-color: #D4AC0D;
width: 500px;
margin: 50px 450px;
padding: 100px 0px 0px 20px;

}

</style>


<div class="a">
	<h2>Create Products:</h2>
<form method="POST" action="" enctype="multipart/form-data"><br><BR>
Name: <input type="text" name="name" placeholder="Enter product name" required><br><BR>
Price: <input type="numerical" name="price" placeholder="Enter product Price" required ><br><BR>
Unit: <input type="text" name="unit" placeholder="Enter product Price" required ><br><BR>
Quantity: <input type="text" name="quantity" placeholder="Enter product Quantity" required ><br><BR>
Image: <input type="file" name="image" required><br><br>
<input type="submit" name="submit" value="submit">

</form>
</div>

<?php


if ( isset($_POST['submit']) && $_FILES['image']['size']<5000000){
		echo "<pre>";
		print_r($_FILES);
		$breakName=explode('.',$_FILES['image']['name']);
		$image_ext=end($breakName);
		$imageName=uniqid().".".$image_ext;
		$imageFile=$_FILES['image'];
		move_uploaded_file($imageFile['tmp_name'],"product_images/".$imageName);
		
		if (strlen($_POST['name'])<100 && is_numeric($_POST['quantity']) && is_numeric($_POST['price'])){
			$name=$_POST['name'];
			$price=$_POST['price'];
			$unit=$_POST['unit'];
			$quantity=$_POST['quantity'];
			
			
			$insert_query="insert into productDetails (name,price,unit,quantity,image) values ('$name',$price,'$unit',$quantity,'$imageName')";
			if (mysqli_query($conn,$insert_query)){
				echo "<script>alert('Product created successfuly.')</script>";
				}
			
			}
	
	}else{echo "not working";}


?>


</html>
