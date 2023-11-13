<?php
session_start();
include("db.php");
$username = $_SESSION["username"];
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
<!-- Trigger/Open The Modal -->
<form method="post">
    <button type="button" id="changename">Change name/username</button>
    <br>

    <!-- The Modal -->
    <div id="changenamemodal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="closechangename">&times;</span>
            <h5>Change name and/or username</h5>
            <label>Change firstname to<br>
                <input type="text" id="changefirstname" name="changefirstname"></label><br><br>
            <label>Change username to<br>
                <input type="text" id="changeusername" name="changeusername"></label><br><br>
            <input type="submit" id="applychanges" name="applychanges" value="Apply changes">
        </div>

    </div>

    <script>
        // Get the modal
        var changenamemodal = document.getElementById("changenamemodal");

        // Get the button that opens the modal
        var changename = document.getElementById("changename");

        // Get the <span> element that closes the modal
        var spanchangename = document.getElementsByClassName("closechangename")[0];

        // When the user clicks the button, open the modal
        changename.onclick = function () {
            changenamemodal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        spanchangename.onclick = function () {
            changenamemodal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == changenamemodal) {
                changenamemodal.style.display = "none";
            }
        }
    </script>
    <input type="submit" name="deleteuser" value="Delete user">
</form>
<?php
if (isset($_POST["applychanges"])) {
    if (!empty($_POST["changefirstname"]) && !empty($_POST["changeusername"])) {
        //change firstname and username
        $newusername = $_POST["changeusername"];
        $newfirstname = $_POST["changefirstname"];
        $sql = "UPDATE user SET username = '$newusername', firstname = '$newfirstname' WHERE username = '$username'";
        try {
            mysqli_query($con, $sql);
            $_SESSION["name"] = "$newfirstname";
            $_SESSION["username"] = "$newusername";
        } catch (mysqli_sql_exception $ex1) {
            echo "That username is already taken!";
        }
    } elseif (!empty($_POST["changefirstname"])) {
        //change firstname
        $newfirstname = $_POST["changefirstname"];
        $sql = "UPDATE user SET firstname = '$newfirstname' WHERE username = '$username'";
        try {
            mysqli_query($con, $sql);
            $_SESSION["name"] = "$newfirstname";
        } catch (mysqli_sql_exception $ex2) {
            echo "Oops, something went wrong!";
        }
    } elseif (!empty($_POST["changeusername"])) {
        //change username
        $newusername = $_POST["changeusername"];
        $sql = "UPDATE user SET username = '$newusername' WHERE username = '$username'";
        try {
            mysqli_query($con, $sql);
            $_SESSION["username"] = "$newusername";
        } catch (mysqli_sql_exception $ex3) {
            echo "That username is already taken!";
        }
    }
}
if (isset($_POST["deleteuser"])) {
    $sql = "DELETE FROM user WHERE username = '$username'";

    mysqli_query($con, $sql);
    $_SESSION["status"] = "stopped";
    session_destroy();

}
?>
</body>
</html>