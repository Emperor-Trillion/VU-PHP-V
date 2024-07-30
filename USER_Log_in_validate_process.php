<?php

include "connect_db.php";

if (isset($_POST['signUp'])) {
    $name = $_POST['name'];
    $email = $_POST['lEmail'];
    $password1 = password_hash($_POST['lPassword'], PASSWORD_BCRYPT, ['cost' => 12]);

    $sqlA = "SELECT email FROM signupinfo WHERE email='$email'";
    $result = $conn->query($sqlA)->fetchAll();
    if (!empty($result)) {
        echo '<script type="text/javascript">';
        echo 'alert("Email already exists! Use another email");';
        echo 'window.location.href = "./signUp.html";';
        echo '</script>';
    } else {
        $sqlB = "INSERT INTO signupinfo (name, email, password) VALUES ('$name', '$email', '$password1')";
        if ($conn->query($sqlB) == TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("SIGN UP COMPLETE! Now Log in");';
            echo 'window.location.href = "./homePage.html";';
            echo '</script>';
        }
    }
} elseif (isset($_POST['login'])) {
    $email = $_POST['lEmail'];
    $sql1_1 = "SELECT email FROM signupinfo WHERE email='$email'";
    $result = $conn->query($sql1_1)->fetchAll();

    if (!empty($result)) {
        $sql1 = "SELECT password FROM signupinfo WHERE email='$email'";
        $data1 = $conn->query($sql1)->fetchAll();
        if (!empty($data1)) {
            for ($i = 0; $i < sizeof($data1); $i++) {
                $dbPassword = $data1[0][0];
            }
            if (password_verify($_POST['lPassword'], $dbPassword)) {
                $sql2 = "SELECT id FROM signupinfo WHERE email='$email'";
                $data2 = $conn->query($sql2)->fetchAll();
                if (!empty($data2)) {
                    for ($i = 0; $i < sizeof($data2); $i++) {
                        $id = $data2[0][0];
                    }
                }

                $sql3 = "SELECT name FROM signupinfo WHERE email='$email'";
                $data3 = $conn->query($sql3)->fetchAll();

                if (!empty($data3)) {
                    for ($i = 0; $i < sizeof($data3); $i++) {
                        $name = $data3[0][0];
                    }
                }
                session_start();
                $_SESSION['username'] = $name;
                $_SESSION['id'] = $id;

                if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
                    $sqlC = "UPDATE signupinfo SET onlineStatus = 1 WHERE id = '$id'";
                    $conn->query($sqlC);
                    header('Location:login.php');
                    exit;
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Invalid  Email or Password");';
                echo 'window.location.href = "./homePage.html";';
                echo '</script>';
            }
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Email or Password");';
        echo 'window.location.href = "./homePage.html";';
        echo '</script>';
    }
}
