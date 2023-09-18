<?php
session_start();

?>
<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<style>

.a{
border-radius: 20px;
height:430px;
background-color: #D4AC0D;
width: 300px;
margin: 50px 550px;

}

.logo{
margin: 1px 1px;
}


.input_form{
margin:35px;
}
</style>
</head>

<body>
<div class='logo'>
<img style="border-radius: 20px; height:200px; width:200px; margin:0px 595px ;" src="loagma.png">
</div>

<div class="a">
	<span class="alert">ALERT</span>
<br><br><br>
<p style=" margin: 30px; font-size:25px" >Log in to Registered ID</p>

<div class="input_form">

<form name="ToLogin" id="" method="" action="">

<label>Username:</label></label><input type="text" placeholder="Enter your username" id="username" name="username" required><br><br>
<label>Password:</label></label><input type="password" placeholder="Enter your password" id="password" name="password" required><br><br>
<input type="button" class= "submit" name="submit" value="submit">
<a style="margin:10px;" href="registration.php"> Create ID</a><br>




</div>
</div> 

</body>

<script>
	
$(".submit").click(function(){
	console.log("h");
	var user= $("#username").val();
	var pass= $("#password").val();
	$.post("LoggedIn.php",
	{
			username: user,
			password: pass,
			submit: 'submit'
	}, function(flag){
		if(flag == 1){
		window.location.href= "user_list.php?sortby=first_name&ascdesc=asc";
		}else{
				alert("The credentials entered are wrong, please try again.");
			}
		
	}
		)
		})


</script>
</html>
