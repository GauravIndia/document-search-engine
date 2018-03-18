		<?php
		include 'conn.php';
		if (isset($_GET["page"])) {
			$page  = $_GET["page"]; }
			else { $page=1; };
		$sql = "SELECT count(*) from documents;";
		$res = $con->query($sql);
		$row=$res->fetch_row();
		$total = $row[0];
		$limit = 2;
		$total_pages = ceil($total/$limit);
		for ($i=1; $i<=$total_pages; $i++) {
             echo "<a href='index.php?page=".$i."'>".$i."</a>&nbsp;&nbsp;";
 				 };
		echo "<br><br>";
		$start_from = ($page-1)*$limit;
		$sql = "SELECT * FROM documents where status = '1' order by date desc LIMIT $limit OFFSET $start_from;";
		$result = $con->query($sql);
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				echo "<div class='doc'> Title: ".$row['title']."<br>Author:".$row['author']."<br>Description: ".$row['description']."<br>Type:&nbsp;".$row['type']."<br><br><button><a href='download.php?file=".$row['file_name']."' class='main_link'>Download</a></button></div><br>";
			}
		}
		else
			echo "<h1 style= 'margin-left:25px;'>No documents to show</h1>";
		$conn->close();

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="stylesheet" type="text/css" href="CSS/style.css">
		</head>
		<body>

		</body>
		</html>
