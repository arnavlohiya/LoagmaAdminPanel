<!DOCTYPE html>
<html>

<?php
session_start();
include "connection.php";
?>
<head>
<script src="https://kit.fontawesome.com/ce13a1b87e.js" crossorigin="anonymous"></script>

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
{box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #FFD433;
  
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  
  color: black;
}

.header a.active {
  background-color: #D4AC0D;
  color: white;
}

.header-right {
  float: right;
padding: 30px 10px;
}

.header-right a:hover {
background:#f4e434;
}


.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown .dropbtn:hover{
background:#f4e434;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;




@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="logout.php" class="logo"><img style="height:80px; width:80px;"src="loagma.png"></a>
  <div class="header-right">
    <a class="<?php if($_SERVER['PHP_SELF']=='/loagma/user_list.php' or $_SERVER['PHP_SELF']=='/loagma/searchedForPage.php'){ echo "active"; } ?>" href="user_list.php">Home</a>
    <a class="<?php if($_SERVER['PHP_SELF']=='/loagma/create_new.php'){echo "active";} ?>" href="create_new.php">Create New</a>
    <a class="<?php if($_SERVER['PHP_SELF']=='/loagma/country.php'){echo "active";} ?>" href="country.php">Update Country</a>
    <a class="<?php if($_SERVER['PHP_SELF']=='/loagma/city.php'){echo "active";} ?>" href="city.php">Update City</a>
    <div class="dropdown">
    <button class="dropbtn">Products</button>
		<div class="dropdown-content">
			<a href="products.php">View Products</a>
			<a href="create_product.php">Create Products</a>
		</div>
    </div>
	<div class="dropdown">
		<button class="dropbtn"><i class="fa-solid fa-user"></i>&nbspHi <?=$_SESSION['username']?>!</button>
		<div class="dropdown-content">
			<a href="logout.php">Logout</a>
			<a href="#">Edit</a>
			<a href="<?=BASEURL?>input_forms.php">Forms</a>
			<a href="../practice.php">Practice</a>
			
		</div>
		
	</div>

  </div>
</div>



</body>
</html>
