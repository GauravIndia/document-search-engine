<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "document";

$con = new mysqli($servername,$username,$password,$dbname);
if($con->connect_error){
	header("location:error.php");
	exit();
}
?>