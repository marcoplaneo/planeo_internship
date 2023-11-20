<?php
session_start();
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
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
<h1>Feedback</h1>
<?php
include("nav.php");
?>
<br><br>
<!--main part of subsite-->
<div class="main">
    <div class="required">
        Felder mit einem Stern(*) sind Pflichtfelder.
    </div>
    <br>
    <form>
        Name
        <br>
        <label><input type="text" id="name" name="Name" placeholder="Name"></label>
        <br><br>
        E-Mail*
        <br>
        <label><input type="email" id="mail" name="Mail" required placeholder="name@beispiel.com"></label>
        <br><br>
        Feedback*
        <br>
        <label><textarea id="feedback" name="Feedback" class="form-feedback" required rows="20" cols="100"
                         placeholder="Ihr Feedback! (Bsp.: Coole Webseite, aber der Darkmode könnte verbessert werden)"></textarea></label>
    </form>
    <br><br>
    <button type="submit" class="button" name="Feedback">Feedback senden</button>
</div>
<!--footer-->
<div class="footer">
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
            location.href = "../feedback.php";
        }
    </script>
</div>
</body>
</html>