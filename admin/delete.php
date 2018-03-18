<?php
	$id = $_GET['id'];
	include '../conn.php';
	$sql = "DELETE FROM documents where id = ".$id.";";
	$con->query($sql);
	header('Location:viewdocument.php');
	$con->close();
?>
