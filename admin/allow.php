<?php
	$id = $_GET['id'];
	include '../conn.php';
	$sql = "UPDATE documents set status = '1' where id = ".$id.";";
	$con->query($sql);
	header('Location:viewdocument.php');
	$con->close();
?>
