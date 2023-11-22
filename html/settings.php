<?php
session_start();
include("db.php");
if (empty($_SESSION)){
    redirect('index.php');
}
$username = $_SESSION["username"];
function redirect($location = NULL){
    if ($location != NULL){
        header("Location: {$location}");
        exit;
    }
}
if (isset($_POST["deleteuser"])) {
    $sql = "DELETE FROM user WHERE username = '$username'";

    mysqli_query($con, $sql);
    $_SESSION["status"] = "stopped";
    $_SESSION["message"] = "Success";
    redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/1176favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
</head>
<body>
<?php
include("profile.php");
?>
<!--heading-->
<h1>Settings</h1>
<?php
include("nav.php");
?>
<!-- Trigger/Open The Modal -->
<form method="post" action="settings.php" enctype="multipart/form-data">
    Select your profile picture:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" value="Change profile picture" name="submitprofilepicture" id="submitprofilepicture">
    <br><br>
    <button type="button" id="changename" name="changename">Change name/username</button>
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
if (isset($_POST["submitprofilepicture"])) {
    $target_file = "./images/users/" . basename($_FILES["fileToUpload"]["name"]);

    // Check if file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $allowed_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $file_name = $_FILES["fileToUpload"]["name"];
        $file_type = $_FILES["fileToUpload"]["type"];
        $file_size = $_FILES["fileToUpload"]["size"];

        // Verify file extension
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $allowed_ext)) {
            die("Error: Please select a valid file format.");
        }

        // Verify file size - 2MB max
        $maxsize = 2 * 1024 * 1024;

        if ($file_size > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Verify MYME type of the file
        if (in_array($file_type, $allowed_ext)) {
            // Check whether file exists before uploading it
            if (file_exists(".images/users/" . $_FILES["fileToUpload"]["name"])) {
                echo $_FILES["fileToUpload"]["name"] . " already exists.";
            } else {
                $tmp = explode(".", $_FILES["fileToUpload"]["name"]);
                $newfilename = $username . '.' . end($tmp);
                $new_target_file = "./images/users/" . $newfilename;
                if (file_exists("./images/users/$username.png")) unlink("./images/users/$username.png");
                if (file_exists("./images/users/$username.jpg")) unlink("./images/users/$username.jpg");
                if (file_exists("./images/users/$username.jpeg")) unlink("./images/users/$username.jpeg");
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                    $new_target_file)) {
                    echo "The file " . $_FILES["fileToUpload"]["name"] .
                        " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "Error: Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["fileToUpload"]["error"];
    }
}

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
            echo "Data changed successfully";
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
            echo "First name changed successfully";
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
            echo "Username changed successfully";
        } catch (mysqli_sql_exception $ex3) {
            echo "That username is already taken!";
        }
    }
}
?>
<!--footer-->
<div class="footer2">
    <p>Give us <a href="feedback.php">Feedback</a>! | If you have any questions, feel free to <a href="contact.php">contact</a>
        us!
        <br>
        <a href="aboutUs.php">About us</a> | <a id="imprints" href="imprint.php">Imprint</a>
        <br>
        <span id="datetime"></span></p>
    <script>
        const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const day = ["", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
        const dt = new Date();
        document.getElementById("datetime").innerHTML = day[dt.getDay()] + " " + (("0" + (dt.getDate())).slice(-2)) + "." + month[dt.getMonth()] + "." + (("0" + (dt.getFullYear())).slice(-4));
    </script>
    <script>
        function changeLanguage(lang) {
            location.hash = lang;
            location.href = "./de/einstellungen.php";
        }
    </script>
</div>
</body>
</html>