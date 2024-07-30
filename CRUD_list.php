<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>BOOK HOME PAGE</title>
    <style>
        table {
            width: 80%; 
            border-collapse: collapse; 
            font-size: 16px; 
        }

        th, td {
            border: 1px solid black; 
            padding: 10px; 
            text-align: left; 
        }
    </style>
</head>

<body>
    <h1 align='center'>BOOK LIST</h1>
    <h3 align='center'> By Sunday Emmanuel Sanni</h3>
    <hr />
    <div align='center'>
        <?php
        include "connect.php";
        print("<h2><a href=booklist.html> GO BACK TO BOOK LIST </a> <br><h2><hr />");

        $sql = "SELECT id, author AS autorius, title  FROM book";
        $data = $conn->query($sql)->fetchAll();

        //counting how many record found
        $sqlC = ("SELECT count(id) as kiekis FROM book");
        $count = $conn->query("$sqlC")->fetchColumn();
        print("Number of Books in Record: " . $count);
        print("<br><br>");

        // Display List in Table
        echo "<table style='font-size: 20px;'>";
        echo "<tr><th>ID</th><th>Author</th><th>Title</th><th>Action</th></tr>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['autorius'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            $id = $row['id'];
            echo "<td><a href=remove.php?id=$id style='font-size: 20px;'>Remove</a> | <a href=edit.php?id=$id style='font-size: 20px;'>Change</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </div>
</body>

</html>
