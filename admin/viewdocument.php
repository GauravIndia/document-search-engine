<?php
session_start();
include '../conn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
	<h1 style="text-align: center;">Search The Web</h1>
	<br><br><br>
	<div class="nav_bar">
		<button><a href="home.php" class="main_link">Home</a></button>
		<button><a href="viewdocument.php" class="main_link">View Document</a></button>
		<button><a href="logout.php" class="main_link">Logout</a></button>
	</div><br><br>
	<div class="main_data">
	<?php
		include 'approvdocuments.php';
	?>
	</div>
	<br><br>
	<br><br>
</body>
</html>
