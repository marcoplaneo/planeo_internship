<?php
session_start();
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
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
<h1>Kontakt</h1>
<?php
include("nav.php");
?>
<!--main part of website-->
<p>
    Wenn Sie Fragen zur Website haben, können Sie mir einfach eine E-Mail schreiben oder mich anrufen.
</p>
<p>
    Doch bevor ich zu meinen Kontaktdaten komme, erzähle ich Ihnen noch eine kleine Geschichte.
</p>
<p>
    Ich begann bereits 1849 mit der Gestaltung dieser Website. Ich wusste nicht, worum es gehen sollte, aber ich machte
    weiter.
</p>
<p>
    Jetzt habe ich diese wunderschöne Website erstellt, die jeder liebt.
</p>
<p>
    Also gebe ich Ihnen jetzt als Geschenk für Ihre liebevolle Unterstützung meine Kontaktinformationen:
</p>
<br>
<h2>Kontakt Informationen</h2>
<p>
    Max Mustermann
</p>
<p>
    Musterstraße 1
</p>
<p>
    00000 Musterdorf
</p>
<p>
    Ich hoffe bald von Ihnen zu hören :)
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
            location.href = "../contact.php";
        }
    </script>
</div>
</body>
</html>