<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>BOOK HOME PAGE</title>

</head>

<body>
	<h1 align='center'>BOOK LIST</h1>
	<h3 align='center'> By Sunday Emmanuel Sanni</h3>
	<hr />
	<div align='center' style='font-size: 20px;'>

		<?php
		include "connect.php";

		$id = $_GET["id"];
		$title = $_GET["title"];
		$author = $_GET["author"];

		$sql = ("UPDATE book SET title ='$title', author ='$author' WHERE id=$id");
		if ($conn->query($sql) == TRUE) {
			print("Updated Book: $id <br>");
			print("<a href=list.php> Return to Book List </a>");
		} else {
			print("Error ");
		}
		?>

	</div>
</body>

</html>