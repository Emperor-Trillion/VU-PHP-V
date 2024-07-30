<?php
session_start();
include "connect_db.php";
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>HOME PAGE</title>
</head>

<body>
    <h1 align='center'>HOME PAGE</h1>
    <h3 align='center'> By Sunday Emmanuel Sanni</h3>
    <hr />
    <p align='center'>
        CHECK AND EDIT BOOK LIST BELOW <br></br>
        <a href="booklist.html">BOOK LIST</a>
    </p>
    <hr />
    <div align='center' style='font-size: 20px;'>
        <h2> Welcome, "<?php echo $_SESSION['username'];
                        ?>" with "User ID:
            <?php
            echo $_SESSION['id'];  ?>"
        </h2>
        <p>
            <?php
            $id = $_SESSION['id'];
            $sqlStatus = "SELECT name, id FROM signupinfo WHERE onlineStatus = 1 AND id != '$id' ";
            $data = $conn->query($sqlStatus)->fetchAll();
            if (empty($data)) {
            } else {
                echo "USERS CURRENTLY LOGGED IN ARE: <br>";
                for ($i = 0; $i < sizeof($data); $i++) {
                    echo "Name: " . $data[$i][0] . " --- User ID: " . $data[$i][1] . "<br>";
                }
            }
            ?>
        </p>
        <p>
            Click here to <a href="logout.php">LOG OUT</a>
        </p>

    </div>
</body>

</html>