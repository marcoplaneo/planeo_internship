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