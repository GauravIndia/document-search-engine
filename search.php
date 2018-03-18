<!DOCTYPE html>
<html>
<head>
	<title>Document Search Engine</title>
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
		<form action="search.php" method="post">
			<input type="text" name="key" placeholder="Search Here" class="search_box">&nbsp;<br><br>
			<input type="radio" name="srch" value="title" checked="1"> Title &nbsp;
			<input type="radio" name="srch" value="author"> Author &nbsp;
			<input type="radio" name="srch" value="type"> Type &nbsp;
		</form>
	</div><br><br>
	<div class="main_data">
		<?php
		session_start();
		$key = $_POST['key'];
		echo "<br><div>Search results for : ".$key."</div><br>";
		include 'conn.php';
		if($_POST['srch']=='title'){
			$sql = "SELECT * from documents where status = '1' and (title like '%".$key."%');";
			$res = $con->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc()){
					echo "<div class='doc'> Title: ".$row['title']."<br>Author:".$row['author']."<br>Description: ".$row['description']."<br>Type: ".$row['type']."</div><br>";
				}
			}
			else{
				echo "<h1>No Document Found</h1>";
			}
		}
		elseif ($_POST['srch']=='author') {
			$sql = "SELECT * from documents where author like '%".$key."%';";
			$res = $con->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc()){
					echo "<div class='doc'> Title: ".$row['title']."<br>Author:".$row['author']."<br>Description: ".$row['description']."<br>Type: ".$row['type']."</div><br>";
				}
			}
			else{
				echo "<h1>No Document Found</h1>";
			}
		}
		else{
			$sql = "SELECT * from documents where type like '%".$key."%';";
			$res = $con->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc()){
					echo "<div class='doc'> Title: ".$row['title']."<br>Author:".$row['author']."<br>Description: ".$row['description']."<br>Type: ".$row['type']."</div><br>";
				}
			}
			else{
				echo "<h1>No Document Found</h1>";
			}
		}
		$conn->close();

		?>
	</div>
	</body>
	</html>
