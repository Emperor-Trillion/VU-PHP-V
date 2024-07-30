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
		print("Book ".$id . " ");
		$sql = "DELETE FROM book WHERE id=$id";
		if ($conn->query($sql) == TRUE) {
			print("has been Removed");
			print("<a href=list.php> List </a>");
		} else {
			print("Unsuccessful");
		}
		?>

	</div>
</body>

</html>