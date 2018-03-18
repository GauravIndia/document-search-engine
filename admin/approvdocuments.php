<?php
include '../conn.php';

$sql = "SELECT * FROM documents where status = '0' order by date desc;";
$result = $con->query($sql);
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo "<div class='doc'> Title: ".$row['title']."<br>Author:".$row['author']."<br>Description: ".$row['description']."<br><br><button><a href='allow.php?id=".$row['id']."' class='main_link'>Approve</a></button>  <button><a href='delete.php?id=".$row['id']."' class='main_link'>Delete</a></button></div><br>";
	}
}
else
	echo "<h1 style= 'margin-left:25px;'>No documents to show</h1>";
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
</body>
</html>
