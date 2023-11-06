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
    <!--open change modal-->
    <!-- Trigger/Open The Modal -->
<form method="post">
    <button type="button" id="changename">Change name/username</button><br>

    <!-- The Modal -->
    <div id="changenamemodal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="closechangename">&times;</span>
            <!--content of modal-->
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