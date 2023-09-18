<?php
define('BASEURL','http://localhost/loagma/');
$hostname='localhost';
$username='root';
$password='';
$database='LoginData';
$conn=mysqli_connect($hostname,$username,$password,$database);

if(!$conn){
echo "There is an error while connecting to the database.";
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>