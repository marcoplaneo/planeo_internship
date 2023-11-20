<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
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
<h1>Contact</h1>
<?php
include("nav.php");
?>
<p>
    If you have any questions regarding the website you can just write me an e-mail or call me.
</p>
<p>
    But before I come to my contact info, I will tell you a little story.
</p>
<p>
    I started designing this website back in 1849. I did not know what it should be about, but I kept going.
</p>
<p>
    Now I have built this beautiful website everyone loves.
</p>
<p>
    So as a gift for your loving support I will give you my contact information now:
</p>
<br>
<h2>Contact information</h2>
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
    I hope to hear from you soon :)
</p>
<!--footer-->
<div class="footer">
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
            location.href = "./de/kontakt.php";
        }
    </script>
</div>
</body>
</html>