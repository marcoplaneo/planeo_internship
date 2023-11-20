<?php
session_start();
include("../db.php");
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/1176favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
</head>
<body>
<?php
include("profile.php");
?>
<!--website heading-->
<h1>Einstellungen</h1>
<?php
include("nav.php");
?>
<!-- Trigger/Open The Modal -->
<form method="post" action="einstellungen.php" enctype="multipart/form-data">
    Wählen Sie Ihr Profilbild aus:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" value="Profilbild ändern" name="submitprofilepicture" id="submitprofilepicture">
    <br><br>
    <button type="button" id="changename" name="changename">Namen/Benutzernamen ändern</button>
    <br>

    <!-- The Modal -->
    <div id="changenamemodal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="closechangename">&times;</span>
            <h5>Namen und/oder Benutzernamen ändern</h5>
            <label>Ändere Vornamen zu<br>
                <input type="text" id="changefirstname" name="changefirstname"></label><br><br>
            <label>Ändere Benutzernamen zu<br>
                <input type="text" id="changeusername" name="changeusername"></label><br><br>
            <input type="submit" id="applychanges" name="applychanges" value="Änderungen übernhemen">
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
    <input type="submit" name="deleteuser" value="Benutzer löschen">
</form>
<?php
if (isset($_POST["submitprofilepicture"])) {
    $sql = "SELECT avatarpath FROM user WHERE username = '$username'";
    $avatarpath = mysqli_query($con, $sql);
    if (mysqli_num_rows($avatarpath) > 0) {
        //assign variable objects to array
        $row = mysqli_fetch_assoc($avatarpath);
    }
    $target_file = "." . $row["avatarpath"] . "/" . basename($_FILES["fileToUpload"]["name"]);

    // Check if file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $allowed_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $file_name = $_FILES["fileToUpload"]["name"];
        $file_type = $_FILES["fileToUpload"]["type"];
        $file_size = $_FILES["fileToUpload"]["size"];

        // Verify file extension
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $allowed_ext)) {
            die("Error: Bitte wählen Sie ein gültiges Dateiformat aus.");
        }

        // Verify file size - 2MB max
        $maxsize = 2 * 1024 * 1024;

        if ($file_size > $maxsize) {
            die("Error: Die Datei ist größer als zulässig.");
        }

        // Verify MYME type of the file
        if (in_array($file_type, $allowed_ext)) {
            // Check whether file exists before uploading it
            if (file_exists("." . "$row[avatarpath]" . "/" . $_FILES["fileToUpload"]["name"])) {
                echo $_FILES["fileToUpload"]["name"] . " already exists.";
            } else {
                $tmp = explode(".", $_FILES["fileToUpload"]["name"]);
                $newfilename = $username . '.' . end($tmp);
                $new_target_file = "." . $row["avatarpath"] . "/" . $newfilename;
                if (file_exists("../images/users/$username.png")) unlink("../images/users/$username.png");
                if (file_exists("../images/users/$username.jpg")) unlink("../images/users/$username.jpg");
                if (file_exists("../images/users/$username.jpeg")) unlink("../images/users/$username.jpeg");
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                    $new_target_file)) {
                    echo "Die Datei " . $_FILES["fileToUpload"]["name"] .
                        " wurde hochgeladen.";
                } else {
                    echo "Leider ist beim Hochladen der Datei ein Fehler aufgetreten.";
                }
            }
        } else {
            echo "Error: Bitte erneut versuchen.";
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
        $sql = "UPDATE user SET username = '$newusername', firstname = '$newfirstname', avatarpath = './images/users' WHERE username = '$username'";
        try {
            mysqli_query($con, $sql);
            $_SESSION["name"] = "$newfirstname";
            $_SESSION["username"] = "$newusername";
            echo "Daten erfolgreich geändert";
        } catch (mysqli_sql_exception $ex1) {
            echo "Dieser Benutzername ist bereits vergeben!";
        }
    } elseif (!empty($_POST["changefirstname"])) {
        //change firstname
        $newfirstname = $_POST["changefirstname"];
        $sql = "UPDATE user SET firstname = '$newfirstname' WHERE username = '$username'";
        try {
            mysqli_query($con, $sql);
            $_SESSION["name"] = "$newfirstname";
            echo "Vorname erfolgreich geändert";
        } catch (mysqli_sql_exception $ex2) {
            echo "Oops, etwas ist schief gelaufen!";
        }
    } elseif (!empty($_POST["changeusername"])) {
        //change username
        $newusername = $_POST["changeusername"];
        $sql = "UPDATE user SET username = '$newusername', avatarpath = './images/users' WHERE username = '$username'";
        try {
            mysqli_query($con, $sql);
            $_SESSION["username"] = "$newusername";
            echo "Benutzername erfolgreich geändert";
        } catch (mysqli_sql_exception $ex3) {
            echo "Dieser Benutzername ist bereits vergeben!";
        }
    }
}
if (isset($_POST["deleteuser"])) {
    $sql = "DELETE FROM user WHERE username = '$username'";

    mysqli_query($con, $sql);
    $_SESSION["status"] = "stopped";
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location.href = 'index.php';
    </script>
    <?php
}
?>
<!--footer-->
<div class="footer2">
    <p>Geben Sie uns <a href="feedback.php">Feedback</a>! | Falls Sie Fragen haben, fühlen Sie sich frei uns zu <a
            href="kontakt.php">kontaktieren</a>!
        <br>
        <a href="ueberUns.php">Über uns</a> | <a id="imprints" href="impressum.php">Impressum</a>
        <br>
        <span id="datetime"></span></p>
    <script>
        const month = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
        const day = ["", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag"]
        const dt = new Date();
        document.getElementById("datetime").innerHTML = day[dt.getDay()] + " " + (("0" + (dt.getDate())).slice(-2)) + "." + month[dt.getMonth()] + "." + (("0" + (dt.getFullYear())).slice(-4));
    </script>
    <script>
        function changeLanguage(lang) {
            location.hash = lang;
            location.href = "../settings.php";
        }
    </script>
</div>
</body>
</html>