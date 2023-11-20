<?php
session_start();
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anfahrt</title>
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
<h1>Anfahrt</h1>
<?php
include("nav.php");
?>
<p>Hier können Sie uns finden:</p>
<iframe id="planeo_location"
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3103.7761128757934!2d8.76038!3d52.0270666!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ba40257cf6964f%3A0x8f9753b910aa9300!2sMax-Planck-Stra%C3%9Fe%20116%2C%2032107%20Bad%20Salzuflen!5e1!3m2!1sen!2sde!4v1693311488917!5m2!1sen!2sde"
        width="800" height="500" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            location.href = "../location.php";
        }
    </script>
</div>
</body>
</html>