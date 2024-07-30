<?php
include "connect.php";

$title = $_GET["Title"];
$author = $_GET["Author"];
$sql = "INSERT INTO book (title, author) VALUES ('$title','$author')";

if ($conn->query($sql) == TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("BOOK INSERTED SUCCESSFULLY!");';
    echo 'window.location.href = "./list.php";';
    echo '</script>';
} else {
    print("INSERTION UNSUCCESSSFUL");
}
