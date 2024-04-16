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

if(!empty($_POST["username"])) {
    $query = "SELECT * FROM user WHERE username ='" . $_POST["username"] . "'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if($count>0) {
        echo "exists";
    }
    else{
        echo "not exists";
        if($_POST["form"]=="signup"){
            $firstname = $_POST["firstname"];
            $username = $_POST["username"];
            $hash = hash('sha256', $_POST["password"]);
            $sql = "INSERT INTO user (firstname, username, password) VALUES ('$firstname', '$username', '$hash')";
            mysqli_query($con, $sql);
        }
    }
}