<?php
session_start();
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Über uns</title>
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
<h1>Über Uns</h1>
<?php
include("nav.php");
?>
<!--main part of the subsite-->
<h2>Warum?</h2>
<p>
    A few years ago I wanted to buy a few things like a smartphone and a country.
    <br>
    But somehow you can not buy everything on one single website.
</p>
<h2>Die Lösung!</h2>
<p>
    Also, wir kamen auf die Idee eine eigene Website zu erstellen, auf der man alles kaufen kann.
    <br>
    Es mag surreal und wie ein Traum klingen, ist es aber nicht. Solange es sich um ein echtes Ding handelt, das Sie
    wollen, können Sie es hier kaufen.
    <br>
    Und das Beste daran ist: Es muss nicht von irgendjemandem verkauft werden. Wir verkaufen es Ihnen einfach und
    liefern es Ihnen anschließend, wenn möglich, direkt an Ihre Haustür.
</p>
<h2>Los gehts!</h2>
<p>
    Also, worauf warten Sie noch? Bestellen Sie Ihre Sachen jetzt.
    <br>
    Wir sind bereit, Ihre Bestellung entgegenzunehmen.
</p>
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
            location.href = "../aboutUs.php";
        }
    </script>
</div>
</body>
</html>