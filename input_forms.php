<html>
<title>Forms</title>
<style>
label{

font-style:italic;
font-family:Helvetica;
background:lightgrey;
}
</style>

<?php


print_r($_POST);
echo "hello";
$bgcolor=$_POST['color'];

?>
<body style="background:<?=$bgcolor?>">
<form method="POST" action="" name="html_form_inputs">
<input type="button" name="button" value="button"><br><br>
<!--what is the use of onclick attribute and how does it work?-->
<label>Checkbox type input:</label>
<input type="checkbox" name="check[]" checked>Premium
<input type="checkbox" name="check[]">Standard
<input type="checkbox" name="check[]">Free
<br><br>
<label>This is a <mark>color</mark> input type which allows you to control the background color of this page. &nbsp&nbsp&nbsp</label><input type="color" name="color" value="#FFFFFF">
<bR><br>
<label>Date type:</label><input type="date" name="date">
<br><br>
<label>date and time</label><input type="datetime-local" name='dateTime'>
<br><br>

<!-- this input type is used to send values without showing it on the page-->
<input type="hidden" name="id" value="99999"><br><Br>
<input type="month" name="month">
<br><Br>
<label>These are radio buttons</label>
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="others">Others
<br><br>
<label>This is a range, representing your JEE score</label><input type="range" step="100" name="range" min="200" max="1770">
<br><br>
<label>Search:</label><input type="search" name="searched_value">
<br><br>
<label>this is a tel input</label><input type="tel">
<br><br>
<label>this is a time input</label><input type="time">
<br><br>
<label>This is a url input</label><input type="url">
<br><br>
<label>This is a week input</label><input type="week" name="week">
<br><br>

<label>This is an image as a submit button</label><input type="image" style="width:150px; height:40px;" name="image" src="submit.png"><br><br>
<label>this is the standard submit button&nbsp</label><input type="submit" name="submit" value="submit">
<br><Br>
<label>This is a reset button which will initialize all form values:</label><input type="reset">
</form>

</body>




</html>