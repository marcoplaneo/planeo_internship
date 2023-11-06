<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/1176favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
</head>
<body>
<!--heading-->
<h5>Settings</h5>
<form method="post">
    <input type="submit" name="deleteuser" value="Delete user">
</form>
<?php
if (isset($_POST["deleteuser"])) {
    $username = $_SESSION["username"];
    $sql = "DELETE FROM user WHERE username = '$username'";

        mysqli_query($con, $sql);
        $_SESSION["status"] = "stopped";
        session_destroy();

}
?>
</body>
</html>