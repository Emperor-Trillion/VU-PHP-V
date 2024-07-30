<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>UPDATE BOOK PAGE</title>
</head>

<body>
	<h1 align='center'>BOOK LIST</h1>
	<h3 align='center'> By Sunday Emmanuel Sanni</h3>
	<hr />
	<div align='center' style="font-size: 30px;">
		<?php
		include "connect.php";
		$id = $_GET["id"];
		$sql = "SELECT * FROM book where id=$id";
		$data = $conn->query($sql)->fetchAll();

		foreach ($data as $row) {
			$id = $row['id'];
			$name = $row['author'];
			$title = $row['title'];
			print("<FORM METHOD=get  ACTION='update.php' >");
			print("<INPUT TYPE='hidden' NAME='id' value='$id' style='font-size: 20px;'>");
			print("Title: <INPUT TYPE='text' NAME='title' value='$title' style='font-size: 20px;'>");
			print("<br>Author: <INPUT TYPE='text' NAME='author' value='$name' style='font-size: 20px;' > ");
			print("<br> <INPUT TYPE='submit' VALUE='Change' style='font-size: 20px;'>");
			print("<INPUT TYPE='reset' VALUE='Reset' style='font-size: 20px;'>");
			print("</FORM>");
			print("<a href=list.php> List </a>");
		}
		?>

	</div>
</body>

</html>