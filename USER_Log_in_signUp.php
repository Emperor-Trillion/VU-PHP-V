<?php

include "connect_db.php";

if (isset($_POST['signUp'])) {
    $name = $_POST['name'];
    $email = $_POST['lEmail'];
    $password1 = password_hash($_POST['lPassword'], PASSWORD_DEFAULT);

    $sqlA = "SELECT email FROM signupinfo WHERE email='$email'";
    $result = $conn->query($sqlA)->fetchAll();
    if ($result) {
        echo "Email alredy exist! Use another Email";
    } else {
        $sqlB = "INSERT INTO signupinfo (name, email, password) VALUES ('$name', '$email', '$password1')";
        if ($conn->query($sqlB) == TRUE) {
            echo "SIGN UP COMPLETE! <br>";
            echo "<a href='homePage.html'>LOG IN</a>";
        }
    }
} 