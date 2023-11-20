<?php
session_start();
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team</title>
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
<h1>Unser Team</h1>
<?php
include("nav.php");
?>
<!--main part of the website-->
<p>Das ist unser Team:</p>
<a id="founder">
    <figure><img
            src="../images/micha.png"
            alt="Micha" id="founderpic" style="width: 150px; height: 150px">
        <figcaption id="Micha">Micha, unser Gründer</figcaption>
    </figure>
</a>
<a id="co-founder">
    <figure><img
            src="../images/marco.png"
            alt="Marco" id="co-founderpic" style="width: 150px; height: 150px">
        <figcaption id="Marco">Marco, unser Mitgründer</figcaption>
    </figure>
</a>
<a id="marketing">
    <figure>
        <img
                src="../images/aaron.png"
                alt="Aaron" id="marketingpic" style="width: 150px; height: 150px">
        <figcaption id="Aaron">Aaron, unser Marketingleiter</figcaption>
    </figure>
</a>
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
            location.href = "../team.php";
        }
    </script>
</div>
</body>
</html>