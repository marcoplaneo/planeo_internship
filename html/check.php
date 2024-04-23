<?php
//establish database connection
$db_server = "mysql";
$db_user = "root";
$db_pass = "root";
$db_name = "internship";
$con = "";
try {
    $con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception $ex) {
    echo "Could not connect to database <br>";
}

if (!empty($_POST["username"])) {
    if (!empty($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
    }
    else {
        $firstname = "";
    }
    $username = $_POST["username"];
    $hash = hash('sha256', $_POST["password"]);
    $query = "SELECT * FROM user WHERE username ='$username'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        if ($_POST["form"] == "login") {
            if (!empty($_POST["password"])) {
                $row = mysqli_fetch_assoc($result);
                if ($row["password"] != $hash) {
                    echo "wrong password";
                } else {
                    session_start();
                    $_SESSION["username"] = "$username";
                    $_SESSION["password"] = "$hash";
                    $_SESSION["status"] = "started";
                }
            } else {
                echo "emptyp\n";
            }
        }
        else if($_POST["form"] == "delete") {
            $sql = "DELETE FROM user WHERE username = '$username'";

            mysqli_query($con, $sql);
            if (file_exists("./images/users/$username.png")) unlink("./images/users/$username.png");
            if (file_exists("./images/users/$username.jpg")) unlink("./images/users/$username.jpg");
            if (file_exists("./images/users/$username.jpeg")) unlink("./images/users/$username.jpeg");
            echo "deleted";
        }
    } else {
        if ($_POST["form"] == "signup") {
            if (!empty($_POST["password"])) {
                $sql = "INSERT INTO user (firstname, username, password) VALUES ('$firstname', '$username', '$hash')";
                mysqli_query($con, $sql);
            } else {
                echo "emptyp\n";
            }
        }
        echo "not exists";
    }
} else {
    echo "empty";
}