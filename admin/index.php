<?php
session_start();
if($_GET['count']==1){
	include '../conn.php';
	$sql = "SELECT * from users where userID like '".$_POST['userID']."' and password like  '".$_POST['pswd']."';";
	$res = $con->query($sql);
	if($res->num_rows==1){
		$row = $res->fetch_assoc();
		if($row){
			header('Location:home.php');
		}
		$conn->close();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Document Search Engine</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
	<h1 style="text-align: center;">Search The Web</h1>
	<br><br><br>
	<div>
		<h2 style="text-align: center;">LOGIN PLEASE.</h2>
	</div>
	<br><br>
	<div class="main_data">
		<form action="index.php?count=1" method="post" class="login" onsubmit="return check()">
			<label>USERNAME: </label><input type="text" name="userID" id ="userID" class="search_box"><p>
				<label>PASSWORD: </label><input type="password" name="pswd" id="pswd" class="search_box"><p><br><br>
					<button type = "submit" class="submit_button">LOGIN</button><p><br>
					</form>
					<script type="text/javascript">
						function check() {
							var user = document.getElementById('userID').value;
							var pswd = document.getElementById('pswd').value;
							if(user=='' || pswd == ''){
								alert("Invalid username/password");
								return false;
							}
							return true;
						}
					</script>
				</div><br><br>
			</body>
			</html>
