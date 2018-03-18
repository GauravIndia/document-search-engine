<?php
if($_GET['reg']==1){
	include 'conn.php';
	$sql = "SELECT * from documents where title like '".$_POST['title']."';";
	$result = $con->query($sql);
	move_uploaded_file($_FILES['photo']['tmp_name'],"files/".$_FILES['photo']['name']);
	if($result->num_rows==0){
		$sql = "INSERT into documents (`title`,`author`,`description`,`type`,`file_name`) values('".$_POST['title']."','".$_POST['author']."','".$_POST['description']."','".$_POST['type']."','".$_FILES['photo']['name']."');";
		$con->query($sql);
		session_start();
		$_SESSION['reg']=true;
		header("location:index.php");
		exit();
	}
	$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Document</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
	<h1 style="text-align: center;">Search The Web</h1>
	<br><br><br>
	<div class="nav_bar">
		<button><a href="index.php" class="main_link">Home</a></button>
		<button><a href="adddocument.php" class="main_link">Add Document</a></button>
	</div>
	<br><br>
	<div class="main_data">
		<form action = "adddocument.php?reg=1" method="post" class = "reg" enctype="multipart/form-data">
		<label>Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="title" placeholder="" class="search_box" required><p>
    <label>Author:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type = "text" name = "author" placeholder="" class="search_box" required><p>
		<label>Description: </label><input type="text" name="description" placeholder="" class="search_box" required><p>
		<label>Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="type" placeholder="" class="search_box" required><p><br><br>
		<label>Select File:&nbsp;&nbsp;&nbsp;</label><input type="file" name="photo" id="photo" required/><br><br>
		<button type="submit" class="submit_button">SUBMIT</button>
	</form>
	</div><br><br>
</body>
</html>
