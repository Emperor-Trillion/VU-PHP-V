<?php
session_start();
include "connect_db.php";
$id = $_SESSION['id'];
if (session_destroy()) {
    $sqlE = "UPDATE signupinfo SET onlineStatus = 0 WHERE id = '$id'";
    $conn->query($sqlE);
    header('location:homePage.html');
    exit;
}
